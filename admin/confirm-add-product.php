<?php
include_once ("includes/body.inc.php");
//$con=mysqli_connect(HOST,USER,PWD,DATABASE);
//$con->set_charset("utf8");
//var_dump($_POST);
//var_dump($_FILES);

$nome=addslashes($_POST['nomeProduto']);
$desc=addslashes($_POST['descProduto']);
$disc=floatval($_POST['descontoProduto']);
//$descr =addslashes($_POST['nomeProduto']);
$preco =floatval($_POST['precoProduto']);
$categoriaId=intval($_POST['categoriaProduto']);
$tipoId=intval($_POST['tipoProduto']);
$genero=addslashes($_POST['generoProduto']);
$imagem=$_FILES['imagemProduto']['name'];
$imagemUrl="images/".$imagem;

if($imagem!=''){
    copy($_FILES['imagemProduto']['tmp_name'], '../'.$imagemUrl);
}

//$sql="insert into tipoCategorias(tipoCategoriaCategoriaId,tipoCategoriaTipoId) values ('".(int)$categoriaId."','".(int)$tipoId."')";
//mysqli_query($con,$sql);// or die(mysqli_error($con));

$sql="insert into produtos (produtoNome,produtoPreco,produtoDesconto,produtoDestaque,produtoImagemURL,produtoTipoCategoriaCategoriaId,produtoTipoCategoriaTipoId,produtoGenero,produtoDescricao)";
$sql .= " values('".$nome."',".$preco.",".$disc.",'Nao','".$imagemUrl."',".$categoriaId.",".$tipoId.",'".$genero."','".$desc."');";
mysqli_query($con,$sql) or die(mysqli_error($con));



$sql = "Select * from produtos order by produtoId DESC LIMIT 1";
$result=mysqli_query($con,$sql) or die(mysqli_error($con));
$dados=mysqli_fetch_array($result);
$idProduto=$dados['produtoId'];




$sql="select * from tamanhos";
$result=mysqli_query($con,$sql);
while ($dados=mysqli_fetch_array($result)){
    $field="size".$dados['tamanhoId'];
    if (isset($_POST[$field])){
        $sql="insert into produtotamanhos (produtoTamanhoTamanhoId, produtoTamanhoProdutoId)";
        $sql .= " values(".$dados['tamanhoId'].",".$idProduto.");";
        mysqli_query($con,$sql) or die(mysqli_error($con));



    }

}
header("location:editing-list.php");
/*
$sql="select * from tipoCategorias";
$result=mysqli_query($con,$sql);
while ($dados=mysqli_fetch_array($result)){
    echo "<br>IDCAt=".$dados['tipoCategoriaCategoriaId']." IDTipo=".$dados['tipoCategoriaTipoId'];
}

$sql="select * from produtos";
$result=mysqli_query($con,$sql);
while ($dados=mysqli_fetch_array($result)){
    echo "<br>ID=".$dados['produtoId']." Nome=".$dados['produtoNome'];
}
*/

?>