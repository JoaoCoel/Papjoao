<?php
include_once ("includes/body.inc.php");
//$con=mysqli_connect(HOST,USER,PWD,DATABASE);
//$con->set_charset("utf8");

//var_dump($_FILES);
if(isset($_SESSION['id'])){

if (isset($_GET['id'])) {
    $id=intval($_GET['id']);
} elseif (isset($_POST['produtoId'])) {
    $id=intval($_POST['produtoId']);
}
if(isset($_POST['sign'])) {
   $sign = $_POST['sign'];
}
if (isset($_GET['orig'])) {
    $orig = $_GET['orig'];
}

$uid=intval($_SESSION['id']);
$pid=intval($_SESSION['pid']);

//Verificar se o utilizador tem carrinho e criar se não tiver
    $sql="select * from carrinhos where carrinhoPerfilId=".$pid;
    $result=mysqli_query($con,$sql);
    $dados=mysqli_fetch_array($result);

    if($result->num_rows <= 0) {
        $sql="insert into carrinhos (carrinhoPerfilId)";
        $sql .= " values('".$pid."');";
        mysqli_query($con,$sql); //or die(mysqli_error($con))
    }
//Inserir produto no carrinho (tabela carrinhoProduto)
    $sql="select * from carrinhos where carrinhoPerfilId=".$pid;
    $result=mysqli_query($con,$sql);
    $dados=mysqli_fetch_array($result);
    $carrinhoId = $dados['carrinhoId'];
//Ir buscar os produtos atualmenyete no carrinho

    $sql="select * from carrinhoProdutos where carrinhoProdutoCarrinhoId=".$dados['carrinhoId'];
    $result = mysqli_query($con,$sql) ;
    $exists = 0;
    while($dados=mysqli_fetch_array($result)) {
        if ($dados['carrinhoProdutoProdutoId'] == $id){
            $v=1;
            if(isset($sign)){
                $v = $sign;
            }
            $qt=$dados['carrinhoProdutoQnt'] + $v;
            $sql = "update carrinhoProdutos set carrinhoProdutoQnt=".$qt." where carrinhoProdutoCarrinhoId=".$carrinhoId." and carrinhoProdutoProdutoId=".$id;
            $result=mysqli_query($con,$sql) or die(mysqli_error($con));
            $exists = 1;
            break;
        }
    }
    If (!$exists) {
        $sql = "insert into carrinhoProdutos (carrinhoProdutoCarrinhoId,carrinhoProdutoProdutoId) values(".$carrinhoId.",".$id.")";
        mysqli_query($con,$sql) or die(mysqli_error($con));
    }

}else{
header("location:login.php");

}
if(isset($sign)){
    header("location:cart.php");
} else {
    $ref = $_SERVER['HTTP_REFERER'];

    $pos = strrpos ($ref,"/");
    $ref= substr($ref,$pos+1, strlen($ref)-$pos);
    var_dump($ref);
    header("location:".$ref);
}

?>