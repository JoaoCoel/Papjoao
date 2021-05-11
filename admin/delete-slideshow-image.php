<?php
include_once ("includes/body.inc.php");
$id=intval($_GET['id']);
$sql= "delete from slideshowImagens where slideshowImagemId=".$id;
mysqli_query($con,$sql);
header("location:category-list.php");

?>