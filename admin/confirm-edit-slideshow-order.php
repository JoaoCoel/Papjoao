<?php
include_once ("includes/body.inc.php");
$id=intval($_POST['id']);
$ord=intval($_POST['ord']);



$sql="Update slideshowimagens set slideshowImagemOrd='".$ord."' where slideshowImagemId=".$id;
mysqli_query($con,$sql) or die(mysqli_error($con));
header("location:slideshow-image-list.php");