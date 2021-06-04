<?php
include_once ("includes/body.inc.php");
top();

$encId=$_GET['encId']

?>





<div class="breadcrumb-wrap">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="my-account.php">Perfil</a></li>
            <li class="breadcrumb-item active">Detalhes da encomenda</li>
        </ul>
    </div>
</div>

<div class="wishlist-page">
    <div class="container-fluid">
        <div class="wishlist-page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <div class="container">
                            <table class="table table-bordered">
                                <tr>
                                    <thead class="thead-dark">
                                        <th align='center'>Nome</th>
                                        <th align='center'>Quantidade</th>
                                        <th align='center'>Tamanho</th>
                                        <th align='center'>Preço</th>
                                    </thead>
                                </tr>
                                    <tr>
                                        <?php
                                        $sql="Select * from encomendaprodutos left join produtos on encomendaProdutoProdutoId=produtoId left join encomendas on encomendaProdutoEncomendaId=encomendaId where encomendaProdutoEncomendaId=".$encId;

                                        $result=mysqli_query($con,$sql);
                                        $precTot=0;
                                        //echo "<table class='table table-striped'>";
                                            while($dados=mysqli_fetch_array($result)){
                                                $precTot=$dados['encomendaPrec'];
                                        ?>
                                        <a href="product-detail.php?id=<?php echo $dados['encomendaProdutoProdutoId']; ?>">
                                                    <?php
                                                    echo "<tr>";
                                                    echo "<td width='20%' align='center'><img width=100px src=\"../".$dados['produtoImagemURL']."\">".$dados['produtoNome']."</td>";
                                        ?>
                                        </a>

                                        <?php
                                                    echo "<td align='center'>".$dados['encomendaProdutoQnt']."</td>";
                                                    echo "<td align='center'>".$dados['encomendaProdutoTam']."</td>";
                                                    echo "<td align='center'>".$dados['encomendaProdutoPrec']."€</td>";
                                            }
                                                    ?>

                                    </tr>
                                <tr><td></td><td></td><td></td><td><b><?php echo $precTot; ?>€</b></td></tr>
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

<?php
bottom();
?>
