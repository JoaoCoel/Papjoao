<?php
include_once ("includes/body.inc.php");
$id=intval($_GET['id']);
$sql= "delete from tipos where tipoId=".$id;
mysqli_query($con,$sql);
header("location:type-list.php");

?>