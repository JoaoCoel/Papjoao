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

<div class="wishlist-page">
    <div class="container-fluid">
        <div class="wishlist-page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <div class="container">
                            <a class="ml-5" href="add-product.php">Adicionar</a>
                            <table class="table table-bordered">
                                <tr>
                                    <thead class="thead-dark">
                                        <th align='center'>Id</th>
                                        <th align='center'>Nome</th>
                                        <th align='center'>Preço</th>
                                        <th align='center'>Categoria</th>
                                        <th align='center'>Tipo</th>
                                        <th align='center'>Género</th>
                                        <th align='center'>Destaque</th>
                                        <th width="20%" align='center'>Imagem</th>
                                        <th colspan="4" width="25%">Opções</th>
                                    </thead>
                                </tr>
                                    <tr>
                                        <?php
                                        $sql="Select produtoId,produtoNome,produtoPreco,produtoDestaque,produtoGenero,categorias.categoriaNome as categ,tipos.tipoNome as tipo, produtoImagemURL from produtos 
                                        left join categorias on produtoTipoCategoriaCategoriaId=categoriaId left join tipos on produtoTipoCategoriaTipoId=tipoId";

                                        $result=mysqli_query($con,$sql);

                                        //echo "<table class='table table-striped'>";
                                            while($dados=mysqli_fetch_array($result)){

                                                echo "<tr>";
                                                echo "<td align='center'>".$dados['produtoId']."</td>";
                                                echo "<td align='center'>".$dados['produtoNome']."</td>";
                                                echo "<td align='center'>".$dados['produtoPreco']."</td>";
                                                echo "<td align='center'>".$dados['categ']."</td>";
                                                echo "<td align='center'>".$dados['tipo']."</td>";
                                                echo "<td align='center'>".$dados['produtoGenero']."</td>";
                                                echo "<td align='center'>".$dados['produtoDestaque']."</td>";
                                                echo "<td width='20%' align='center'><img width=100px src=\"../".$dados['produtoImagemURL']."\"></td>";
                                                //echo "<td width='10%'><a href='edit-product.php?id=".$dados['produtoId']."'/a>Editar</td>";
                                                //echo "<td width='10%'><a href='delete-product.php?id=".$dados['produtoId']."' /a>Eliminar</td>";
                                                echo "<td align='center'><button type='button' class='btn-cart' onclick=\"edit(".$dados['produtoId'].");\">Editar</button></td>";
                                                echo "<td align='center'><button type='button' class='btn-cart' onclick=\"confirmDelete(".$dados['produtoId'].");\">Eliminar</button></td>";
                                                echo "</tr>";

                                            }
                                            //*******************
                                            //echo "</table>";
                                        ?>
                                    </tr>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
