<?php
include_once ("includes/body.inc.php");

$mor=$_POST['mor'];
$cod=$_POST['codP'];
$loc=$_POST['loc'];

$uid=intval($_SESSION['id']);
$pid=intval($_SESSION['pid']);


$sql="select * from enderecos where enderecoPerfilId=".$pid;
$result=mysqli_query($con,$sql);

if($result->num_rows <= 0) {
    $sql="insert into enderecos (enderecoMorada,enderecoCodPostal,enderecoLocal,enderecoPerfilId)";
    $sql .= " values('".$mor."','".$cod."','".$loc."',".$pid.");";
    mysqli_query($con,$sql) or die(mysqli_error($con));
}else{
$sql="Update enderecos set enderecoMorada='".$mor."',enderecoCodPostal='".$cod."',enderecoLocal='".$loc."' where enderecoPerfilId=".$pid ;
mysqli_query($con,$sql) or die(mysqli_error($con));
}

$ref = $_SERVER['HTTP_REFERER'];

$pos = strrpos ($ref,"/");
$ref= substr($ref,$pos+1, strlen($ref)-$pos);

header("location:".$ref);


