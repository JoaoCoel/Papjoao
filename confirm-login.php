<?php
$id=intval($_POST['utilizador']);
$con=mysqli_connect("localhost","root","","users");
$sql="Select * from users where userId=".$id;
$res=mysqli_query($con,$sql);
$dados=mysqli_fetch_array($res);
session_start();
$_SESSION['id']=$dados['userId'];
$_SESSION['nome']=$dados['userName'];

header("location:index.php");
?>