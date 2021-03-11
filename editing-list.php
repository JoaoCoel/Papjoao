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
                $sql="Select produtoId,produtoNome,produtoPreco,categorias.categoriaNome as categ,tipos.tipoNome as tipo, produtoImagemURL from produtos left join categorias on produtoTipoCategoriaCategoriaId=categoriaId 
                      left join tipos on produtoTipoCategoriaTipoId=tipoId";

                $result=mysqli_query($con,$sql);

                echo "<table>";
                    while($dados=mysqli_fetch_array($result)){

                        echo "<tr>";
                        echo "<td width='5%'>".$dados['produtoId']."</td>";
                        echo "<td width='15%'>".$dados['produtoNome']."</td>";
                        echo "<td width='10%'>".$dados['produtoPreco']."</td>";
                        echo "<td width='10%'>".$dados['categ']."</td>";
                        echo "<td width='20%'>".$dados['tipo']."</td>";
                        echo "<td width='20%'><img src=\"../".$dados['produtoImagemURL']."\"></td>";
                        //echo "<td width='10%'><a href='edit-product.php?id=".$dados['produtoId']."'/a>Editar</td>";
                        //echo "<td width='10%'><a href='delete-product.php?id=".$dados['produtoId']."' /a>Eliminar</td>";
                        echo "<td width='10%'><button type='button' onclick=\"edit(".$dados['produtoId'].");\">Editar</button></td>";
                        echo "<td width='10%'><button type='button' onclick=\"confirmDelete(".$dados['produtoId'].");\">Eliminar</button></td>";
                        echo "</tr>";

                    }
                    //*******************
                    echo "</table>";
                ?>
                <td><a href="available-sizes.php">Listar tamanhos</a></td>
            </tr>
    </table>

</div>



<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
</body>
<?php
bottom();
?>
<script>
    function confirmDelete(prodId)
    {
        let r=confirm("Tem a certeza? ("+prodId+")");
        if (r == true) {
            window.location.href = "delete-product.php?id="+prodId;
        }
    }


    function edit(prodId)
    {
        window.location.href = "edit-product.php?id="+prodId;
    }

</script>
