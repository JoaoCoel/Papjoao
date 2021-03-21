<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Pesos do produto</title>
    <style>
        .caixa{
            border: solid 1px black;
            text-align: center;
            font-size: 46px;
        }
        .branca{
            background-color: white;
            color: black;

        }
        .preta{
            background-color: black;
            color: white;

        }

    </style>

</head>
<body>



<?php
// ligar à base de dados
$con=mysqli_connect("localhost","root","","papjoao2021");
$sql="select faltaId, faltaData, faltaEstado, alunoNome, alunoId from alunos "; // apenas atribui o texto
$sql.="inner join faltas on alunoId=faltaAlunoId";
if (!empty($_GET)) {
   $sql.=" where alunoId=".$_GET['id'];
}
$sql.=" order by alunoId";

$result=mysqli_query($con,$sql); // "corre o SQL"

?>
<div class="container">
    <a href="index.php">Voltar</a>
    <table class="table table-striped">
        <tr>
            <th>Falta Id</th>
            <th>Aluno Id</th>
            <th>Nome</th>
            <th>Data</th>
            <th>Estado</th>
            <th colspan="1" width="20%">Opções</th>
        </tr>
        <?php
        if(mysqli_affected_rows($con)==0){
            echo "Não há faltas!";
        }else
            while($dados=mysqli_fetch_array($result)){// enquanto existirem registos no result
                ?>
                <tr>
                    <td><?php echo $dados['faltaId'] ?></td>
                    <td><?php echo $dados['alunoId'] ?></td>
                    <td><?php echo $dados['alunoNome'] ?></td>
                    <td><?php echo $dados['faltaData'] ?></td>
                    <td><?php echo $dados['faltaEstado'] ?></td>
                    <td><a href="eliminaFalta.php?id=<?php echo $dados['faltaId']?>">Eliminar</a></td>
                </tr>
                <?php
            }
        ?>

    </table>

</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>