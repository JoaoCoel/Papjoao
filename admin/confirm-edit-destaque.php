<?php
include_once ("includes/body.inc.php");
$id=intval($_POST['idProduto']);
$destaque=($_POST['produtoDestaque']);

$sql="Update produtos set produtoDestaque='".$destaque."'";
mysqli_query($con,$sql) or die(mysqli_error($con));