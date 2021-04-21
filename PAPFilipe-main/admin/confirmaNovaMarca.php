<?php
include_once("../includes/body.inc.php");


$nome=addslashes($_POST['nomeMarca']);
$imagem=$_FILES['logoMarca']['name'];
$novoNome="../images/".$imagem;

copy($_FILES['logoMarca']['tmp_name'],$novoNome);

echo $sql="insert into marcas(marcaNome,marcaLogoURL)
values('".$nome."','images/".$imagem."');";
mysqli_query($con,$sql);
header("location:adminMarcas.php");
?>