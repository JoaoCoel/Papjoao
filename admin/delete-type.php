<?php
include_once ("includes/body.inc.php");
$id=intval($_GET['id']);
$sql= "delete from produtos where produtoTipoCategoriaTipoId=".$id;
mysqli_query($con,$sql) or die(mysqli_error($con));
$sql= "delete from tipoCategorias where tipoCategoriaTipoId=".$id;
mysqli_query($con,$sql);
$sql= "delete from tipos where tipoId=".$id;
mysqli_query($con,$sql);


header("location:type-list.php");

?>