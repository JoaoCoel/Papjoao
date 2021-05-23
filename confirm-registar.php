<?php
include_once ("includes/body.inc.php");

$email=$_POST['email'];
$nome= $_POST['nome'];
$tele=intval($_POST['tele']);
$pass=addslashes($_POST['pass']);

$sql="insert into perfis (perfilNome,perfilTele,perfilEstado,perfilAdmin)";
$sql .= " values('".$nome."',".$tele.",\"pendente\",\"nao\");";
mysqli_query($con,$sql);

$sql="select * from perfis order by perfilId desc limit 1";
$row=mysqli_query($con,$sql);
$dados = mysqli_fetch_array($row);

//or die(mysqli_error($con))

$sql2="insert into utilizadores (utilizadorEmail,utilizadorPass,utilizadorPerfilId)";
$sql2 .= " values('".$email."','".$pass."','".$dados['perfilId']."')";
mysqli_query($con,$sql2);


//var_dump($_POST);
header("location:login.php");
?>