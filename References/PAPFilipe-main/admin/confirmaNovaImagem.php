<?php
include_once("../includes/body.inc.php");

$con=mysqli_connect(HOST,USER,PWD,DATABASE);
$id=intval($_POST['idProduto']);
$nome=addslashes($_POST['nomeImagem']);
$imagem=$_FILES['logoImagem']['name'];
$novoNome="images/".$imagem;

copy($_FILES['logoImagem']['tmp_name'],"../".$novoNome);

$sql="insert into imagens(imagemNome,imagemURL,imagemProdutoId,imagemId) 
values('".$nome."','".$novoNome."','".$id."',0);";
mysqli_query($con,$sql);
$lastId=mysqli_insert_id($con); // último ID automático
// se não existe nenhuma imagem em destaque a útlima fica em destaque
$sql="Select * from imagens where imagemDestaque = 'sim' and imagemProdutoId=".$id;
mysqli_query($con,$sql);
if(mysqli_affected_rows($con)==0){// não há nenhuna imagem em destaque
    $sql="update imagens set imagemDestaque = 'sim' where imagemId=".$lastId;
    mysqli_query($con,$sql);
}




header("location:adminImagens.php?id=".$id);
?>