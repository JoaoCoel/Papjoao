<?php
$id=intval($_POST['idPrd']);
session_start();
array_push($_SESSION['carrinho'],$id);
print_r($_SESSION);
return true;
?>
