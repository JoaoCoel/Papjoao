<?php
$id=intval($_POST['utilizador']);
$con=mysqli_connect("localhost","root","","pap2021drk");
$sql="Select * from utilizadores where utilizadorId=".$id;
$res=mysqli_query($con,$sql);
$dados=mysqli_fetch_array($res);
session_start();
$_SESSION['id']=$dados['utilizadorId'];
$_SESSION['nome']=$dados['utilizadorNome'];

header("location:index.php");
?>