<?php
include_once ("includes/body.inc.php");
//$con=mysqli_connect(HOST,USER,PWD,DATABASE);
//$con->set_charset("utf8");
var_dump($_POST);
//var_dump($_FILES);

$tipo=($_POST['nomeTipo']);

//$sql="insert into tipoCategorias(tipoCategoriaCategoriaId,tipoCategoriaTipoId) values ('".(int)$categoriaId."','".(int)$tipoId."')";
//mysqli_query($con,$sql);// or die(mysqli_error($con));

$sql="insert into tipos (tipoNome)";
$sql .= " values('".$tipo."');";
mysqli_query($con,$sql);
//or die(mysqli_error($con));
//header("location:type-list.php");




$sql="select * from categorias";
$result=mysqli_query($con,$sql);
while ($dados=mysqli_fetch_array($result)){
    $field="categ".$dados['categoriaId'];
    if (isset($_POST[$field])){
        $sql="insert into tipoCategorias ";
    }
}



?>