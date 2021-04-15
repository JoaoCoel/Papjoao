<?php
include_once ("includes/body.inc.php");
$id=intval($_GET['id']);
$sql= "delete from produtotamanhos where produtoTamanhoProdutoId=".$id;
mysqli_query($con,$sql);
$sql= "delete from produtos where produtoId=".$id;
mysqli_query($con,$sql);

header("location:editing-list.php");

?>