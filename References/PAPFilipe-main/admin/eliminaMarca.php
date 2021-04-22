<?php

$con = mysqli_connect("localhost", "root", "", "pap2021sneakerstore");
$id = intval($_GET['id']);
$sql = "delete from marcas where marcaId = ".$id;
$sql2 = "delete from produtos where produtoMarcaId = ".$id;
$sql3 = "delete from imagens where iamgemPordutoId = ".$id;

mysqli_query($con, $sql3);
mysqli_query($con, $sql2);
mysqli_query($con, $sql);


header("location:adminMarcas.php");
?>