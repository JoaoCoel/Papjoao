<?php
include_once ("includes/body.inc.php");
$id=intval($_POST['produtoId']);
$destaque=($_POST['produtoDestaque']);

$sql="Update produtos set produtoDestaque='".$destaque."' where produtoId=".$id;
mysqli_query($con,$sql);
header("location:editing-list.php");