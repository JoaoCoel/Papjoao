<?php
include_once ("includes/body.inc.php");
//$con=mysqli_connect(HOST,USER,PWD,DATABASE);
//$con->set_charset("utf8");
//var_dump($_POST);
//var_dump($_FILES);

$slidesc=addslashes($_POST['descImage']);
$cat=addslashes($_POST['categoria']);
$gen=addslashes($_POST['genero']);
$sli=$_FILES['slideshowImagemURL']['name'];
$sliUrl="images/".$sli;

if($sli!=''){
    copy($_FILES['slideshowImagemURL']['tmp_name'], '../'.$sliUrl);
}

//$sql="insert into tipoCategorias(tipoCategoriaCategoriaId,tipoCategoriaTipoId) values ('".(int)$categoriaId."','".(int)$tipoId."')";
//mysqli_query($con,$sql);// or die(mysqli_error($con));

$sql="insert into slideshowImagens (slideshowImagemURL,slideshowImagemTexto,slideshowImagemCat,slideshowImagemGen)";
$sql .= " values('".$sliUrl."','".$slidesc."','".$cat."','".$gen."');";
mysqli_query($con,$sql);//or die(mysqli_error($con))
header("location:slideshow-image-list.php");

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