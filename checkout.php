<?php
include_once ("includes/body.inc.php");
top();

$sql="select * from carrinhos left join perfis on perfilId=carrinhoPerfilId left join utilizadores on utilizadorPerfilId=carrinhoPerfilId";
$sql.=" left join enderecos on enderecoPerfilId=carrinhoPerfilId where carrinhoPerfilId=".$_SESSION['pid'];
$result=mysqli_query($con,$sql);//or die (mysqli_error($con))
$dadosP=mysqli_fetch_array($result);

$total= 0;
if($result->num_rows > 0) {
    $cid = $dadosP['carrinhoId'];
    $sql2="select * from carrinhoProdutos inner join produtos on produtoId=carrinhoProdutoProdutoId where carrinhoProdutoCarrinhoId=".$cid;
    $result2=mysqli_query($con,$sql2);
    while ($dados=mysqli_fetch_array($result2)){
        $qt=intval($dados['carrinhoProdutoQnt']);
        $preco = $dados['produtoPreco'] - $dados['produtoPreco'] * $dados['produtoDesconto'] / 100;
        $total += $preco * $qt;
    }
}


?>
        <!-- Bottom Bar End --> 
        
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="cart.php">Cart</a></li>
                    <li class="breadcrumb-item active">Checkout</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <!-- Checkout Start -->
        <div class="checkout">
            <div class="container-fluid">
                <form action="confirm-checkout.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="checkout-inner">
                                <div class="billing-address">
                                    <h2>Endereço de Entrega</h2>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Nome</label>
                                            <input class="form-control" readonly type="text" name="nome" value="<?php echo $dadosP['perfilNome']?>">
                                        </div>
                                        <div class="col-md-6">
                                            <label>E-mail</label>
                                            <input class="form-control" readonly type="text" name="email" value="<?php echo $dadosP['utilizadorEmail']?>">
                                        </div>

                                        <div class="col-md-6">
                                            <label>Nº de Telemóvel</label>
                                            <input class="form-control" readonly type="text" name="nt" value="<?php echo $dadosP['perfilTele']?>">
                                        </div>
                                        <div class="col-md-12">
                                            <label>Morada</label>
                                            <input class="form-control" type="text" name="mor" value="<?php echo $dadosP['enderecoMorada']?>">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Cod. Postal</label>
                                            <input class="form-control" type="text" name="cod" value="<?php echo $dadosP['enderecoCodPostal']?>">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Localidade</label>
                                            <input class="form-control" type="text" name="loc" value="<?php echo $dadosP['enderecoLocal']?>">
                                        </div>
                                        <!--div class="col-md-12">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="shipto">
                                                <label class="custom-control-label" for="shipto">Enviar para um endereço diferente</label>
                                            </div>
                                        </div-->
                                    </div>
                                </div>

                                <!--div class="shipping-address">
                                    <h2>Endereço de Envio</h2>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Primeiro Nome</label>
                                            <input class="form-control" type="text" placeholder="First Name">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Último Nome</label>
                                            <input class="form-control" type="text" placeholder="Last Name">
                                        </div>
                                        <div class="col-md-6">
                                            <label>E-mail</label>
                                            <input class="form-control" type="text" placeholder="E-mail">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Nº de Telemóvel</label>
                                            <input class="form-control" type="text" placeholder="Mobile No">
                                        </div>
                                        <div class="col-md-12">
                                            <label>Endereço</label>
                                            <input class="form-control" type="text" placeholder="Address">
                                        </div>
                                        <div class="col-md-6">
                                            <label>País</label>
                                            <select class="custom-select">
                                                <option selected>United States</option>
                                                <option>Afghanistan</option>
                                                <option>Chernobyl</option>
                                                <option>North Korea</option>
                                                <option>Nagasaki</option>
                                                <option>Algeria</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Cidade</label>
                                            <input class="form-control" type="text" placeholder="City">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Estado</label>
                                            <input class="form-control" type="text" placeholder="State">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Código Postal</label>
                                            <input class="form-control" type="text" placeholder="ZIP Code">
                                        </div>
                                    </div>
                                </div-->
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="checkout-inner">
                                <div class="checkout-summary">
                                    <div class="checkout-summary">
                                        <h1>Total no Cart </h1>
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
                                                <input class="form-control" hidden type="text" name="total" value="<?php echo $totalCP?>">
                                                    </span></h2>
                                    </div>
                                </div>

                                <div class="checkout-payment">
                                    <div class="payment-methods">
                                        <h1>Método de Pagamento </h1>
                                        <div class="payment-method">
                                            <div class="custom-control custom-radio">
                                                <input checked type="radio" class="custom-control-input" id="payment-1" name="Paypal">
                                                <label class="custom-control-label" for="payment-1">Paypal</label>
                                            </div>
                                            <div class="payment-content" id="payment-1-show">
                                            </div>
                                        </div>
                                        <div class="payment-method">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" id="payment-2" name="Multibanco">
                                                <label class="custom-control-label" for="payment-2">Multibanco</label>
                                            </div>
                                            <div class="payment-content" id="payment-2-show">
                                            </div>
                                        </div>
                                        <div class="payment-method">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" id="payment-3" name="Transfer">
                                                <label class="custom-control-label" for="payment-3">Transferência</label>
                                            </div>
                                            <div class="payment-content" id="payment-3-show">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="checkout-btn">
                                        <button>Fazer encomenda</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Checkout End -->
        
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
