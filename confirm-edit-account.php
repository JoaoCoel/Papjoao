<?php
include_once ("includes/body.inc.php");
$id=intval($_POST['perfilId']);
$perfilEstado=($_POST['perfilEstado']);
$perfilAdmin=($_POST['perfilAdmin']);

$sql="Update perfis set perfilEstado='".$perfilEstado."',perfilAdmin='".$perfilAdmin."' where perfilId=".$id ;
mysqli_query($con,$sql) or die(mysqli_error($con));
header("location:user-list.php");