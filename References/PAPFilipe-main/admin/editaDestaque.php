<?php
$id=intval($_GET['id']); // imagem escolhida
include_once("../includes/body.inc.php");

$sql="select imagemDestaque, imagemProdutoId from imagens where imagemId=".$id;
$result = mysqli_query($con, $sql);
$dados = mysqli_fetch_array($result);
$sql="update imagens set imagemDestaque ='nao' where imagemId<>".$id ." and imagemProdutoId=".$dados['imagemProdutoId'];
mysqli_query($con, $sql);
$sql="update imagens set imagemDestaque ='sim' where imagemId=".$id;
mysqli_query($con, $sql);
header("location:../admin/adminImagens.php?id=".$dados['imagemProdutoId']);
?>