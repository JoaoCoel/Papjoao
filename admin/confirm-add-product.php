<?php
include_once ("includes/body.inc.php");
//$con=mysqli_connect(HOST,USER,PWD,DATABASE);
//$con->set_charset("utf8");
//var_dump($_POST);
//var_dump($_FILES);

print_r($_FILES);

$nome=addslashes($_POST['nomeProduto']);
//$descr =addslashes($_POST['nomeProduto']);
$preco =floatval($_POST['precoProduto']);
$categoriaId=intval($_POST['categoriaProduto']);
$tipoId=intval($_POST['tipoProduto']);
$imagem=$_FILES['imagemProduto']['name'];
$imagemUrl="images/".$imagem;

if($_FILES['imagemProduto']['name']!=""){
    if(copy($_FILES['imagemProduto']['tmp_name'],'../'.$imagemUrl))
        echo "siiiimmmmm";
}

//$sql="insert into tipoCategorias(tipoCategoriaCategoriaId,tipoCategoriaTipoId) values ('".(int)$categoriaId."','".(int)$tipoId."')";
//mysqli_query($con,$sql);// or die(mysqli_error($con));

echo $sql="insert into produtos(produtoNome,produtoPreco,produtoDestaque,produtoImagemURL,produtoTipoCategoriaCategoriaId,produtoTipoCategoriaTipoId)
 values('".$nome."',".$preco.",'Nao','".$imagemUrl."',".$categoriaId.",".$tipoId.")";
mysqli_query($con,$sql);// or die(mysqli_error($con));
//header("location:editing-list.php");

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