<?php
include_once ("includes/body.inc.php");
top();
//ver pap do filipe e ver https://drakelings.bluedrake42.com/index.php?%2Ffile%2F28-stalker-anomaly%2F
$sql="select"

$lista="(0";
if(isset($_SESSION['carrinho'])){
    foreach ($_SESSION['carrinho'] as $produto){
        $lista.=",".$produto;
    }
}

$lista.=")";

$sql="select * from produtos inner join imagens on produtoId = imagemProdutoId
                where produtoId in $lista and imagemDestaque='sim'";
$result=mysqli_query($con,$sql);



?>


        <!-- Bottom Bar End -->
<?php
$id=intval($_POST['idPrd']);
session_start();
array_push($_SESSION['carrinho'],$id);
print_r($_SESSION);
return true;
?>

    function adicionaCarrinho(id){
    alert(id);
    $.ajax({
    url:"admin/AJAX/AJAXNovoProdutoCarrinho.php",
    type:"post",
    data: {
    idPrd:id
    },
    success:function(result){
    alert(result);
    }
    });
    }
        
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
                                            <th>Preço</th>
                                            <th>Quantidade</th>
                                            <th>Total</th>
                                            <th>Remover</th>
                                        </tr>
                                    </thead>
                                    <tbody class="align-middle">
                                    <?php
                                    $i=1;
                                    while ($dados=mysqli_fetch_array($result)){
                                        ?>
                                        <tr>
                                            <th width="3%"><?php echo $i++?></th>
                                            <th width="50%"><?php echo $dados['produtoNome']?></th>
                                            <th width="22%"><img width="80" src="<?php echo $dados['imagemURL']?>"</th>
                                            <th ><?php echo $dados['produtoPreco']?></th>
                                            <th >3</th>
                                            <th width="5%">&nbsp;</th>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    <tr>
                                        <td>
                                            <div class="img">
                                                <a href="product-detail.php"><img src="img/product-1.jpg" alt="Image"></a>
                                                <p>Produto</p>
                                            </div>
                                        </td>
                                        <td>$0.99</td>
                                        <td>
                                            <div class="qty">
                                                <button class="btn-minus"><i class="fa fa-minus"></i></button>
                                                <input type="text" value="1">
                                                <button class="btn-plus"><i class="fa fa-plus"></i></button>
                                            </div>
                                        </td>
                                        <td>$0.99</td>
                                        <td><button><i class="fa fa-trash"></i></button></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="img">
                                                    <a href="product-detail.php"><img src="img/product-2.jpg" alt="Image"></a>
                                                    <p>Produto</p>
                                                </div>
                                            </td>
                                            <td>$0.99</td>
                                            <td>
                                                <div class="qty">
                                                    <button class="btn-minus"><i class="fa fa-minus"></i></button>
                                                    <input type="text" value="1">
                                                    <button class="btn-plus"><i class="fa fa-plus"></i></button>
                                                </div>
                                            </td>
                                            <td>$0.99</td>
                                            <td><button><i class="fa fa-trash"></i></button></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="img">
                                                    <a href="product-detail.php"><img src="img/product-3.jpg" alt="Image"></a>
                                                    <p>Produto</p>
                                                </div>
                                            </td>
                                            <td>$0.99</td>
                                            <td>
                                                <div class="qty">
                                                    <button class="btn-minus"><i class="fa fa-minus"></i></button>
                                                    <input type="text" value="1">
                                                    <button class="btn-plus"><i class="fa fa-plus"></i></button>
                                                </div>
                                            </td>
                                            <td>$0.99</td>
                                            <td><button><i class="fa fa-trash"></i></button></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="img">
                                                    <a href="product-detail.php"><img src="img/product-4.jpg" alt="Image"></a>
                                                    <p>Produto</p>
                                                </div>
                                            </td>
                                            <td>$0.99</td>
                                            <td>
                                                <div class="qty">
                                                    <button class="btn-minus"><i class="fa fa-minus"></i></button>
                                                    <input type="text" value="1">
                                                    <button class="btn-plus"><i class="fa fa-plus"></i></button>
                                                </div>
                                            </td>
                                            <td>$0.99</td>
                                            <td><button><i class="fa fa-trash"></i></button></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="img">
                                                    <a href="product-detail.php"><img src="img/product-5.jpg" alt="Image"></a>
                                                    <p>Produto</p>
                                                </div>
                                            </td>
                                            <td>$0.99</td>
                                            <td>
                                                <div class="qty">
                                                    <button class="btn-minus"><i class="fa fa-minus"></i></button>
                                                    <input type="text" value="1">
                                                    <button class="btn-plus"><i class="fa fa-plus"></i></button>
                                                </div>
                                            </td>
                                            <td>$0.99</td>
                                            <td><button><i class="fa fa-trash"></i></button></td>
                                        </tr>
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
                                            <p>Sub Total<span>$0.99</span></p>
                                            <p>Custo de Envio<span>$1</span></p>
                                            <h2>Total<span>$100</span></h2>
                                        </div>
                                        <div class="cart-btn">
                                            <button>Atualizar Cart</button>
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