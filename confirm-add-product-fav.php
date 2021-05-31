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

$uid=intval($_SESSION['id']);
$pid=intval($_SESSION['pid']);

//Verificar se o utilizador tem carrinho e criar se não tiver
    $sql="select * from favoritos where favoritoPerfilId=".$pid;
    $result=mysqli_query($con,$sql);
    $dados=mysqli_fetch_array($result);

    if($result->num_rows <= 0) {
        $sql="insert into favoritos (favoritoPerfilId)";
        $sql .= " values('".$pid."');";
        mysqli_query($con,$sql); //or die(mysqli_error($con))
    }
//Inserir produto no carrinho (tabela carrinhoProduto)
    $sql="select * from favoritos where favoritoPerfilId=".$pid;
    $result=mysqli_query($con,$sql);
    $dados=mysqli_fetch_array($result);
    $favoritoId = $dados['favoritoId'];
//Ir buscar os produtos atualmente no carrinho

    $sql="select * from favoritoprodutos where favoritoProdutoFavoritoId=".$dados['favoritoId'];
    $result = mysqli_query($con,$sql) ;

}else{
header("location:login.php");

}

header("location:product-detail.php?id=".$id);


