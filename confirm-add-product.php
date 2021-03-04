<?php
include_once ("includes/body.inc.php");

var_dump($_POST);
var_dump($_FILES);

$nome=addslashes($_POST['nomeProduto']);
//$descr =addslashes($_POST['nomeProduto']);
$preco =addslashes($_POST['precoProduto']);
$categoriaId=intval($_POST['categoriaProduto']);
$tipoId=intval($_POST['tipoProduto']);
$imagem=$_FILES['img']['name'];
$imagemUrl="Papjoao/img/".$imagem;

//copy($_FILES['img']['tmp_name'],$imagemUrl);

$sql="insert into produtos(produtoNome,produtoPreco,produtoImagem,produtoTipoCategoriaCategoriaId,produtoTipoCategoriaTipoId)
 values('".$nome."','".$preco."','".$imagemUrl."','1','1');";
mysqli_query($con,$sql);
header("location:../Papjoao/editing-list.php");


?>
