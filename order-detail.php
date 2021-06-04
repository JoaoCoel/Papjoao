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
                            <?php
                            echo "<button type='button' class='btn btn-light' onclick=\"add();\" style='background: #FF6F61; color: #FFF'>Adicionar</button>";
                            ?>
                            <table class="table table-bordered">
                                <tr>
                                    <thead class="thead-dark">
                                        <th align='center'>Nome</th>
                                        <th align='center'>Quantidade</th>
                                        <th align='center'>Tamanho</th>
                                        <th align='center'>Preço</th>
                                        <th width="20%" align='center'>Imagem</th>
                                    </thead>
                                </tr>
                                    <tr>
                                        <?php
                                        $sql="Select * from encomendas left join encomendaprodutos on encomendaId=encomendaProdutoEncomendaId where encomendaPerfilId=".$_SESSION['pid'];

                                        $result=mysqli_query($con,$sql);

                                        //echo "<table class='table table-striped'>";
                                            while($dados=mysqli_fetch_array($result)){
                                        ?>
                                        <a href="product-detail.php?id=<?php echo $dados['encomendaProdutoProdutoId']; ?>">
                                                    <?php
                                                    echo "<tr>";
                                                    echo "<td width='20%' align='center'><img width=100px src=\"../".$dados['produtoImagemURL']."\">".$dados['encomendaProdutoNome']."</td>";
                                        ?>
                                        </a>

                                        <?php
                                                    echo "<td align='center'>".$dados['encomendaProdutoQnt']."</td>";
                                                    echo "<td align='center'>".$dados['encomendaProdutoTam']."</td>";
                                                    echo "<td align='center'>".$dados['encomendaprodutoPrec']."€</td>";
                                            }
                                                    ?>




                                            //*******************
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
