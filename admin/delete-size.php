<?php
include_once ("includes/body.inc.php");
$id=intval($_GET['id']);
$sql= "delete from tamanhos where tamanhoId=".$id;
mysqli_query($con,$sql);
//$sql= "delete from produtotamanhos where produtoTamanhosTamanhoId=".$id;
//mysqli_query($con,$sql);
header("location:size-list.php");

?>