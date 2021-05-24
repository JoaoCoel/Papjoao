<?php
include_once ("includes/body.inc.php");
$id=intval($_POST['perfilId']);
$perfilNome=$_POST['perfilNome'];
$perfilTele=$_POST['perfilTele'];

$sql="Update perfis set perfilNome='".$perfilNome."',perfilTele='".$perfilTele."' where perfilId=".$id ;
mysqli_query($con,$sql) or die(mysqli_error($con));
header("location:my-account.php");


