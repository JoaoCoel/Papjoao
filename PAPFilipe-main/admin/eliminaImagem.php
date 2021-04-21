<?php

$con = mysqli_connect("localhost", "root", "", "pap2021sneakerstore");
$id = intval($_GET['id']);
$sql="select imagemProdutoId from imagens";
$result = mysqli_query($con, $sql);
$dados = mysqli_fetch_array($result);

 echo $sql = "delete from imagens where imagemId = '$id'";

mysqli_query($con, $sql);
header("location:adminImagens.php?id=".$dados['imagemProdutoId']);
?>