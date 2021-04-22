<?php
include_once ("includes/body.inc.php");
$id=intval($_POST['idProduto']);
$nome=addslashes($_POST['nomeProduto']);
$preco =floatval($_POST['precoProduto']);
$disc =floatval($_POST['descontoProduto']);
$categoriaId=intval($_POST['categoriaProduto']);
$tipoId=intval($_POST['tipoProduto']);
$genero=addslashes($_POST['generoProduto']);
$desc=addslashes($_POST['descProduto']);
$destaque=($_POST['produtoDestaque']);
$imagem=$_FILES['imagemProduto']['name'];
$imagemUrl="images/".$imagem;
$sql="Update produtos set produtoNome='".$nome."',produtoPreco='".$preco."',produtoDesconto='".$disc."',produtoDescricao='".$desc."',";

if($imagem!=''){
    $sql.="produtoImagemURL='".$imagemUrl."',";
    copy($_FILES['imagemProduto']['tmp_name'],'../'.$imagemUrl);
}

$sql.="produtoTipoCategoriaCategoriaId='".(int)$categoriaId."',produtoTipoCategoriaTipoId='".(int)$tipoId."'";
$sql.=" , produtoDestaque='".$destaque."', produtoGenero='".$genero."'";
$sql.=" where produtoId=".$id.";";


mysqli_query($con,$sql);

$sql="delete from produtotamanhos where produtoTamanhoProdutoId=".$id;
mysqli_query($con,$sql) or die(mysqli_error($con));


$sql="select * from tamanhos";
$result=mysqli_query($con,$sql);
while ($dados=mysqli_fetch_array($result)){
    $field="size".$dados['tamanhoId'];
    if (isset($_POST[$field])){
        $sql="insert into produtotamanhos (produtoTamanhoTamanhoId, produtoTamanhoProdutoId)";
        $sql .= " values(".$dados['tamanhoId'].",".$id.");";
        mysqli_query($con,$sql) or die(mysqli_error($con));



    }

}
//var_dump($_POST);

 //or die(mysqli_error($con));
header("location:editing-list.php");

?>


