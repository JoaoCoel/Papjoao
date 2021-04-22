<?php
include_once("../includes/body.inc.php");
top_2();
?>
<div class="container" align="center">
    <h2 align="center" style="margin-bottom: 10px">Adiciona Marca</h2>
<form action="confirmaNovaMarca.php" method="post" enctype="multipart/form-data">
    <label>Nome: </label>
    <input type="text" name="nomeMarca"><br>
    <label>Log&oacutetipo:</label>
    <input type="file" name="logoMarca"><br>
    <br>
    <br>
    <input type="Submit" value="Adiciona" <button type="button" class="btn btn-success button1 mt-3"></button>

