<?php
include_once("../includes/body.inc.php");
top_2();
$id = intval($_GET['id']);
$con=mysqli_connect(HOST,USER,PWD,DATABASE);
$sql="Select * from imagens where imagemProdutoId=$id";
$result=mysqli_query($con,$sql);
?>
<a href="admin.php"
<button type="button" class="btn btn-light">Voltar</button></a>

<script>
    function confirmaElimina(id) {
        if(confirm('Confirma que deseja eliminar a imagem?'))
            window.location="eliminaImagem.php?id=" + id;
    }
</script>
<table class='table table-striped'  style="width: 100%; margin-bottom: 200px; border: 2px black;">
    <tr>
        <td colspan="6" align='right'>
            <a href="adicionaImagem.php?id=<?php echo $id?>"><button type="button" class="btn btn-success button1">Adicionar Imagem</button></a>
        </td>
    </tr>
    <tr>
        <th>Id</th>
        <th>Nome</th>
        <th>Imagem</th>
        <th colspan="2">op&ccedil&otildees</th>
    </tr>
    <?php
    while($dados=mysqli_fetch_array($result)){
        ?>
        <tr>
            <td><?php echo $dados['imagemId']?></td>
            <td><?php echo $dados['imagemNome']?></td>
            <td><img width='90' src="../<?php echo $dados['imagemURL']?>"></td>
            <td><a href="editaDestaque.php?id=<?php echo $dados['imagemId']?>">
                    <?php  if($dados['imagemDestaque'] == "sim"){?>
                        <i class="fas fa-star  text-warning"></i>
                 <?php
                    } else {
                 ?>
                    <i class="far fa-star  text-warning"></i>
                    <?php
                    }
                    ?>
                </a></td>
            <td><a href="editaImagem.php?id=<?php echo $dados['imagemId']?>"> <button type="button" class="btn btn-info button1">Edita</button></a></td>
            <td><a href="#" onclick="confirmaElimina(<?php echo $dados['imagemId']?>);"> <button type="button" class="btn btn-danger button1">Elimina</button></a></td>
        </tr>
        <?php
    }
    ?>


</table>

<?php

bot();
?>

