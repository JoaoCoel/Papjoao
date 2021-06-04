<?php
include_once ("includes/body.inc.php");
top();
//ver pap do filipe e ver https://drakelings.bluedrake42.com/index.php?%2Ffile%2F28-stalker-anomaly%2F

$sql="select * from carrinhos where carrinhoPerfilId=".$_SESSION['pid'];
$result=mysqli_query($con,$sql) or die (mysqli_error($con));
if($result->num_rows > 0) {
    $dados=mysqli_fetch_array($result);
    $cid = $dados['carrinhoId'];
    $sql2="select * from carrinhoProdutos inner join produtos on produtoId=carrinhoProdutoProdutoId where carrinhoProdutoCarrinhoId=".$cid;
    $result2=mysqli_query($con,$sql2);
}

$total= 0;

?>


        <!-- Bottom Bar End -->

        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Página Principal</a></li>
                    <li class="breadcrumb-item"><a href="product-list.php">Produtos</a></li>
                    <li class="breadcrumb-item active">Carrinho</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <!-- Cart Start -->
        <div class="cart-page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="cart-page-inner">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Produto</th>
                                            <th>Tamanho</th>
                                            <th>Preço</th>
                                            <th>Quantidade</th>
                                            <th>Total</th>
                                            <th>Remover</th>
                                        </tr>
                                    </thead>
                                    <tbody class="align-middle">
                                    <?php

                                    if(isset($result2)) {
                                    while ($dados=mysqli_fetch_array($result2)){
                                        ?>
                                        <tr>
                                            <td>
                                                <div class="img">
                                                    <a href="product-detail.php?id=<?php echo $dados['produtoId']; ?>"><img src="<?php echo $dados['produtoImagemURL'];?>" alt="Image"></a>
                                                    <p><?php echo $dados['produtoNome'];?></p>
                                                </div>
                                            </td>
                                            <td><?php echo $dados['carrinhoProdutoTam'];?></td>
                                            <td>
                                                <div class="quantity">
                                                    <?php
                                                    if ($dados['produtoDesconto']>0){

                                                        $preco = $dados['produtoPreco'] - $dados['produtoPreco'] * $dados['produtoDesconto'] / 100;
                                                        echo number_format($preco, 2, '.', ' ');
                                                        ?>
                                                            <span>€</span>

                                                        <?php
                                                    } else {
                                                        ?>
                                                        <?php echo $dados['produtoPreco'];?><span>€</span>

                                                        <?php
                                                    }

                                                    ?>

                                                </div>
                                            </td>
                                            <td>
                                                <form name="qntForm" action="confirm-add-product-cart.php" method="post">
                                                    <input hidden type="text" name="produtoId" value="<?php echo $dados['produtoId']; ?>" >
                                                    <div class="qty">
                                                        <button name="sign" value="-1" class="btn-minus"><i class="fa fa-minus"></i></button>
                                                        <input type="text" name="qt" value="<?php echo $dados['carrinhoProdutoQnt'];?>">
                                                        <button name="sign" value="1" class="btn-plus"><i class="fa fa-plus"></i></button>
                                                    </div>
                                                </form>
                                            </td>
                                            <td>

                                                <?php
                                                $qt=intval($dados['carrinhoProdutoQnt']);
                                                $preco = $dados['produtoPreco'] - $dados['produtoPreco'] * $dados['produtoDesconto'] / 100;
                                                $preco = $preco * $qt;
                                                echo number_format($preco, 2, '.', ' ');
                                                $total += $preco;
                                                ?>
                                                <span>€</span>
                                            </td>
                                            <td><button onclick="confirmDelete(<?php echo $dados['produtoId']; ?>)"><i class="fa fa-trash"></i></button></td>

                                        </tr>
                                        <?php
                                    }
                                    }
                                    ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="cart-page-inner">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="cart-summary">
                                        <div class="cart-content">
                                            <h1>Sumário do Cart </h1>
                                            <p>Sub Total<span><?php echo $total;?> €</span></p>
                                            <p>Custo de Envio<span>
                                                    <?php
                                                    if ($total < 100) {
                                                        echo "5 €";
                                                    } else {
                                                        echo "0 €";
                                                    }
                                                    ?>
                                                </span></p>
                                            <h2>Total<span>
                                                    <?php
                                                        $totalCP = $total;
                                                        if ($total < 100) {
                                                            $totalCP += 5;
                                                        }
                                                        echo $totalCP;
                                                    ?>
                                                    €
                                                </span></h2>
                                        </div>
                                        <div class="cart-btn">
                                            <a href="checkout.php"><button>Checkout</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <script>
        function confirmDelete(prodId)
        {
            let r=confirm("Tem a certeza? ("+prodId+")");
            if (r == true) {
                window.location.href = "delete-product-cart.php?id="+prodId;
            }
        }

    </script>
        <!-- Cart End -->
        
        <!-- Footer Start 
        <div class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h2>Get in Touch</h2>
                            <div class="contact-info">
                                <p><i class="fa fa-map-marker"></i>123 E Store, Los Angeles, USA</p>
                                <p><i class="fa fa-envelope"></i>email@example.com</p>
                                <p><i class="fa fa-phone"></i>+123-456-7890</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h2>Follow Us</h2>
                            <div class="contact-info">
                                <div class="social">
                                    <a href=""><i class="fab fa-twitter"></i></a>
                                    <a href=""><i class="fab fa-facebook-f"></i></a>
                                    <a href=""><i class="fab fa-linkedin-in"></i></a>
                                    <a href=""><i class="fab fa-instagram"></i></a>
                                    <a href=""><i class="fab fa-youtube"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h2>Company Info</h2>
                            <ul>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Terms & Condition</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h2>Purchase Info</h2>
                            <ul>
                                <li><a href="#">Pyament Policy</a></li>
                                <li><a href="#">Shipping Policy</a></li>
                                <li><a href="#">Return Policy</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="row payment align-items-center">
                    <div class="col-md-6">
                        <div class="payment-method">
                            <h2>We Accept:</h2>
                            <img src="img/payment-method.png" alt="Payment Method" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="payment-security">
                            <h2>Secured By:</h2>
                            <img src="img/godaddy.svg" alt="Payment Security" />
                            <img src="img/norton.svg" alt="Payment Security" />
                            <img src="img/ssl.svg" alt="Payment Security" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
         Footer End -->
        
        <!-- Footer Bottom Start -->

<?php
bottom();
?>