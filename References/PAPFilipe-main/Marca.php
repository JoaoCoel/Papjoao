<?php
include_once("includes/body.inc.php");
top();

$con=mysqli_connect(HOST,USER,PWD,DATABASE);
$id=intval($_GET["id"]);
 $sql="select * from produtos inner join imagens on produtoId=imagemProdutoId  inner join marcas on produtoMarcaId=marcaId where imagemDestaque='sim' and produtoMarcaId=".$id;
$result=mysqli_query($con,$sql);
?>

    <!-- Main -->

    <div id="main">

        <div class="inner">


            <div class="container-fluid">

                <div class="row">
                    <?php
                    while ($dados=mysqli_fetch_array($result)){
                        ?>

                        <div class="col-lg-4">


                            <a href="ListaProduto.php?id=<?php echo $dados[">
                                <img class="d-block w-100" src="<?php echo $dados["imagemURL"]?>">
                            </a>
                            <h3><?php echo $dados["produtoNome"]?><span class="pull-right"></span></h3>

                        </div>
                        <?php
                    }
                    ?>


                </div>
            </div>
        </div>

        <br>

    </div>

<?php
bot();
?>

