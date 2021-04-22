<?php
// dados na base de dados
    include_once("../includes/body.inc.php");
    $id=intval($_POST['idMarca']);
    $sql="Select * from marcas where marcaId=$id";

    $result=mysqli_query($con,$sql);
    $dados=mysqli_fetch_array($result);
    echo $dados['marcaNome'];
?>