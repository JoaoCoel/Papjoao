<?php

include_once("../includes/body.inc.php");
top_2();
$id = intval($_GET['id']);

$sql = "select * from imagens where imagemId=$id";
$result = mysqli_query($con, $sql);
$dados = mysqli_fetch_array($result);

?>
<script>
    function preview_image(event) {
        var reader = new FileReader();
        reader.onload = function () {
            var output = document.getElementById('output_image');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
<div class="container">
<h2 align="center" style="margin-top: 10%">
    <form action="confirmaEditaImagem.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="imagemId" value="<?php echo $id ?>">
        <label>Nome: </label>
        <input type="text" name="nomeImagem" value="<?php echo $dados ['imagemNome'] ?>"><br>
        <label>Imagem:</label><br>
        <img width="400" id="output_image" src="../<?php echo $dados['imagemURL']?>"><br>
        <input type="file" accept="image/*" name="imagem" onchange="preview_image(event)" style="color: darkgray">
        <br>
        <input type="Submit" value="Edita" <button type="button" class="btn btn-success button1 mt-3"></button>
    </form>
    </div>