<?php
include_once ("includes/body.inc.php");
//$con=mysqli_connect(HOST,USER,PWD,DATABASE);
//$con->set_charset("utf8");
//var_dump($_POST);
//var_dump($_FILES);

$categoria=($_POST['nomeCategoria']);

//$sql="insert into tipoCategorias(tipoCategoriaCategoriaId,tipoCategoriaTipoId) values ('".(int)$categoriaId."','".(int)$tipoId."')";
//mysqli_query($con,$sql);// or die(mysqli_error($con));

$sql="insert into categorias (categoriaNome)";
$sql .= " values('".$categoria."');";
mysqli_query($con,$sql);// or die(mysqli_error($con));
header("location:category-list.php");

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