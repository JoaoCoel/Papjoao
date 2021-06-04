<?php
include_once ("includes/body.inc.php");
top();

$sql="select * from favoritos left join produtos on produtoId=favoritoProdutoId where favoritoPerfilId=".$_SESSION['pid'];
$result=mysqli_query($con,$sql) or die (mysqli_error($con));


?>
        <!-- Bottom Bar End --> 
        
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Página Principal</a></li>
                    <li class="breadcrumb-item active">Lista de Desejos</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <!-- Wishlist Start -->
        <div class="wishlist-page">
            <div class="container-fluid">
                <div class="wishlist-page-inner">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Produto</th>
                                            <th>Preço</th>
                                            <th>Adicionar ao Cart</th>
                                            <th>Remover</th>
                                        </tr>
                                    </thead>
                                    <tbody class="align-middle">
                                    <?php

                                    if(isset($result)) {
                                    while ($dados=mysqli_fetch_array($result)){
                                    ?>
                                        <tr>
                                            <td>
                                                <div class="img">
                                                    <a href="product-detail.php?id=<?php echo $dados['produtoId']; ?>"><img src="<?php echo $dados['produtoImagemURL'];?>" alt="Image"></a>
                                                    <p><?php echo $dados['produtoNome'];?></p>
                                                </div>
                                            </td>
                                            <td><?php echo $dados['produtoPreco'];?><span>€</span></td>
                                            <td><a class="btn" href="product-detail.php?id=<?php echo $dados['produtoId']; ?>">Adicionar ao Cart</a></td>
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
                </div>
            </div>
        </div>


<script>
    function confirmDelete(prodId)
    {
        let r=confirm("Tem a certeza? ("+prodId+")");
        if (r == true) {
            window.location.href = "delete-product-fav.php?id="+prodId;
        }
    }

</script>
        <!-- Wishlist End -->
        
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
                                <li><a href="#">Payment Policy</a></li>
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
