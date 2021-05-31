<?php
include_once ("includes/body.inc.php");
$id=intval($_GET['id']);
$sql= "delete from favoritoprodutos where favoritoProdutoFavoritoId=".$id;
mysqli_query($con,$sql);

header("location:wishlist.php");

?>