<?php
include_once ("includes/body.inc.php");
$id=intval($_POST['idProduto']);
$nome=addslashes($_POST['nomeProduto']);
//$descr =addslashes($_POST['nomeProduto']);
$preco =floatval($_POST['precoProduto']);
$categoriaId=intval($_POST['categoriaProduto']);
$tipoId=intval($_POST['tipoProduto']);
$destaque=($_POST['produtoDestaque']);
$imagem=$_FILES['imagemProduto']['name'];
$imagemUrl="images/".$imagem;
$sql="Update produtos set produtoNome='".$nome."',produtoPreco='".$preco."',produtoDestaque='Nao',";

if($imagem!=''){
    $sql.="produtoImagemURL='".$imagemUrl."',";
    copy($_FILES['imagemProduto']['tmp_name'],'../'.$imagemUrl);
}

$sql.="produtoTipoCategoriaCategoriaId='".(int)$categoriaId."',produtoTipoCategoriaTipoId='".(int)$tipoId."'";
$sql.=" , produtoDestaque='".$destaque."'";
$sql.=" where produtoId=".$id.";";

mysqli_query($con,$sql); //or die(mysqli_error($con))
header("location:editing-list.php");

?>

