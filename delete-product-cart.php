<?php
include_once ("includes/body.inc.php");
$id=intval($_GET['id']);
$sql= "delete from carrinhoprodutos where carrinhoProdutoProdutoId=".$id;
mysqli_query($con,$sql);

header("location:cart.php");

?>