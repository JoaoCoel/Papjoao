<?php
include_once ("includes/body.inc.php");
//$con=mysqli_connect(HOST,USER,PWD,DATABASE);
//$con->set_charset("utf8");
var_dump($_POST);
//var_dump($_FILES);

$sql="Select * from tipos";
$tipos=mysqli_query($con,$sql);
$sql="Select * from categorias";
$categorias=mysqli_query($con,$sql);
$tipo=($_POST['nomeTipo']);
$idTipo=-1;

//$sql="insert into tipoCategorias(tipoCategoriaCategoriaId,tipoCategoriaTipoId) values ('".(int)$categoriaId."','".(int)$tipoId."')";
//mysqli_query($con,$sql);// or die(mysqli_error($con));


if (isset($_POST['addType'])){
    $tipo=$_POST['nomeTipo'];
    $existe = false;
    while ($dados=mysqli_fetch_array($tipos)) {
        if ($dados['tipoNome'] == $tipo) {
            $idTipo = $dados['tipoId'];
            break;
        }
    }
}

if($idTipo<0){
    $sql="insert into tipos (tipoNome)";
    $sql .= " values('".$tipo."');";
    mysqli_query($con,$sql) or die(mysqli_error($con));
    $sql = "Select * from tipos order by tipoId DESC LIMIT 1";
    $result=mysqli_query($con,$sql) or die(mysqli_error($con));
    $dados=mysqli_fetch_array($result);
    $idTipo=$dados['tipoId'];

}else{
    $sql="delete from tipoCategorias where tipoCategoriaTipoId=".$idTipo;
    mysqli_query($con,$sql) or die(mysqli_error($con));
}



//or die(mysqli_error($con));
//header("location:type-list.php");


$sql="select * from categorias";
$result=mysqli_query($con,$sql);
while ($dados=mysqli_fetch_array($result)){
    $field="categ".$dados['categoriaId'];
    if (isset($_POST[$field])){
        $sql="insert into tipoCategorias (tipoCategoriaCategoriaId, tipoCategoriaTipoId)";
        $sql .= " values(".$dados['categoriaId'].",".$idTipo.");";
        mysqli_query($con,$sql) or die(mysqli_error($con));

    }
}

header("location:type-list.php");

?>