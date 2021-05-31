<?php
include_once ("includes/body.inc.php");
if(isset($_SESSION['id'])) {
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $uid = intval($_SESSION['id']);
        $pid = intval($_SESSION['pid']);


        $sql = "delete from favoritos where favoritoProdutoId=" . $id . " and favoritoPerfilId=" . $pid;
        mysqli_query($con, $sql);
    }
}
header("location:wishlist.php");

?>