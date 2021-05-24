<?php
include_once ("includes/body.inc.php");
$id=intval($_POST['utilizadorId']);
$pass=$_POST['oldpass'];
$passn=$_POST['pass'];

$sql="select * from utilizadores where utilizadorId=".$id;
$result=mysqli_query($con,$sql);
$dados=mysqli_fetch_array($result);

if ($pass == $dados['utilizadorPass'] && strlen ($passn) > 0) {
    $sql="Update utilizadores set utilizadorPass='".$passn."' where utilizadorId=".$id ;
    mysqli_query($con,$sql) or die(mysqli_error($con));


} else {

}

header("location:my-account.php");