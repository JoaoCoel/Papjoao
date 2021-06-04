<?php
include_once ("includes/body.inc.php");
$id=intval($_POST['perfilId']);
$pass=$_POST['oldpass'];
$passn=$_POST['pass'];
$perfilNome=$_POST['perfilNome'];
$perfilTele=$_POST['perfilTele'];

$sql="select * from utilizadores left join perfis on utilizadorPerfilId=perfilId where utilizadorId=".$_SESSION['id'];
$result=mysqli_query($con,$sql);
$dados=mysqli_fetch_array($result);

if (strlen ($passn) > 0) {


} else {
    $sql="Update perfis set perfilNome='".$perfilNome."',perfilTele='".$perfilTele."' where perfilId=".$id ;
    mysqli_query($con,$sql) or die(mysqli_error($con));
    header("location:user-list.php");
}

