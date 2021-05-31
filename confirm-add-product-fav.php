<?php
include_once ("includes/body.inc.php");
//$con=mysqli_connect(HOST,USER,PWD,DATABASE);
//$con->set_charset("utf8");

//var_dump($_FILES);
if(isset($_SESSION['id'])){

// Product id
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);


        //userId e perfilId
        $uid = intval($_SESSION['id']);
        $pid = intval($_SESSION['pid']);

        //Verificar se produto já está na lista
        $sql = "select * from favoritos where favoritoPerfilId=".$pid." and favoritoProdutoId=".$id;
        $result = mysqli_query($con, $sql);
        if ($result->num_rows <= 0) {
            //Inserir produto na lista de favoritos
            $sql = "insert into favoritos (favoritoPerfilId,favoritoProdutoId) values(".$pid.",".$id.")";
            $result = mysqli_query($con, $sql);
        }


    }

}else{
    header("location:login.php");

}

    $ref = $_SERVER['HTTP_REFERER'];

    $pos = strrpos ($ref,"/");
    $ref= substr($ref,$pos+1, strlen($ref)-$pos);
    var_dump($ref);
    header("location:".$ref);



