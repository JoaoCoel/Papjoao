<?php
// dados na base de dados
    include_once("../includes/body.inc.php"); //precisa do ../
$con=mysqli_connect(HOST,USER,PWD,DATABASE);
    $sql="Select * from marcas";
    $result=mysqli_query($con,$sql);
top();
?>
<table class='table table-striped'  style="width: 100%; margin-bottom: 200px; border: 2px black;">
    <tr>
        <td colspan="5" align='right'>
            <a href="adicionaMarca.php"><i class='fas fa-plus text-success'> Adiciona</i></a>
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
        <td><?php echo $dados['marcaId']?></td>
        <td><?php echo $dados['marcaNome']?></td>
        <td><img width='90' src="<?php echo $dados['marcaLogoURL']?>"></td>
        <td><a href="editaMarca.php?id=<?php echo $dados['marcaId']?>"> <i class="fas fa-edit text-primary">Edita</i></a></td>
        <td><a href="#" onclick="confirmaElimina(<?php echo $dados['marcaId']?>);"> <i class="fas fa-trash  text-danger">Elimina</i></a></td>
    </tr>
    <?php
    }
    ?>


    </table>

<?php
bot();
?>
