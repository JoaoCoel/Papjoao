<?php
include_once ("includes/body.inc.php");
top();

?>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Lista produtos</title>
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

<div class="container">
    <a href="index.php">Voltar</a>
    <a class="ml-5" href="add-product.php">Adicionar</a>
    <table class="table table-striped">
        <tr>
            <th>Id</th>
            <th width="25%">Nome</th>
            <th>Categoria</th>
            <th>Tipo</th>
            <th>Tamanhos</th>
            <th colspan="4" width="20%">Opções</th>
            <th></th>
        </tr>
            <tr>
                <?php
                $sql="Select * from produtos";
                $result=mysqli_query($con,$sql);

                echo "<table>";
                    while($dados=mysqli_fetch_array($result)){
                    echo "<tr>";

                        echo "<td>".$dados['produtoId']."</td>";
                        echo "<td width='25%'>".$dados['produtoNome']."</td>";

                        //echo "<td width="12,5%"><a href=\"../edita/editaProduto.php?id=".$dados['produtoId']."\"> Editar</a></td>";
                        //echo "<td width="12,5%"><a href=\"#\" onclick=\"confirmaElimina(".$dados['produtoId'].");\">Eliminar</a></td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td><img src=\"../".$dados['produtoImagemURL']."\"></td>";
                        echo "</tr>";

                    }
                    //*******************
                    echo "</table>";
                ?>
                <td><a href="edit-product.php">Editar</a></td>
                <td><a href="available-sizes.php">Listar tamanhos</a></td>
                <td><a href="index.php">Eliminar</a></td>
            </tr>
    </table>

</div>



<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
</body>
<?php
bottom();
?>
