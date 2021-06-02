<?php
include_once ("includes/body.inc.php");
$id=intval($_GET['id']);
$sql= "delete from produtos where produtoTipoCategoriaCategoriaId=".$id;
mysqli_query($con,$sql);
$sql= "delete from tipoCategorias where tipoCategoriaCategoriaId=".$id;
mysqli_query($con,$sql);
$sql= "delete from categorias where categoriaId=".$id;
mysqli_query($con,$sql);
header("location:category-list.php");

?>