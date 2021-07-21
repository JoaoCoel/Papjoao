<?php
include_once ("includes/body.inc.php");
//$con=mysqli_connect(HOST,USER,PWD,DATABASE);
//$con->set_charset("utf8");
//var_dump($_FILES);

$sql="Select * from tipos";
$tipos=mysqli_query($con,$sql);

$tipo=($_POST['nomeTipo']);
$idTipo=($_POST['idTipo']);

while ($dados=mysqli_fetch_array($tipos)) {
    if ($dados['tipoNome'] == $tipo && $dados['tipoId'] != $idTipo) {
        $idTipo = -1;
        break;
    }
}

if($idTipo>0){
    $sql="update tipos set tipoNome='".$tipo."' where tipoId=".$idTipo;
    mysqli_query($con,$sql) or die(mysqli_error($con));
    /*$sql="Select * from categorias";
    $categorias=mysqli_query($con,$sql);
    while ($dados=mysqli_fetch_array($categorias)){
        $field="categ".$dados['categoriaId'];
        if (isset($_POST[$field])){
            $sql="insert into tipoCategorias (tipoCategoriaCategoriaId, tipoCategoriaTipoId)";
            $sql .= " values(".$dados['categoriaId'].",".$idTipo.");";
            mysqli_query($con,$sql) or die(mysqli_error($con));
        }
    }*/
}

header("location:type-list.php");

?>