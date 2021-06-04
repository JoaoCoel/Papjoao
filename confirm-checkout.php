<?php
include_once ("includes/body.inc.php");
//$con=mysqli_connect(HOST,USER,PWD,DATABASE);
//$con->set_charset("utf8");

//var_dump($_FILES);
if(isset($_SESSION['id'])){
    $nome=addslashes($_POST['nome']);
    $email=addslashes($_POST['email']);
    $loc=addslashes($_POST['loc']);
    $cod=addslashes($_POST['cod']);
    $mor=addslashes($_POST['mor']);
    $tot=addslashes($_POST['total']);

    $uid=intval($_SESSION['id']);
    $pid=intval($_SESSION['pid']);

//Verificar se o utilizador tem carrinho e criar se não tiver

    $sql="select * from carrinhos where carrinhoPerfilId=".$pid;
    $result=mysqli_query($con,$sql);
    $dados=mysqli_fetch_array($result);
    $num="0";
    $pag="";

    if(isset($_POST['Paypal'])){
        $pag="Paypal";
    }elseif (isset($_POST['Multibanco'])){
        $pag="Multibanco";
    }elseif (isset($_POST['Transfer'])){
        $pag="Tranferência";
    }

    $sql="insert into encomendas (encomendaPerfilId,encomendaCodPostal,encomendaMorada,encomendaLocal,encomendaNum,encomendaPagam,encomendaPrec)";
    $sql .= " values('".$pid."','".$cod."','".$mor."','".$loc."','".$num."','".$pag."','".$tot."');";
    mysqli_query($con,$sql); //or die(mysqli_error($con))

    $sql="select * from encomendas order by encomendaId DESC limit 1";
    $result=mysqli_query($con,$sql);
    $dados=mysqli_fetch_array($result);
    $encid = $dados['encomendaId'];

//Seleciona o carrinho
    $sql="select * from carrinhos where carrinhoPerfilId=".$pid;
    $result=mysqli_query($con,$sql);
    $dados=mysqli_fetch_array($result);
    $carrinhoId = $dados['carrinhoId'];
//Copiar os produtos atualmenete no carrinho para encomenda

    $sql="select * from carrinhoProdutos where carrinhoProdutoCarrinhoId=".$carrinhoId;
    $result2 = mysqli_query($con,$sql);

    while($dados=mysqli_fetch_array($result2)) {
        $qt=$dados['carrinhoProdutoQnt'];
        $sql = "Insert into encomendaProdutos (encomendaProdutoQnt,encomendaProdutoTam,encomendaProdutoProdutoId,encomendaProdutoEncomendaId)";
        $sql .= " values('".$qt."','".$dados['carrinhoProdutoTam']."','".$dados['carrinhoProdutoProdutoId']."','".$encid."');";
        $result=mysqli_query($con,$sql) or die(mysqli_error($con));
    }

    $sql="Delete from carrinhoProdutos where carrinhoProdutoCarrinhoId=".$carrinhoId;
    $result = mysqli_query($con,$sql) or die(mysqli_error($con));
    $sql="Delete from carrinhos where carrinhoPerfilId=".$pid;
    $result = mysqli_query($con,$sql) or die(mysqli_error($con));

}else{
header("location:login.php");

}

header("location:my-account.php");


