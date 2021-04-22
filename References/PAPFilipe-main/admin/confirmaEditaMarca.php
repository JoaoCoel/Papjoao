<?php
include_once("../includes/body.inc.php");
//$con=mysqli_connect(HOST,USER,PWD,DATABASE);
$nome=addslashes($_POST['nomeMarca']);
$id=intval($_POST['marcaId']);
$imagem=$_FILES['logoMarca']['name'];
$novoNome="images/".$imagem;
$sql="Update marcas set marcaNome='".$nome."'";
if($imagem!=''){
    $sql.=", marcaLogoURL='images/".$imagem."'";
    copy($_FILES['logoMarca']['tmp_name'],$novoNome);
}
$sql.=" where marcaId=".$id;
mysqli_query($con,$sql);
header("location:adminMarcas.php");
?>
