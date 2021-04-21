<?php
include_once("../includes/body.inc.php");
//$con=mysqli_connect(HOST,USER,PWD,DATABASE);
$nome=addslashes($_POST['nomeImagem']);
$id=intval($_POST['imagemId']);
$imagem=$_FILES['imagem']['name'];
$novoNome="images/".$imagem;
echo $sql="select imagemProdutoId from imagens where imagemId=".$id;
$result = mysqli_query($con, $sql);
$dados = mysqli_fetch_array($result);
$sql="Update imagens set imagemNome='".$nome."'";
if($imagem!=''){
    $sql.=", imagemURL='images/".$imagem."'";
    copy($_FILES['imagem']['tmp_name'],$novoNome);
}
$sql.=" where imagemId=".$id;
mysqli_query($con,$sql);
header("location:adminImagens.php?id=".$dados['imagemProdutoId']);
?>
