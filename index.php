<?php
include_once ("includes/body.inc.php");
top();

$sql = "Select produtoId,produtoNome,produtoPreco,produtoDesconto, produtoImagemURL from produtos order by produtoId DESC LIMIT 6";

$sql2 = "Select produtoId,produtoNome,produtoPreco,produtoDesconto, produtoImagemURL from produtos where produtoDestaque = 'Sim'";

$sql3 = "Select * from slideshowimagens order by slideshowImagemOrd ASC";

$result = mysqli_query($con, $sql);

$result2 = mysqli_query($con, $sql2);

$result3 = mysqli_query($con, $sql3);

?>



<!-- Nav Bar End -->

<!-- Bottom Bar Start -->
<div class="bottom-bar">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-3">
                <div class="logo">
                    <a href="index.php">
                        <img src="img/logo.png" alt="Logo">
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <form action="product-list.php?search=$_POST['search']">
                    <div class="search">
                        <input type="text" id="search" name="search" value="">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </div>
                </form>
            </div>
            <?php
            if(isset($_SESSION['id'])){
            ?>
            <div class="col-md-3">
                <div class="user">
                    <a href="wishlist.php" class="btn wishlist">
                        <i class="fa fa-heart"></i>
                        <span><?php
                            if (isset($_SESSION['id'])) {
                                $pid=$_SESSION['pid'];
                                echo contaCoisas($con,array($pid),"favoritos",array("favoritoPerfilId"));
                            }

                            ?></span>
                    </a>
                    <a href="cart.php" class="btn cart">
                        <i class="fa fa-shopping-cart"></i>

                            <span><?php
                                if (isset($_SESSION['id'])) {
                                    $pid=$_SESSION['pid'];
                                    echo contaCarrinho($con, $pid);
                                }

                                ?>
                            </span>
                    </a>
                </div>
            </div>
                <?php
            }
            ?>
            <!--div class="col-md-3">
                <div class="user">
                    <a href="login.php" class="btn wishlist">
                        <i class="fa fa-heart"></i>
                        <span>(0)</span>
                    </a>
                    <a href="login.php" class="btn cart">
                        <i class="fa fa-shopping-cart"></i>
                        <span>(0)</span>
                    </a>
                </div>
            </div-->
        </div>
    </div>
</div>
        <!-- Bottom Bar End -->       
        
        <!-- Main Slider Start -->
        <div class="header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <nav class="navbar bg-light">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="fa fa-home"></i>Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#destaques"><i class="fa fa-shopping-bag"></i>Em Destaque</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#recentes"><i class="fa fa-plus-square"></i>Produtos Recentes</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="product-list.php?cat=2"><i class="fa fa-child"></i>Crianças</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="product-list.php?cat=1"><i class="fa fa-tshirt"></i>Adultos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="product-list.php?cat=3"><i class="fa fa-mobile-alt"></i>Acessórios</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-md-6">
                        <div class="header-slider normal-slider">
                            <?php

                                 while ($dados = mysqli_fetch_array($result3)){
                            ?>

                            <div class="header-slider-item">
                                <img style="width: 100%" src="<?php echo $dados['slideshowImagemURL']; ?>" height=400px alt="Slider Image"/>
                                <div class="header-slider-caption">
                                    <a class="btn" href="product-list.php?cat=<?php echo $dados['slideshowImagemCat']; ?><?php if ($dados['slideshowImagemGen'] !='T') echo '&gen='.$dados['slideshowImagemGen']; ?>"><i class="fa fa-shopping-cart"></i><?php echo $dados['slideshowImagemTexto']; ?></a>
                                </div>
                            </div>
                            <?php
                                 }
                            ?>
                            <!--div class="header-slider-item">
                                <img style="width: 100%" src="img/slider-1.jpg" alt="Slider Image" />
                                <div class="header-slider-caption">
                                    <a class="btn" href="product-list.php?cat=1"><i class="fa fa-shopping-cart"></i>Veja os nossos Produtos</a>
                                </div>
                            </div>
                            <div class="header-slider-item">
                                <img style="width: 100%" src="img/slider-2.jpg" alt="Slider Image" />
                                <div class="header-slider-caption">
                                    <a class="btn" href="product-list.php?cat=1&gen=M"><i class="fa fa-shopping-cart"></i>Para Homem</a>
                                </div>
                            </div>
                            <div class="header-slider-item">
                                <img style="width:100%" src="img/slider-3.jpg" alt="Slider Image"/>
                                <div class="header-slider-caption">
                                    <a class="btn" href="product-list.php?cat=1&gen=F"><i class="fa fa-shopping-cart"></i>Para Mulher</a>
                                </div>
                            </div-->
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="header-img">
                            <div class="img-item">
                                <img style="height:100%" src="img/category-1.jpg" />
                                <a class="img-text" href="product-list.php?cat=3">
                                    <p>Veja os nossos acessórios</p>
                                </a>
                            </div>
                            <div class="img-item">
                                <img style="height:100%" src="img/category-2.jpg" />
                                <a class="img-text" href="product-list.php?cat=2">
                                    <p>Veja os nossas roupas para criança</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Slider End -->
        
        <!-- Brand Start
        <div class="brand">
            <div class="container-fluid">
                <div class="brand-slider">
                    <div class="brand-item"><img src="img/brand-1.png" alt=""></div>
                    <div class="brand-item"><img src="img/brand-2.png" alt=""></div>
                    <div class="brand-item"><img src="img/brand-3.png" alt=""></div>
                    <div class="brand-item"><img src="img/brand-4.png" alt=""></div>
                    <div class="brand-item"><img src="img/brand-5.png" alt=""></div>
                    <div class="brand-item"><img src="img/brand-6.png" alt=""></div>
                </div>
            </div>
        </div>
         Brand End -->
        
        <!-- Feature Start
        <div class="feature">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-6 feature-col">
                        <div class="feature-content">
                            <i class="fab fa-cc-mastercard"></i>
                            <h2>Pagamento Seguro</h2>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 feature-col">
                        <div class="feature-content">
                            <i class="fa fa-truck"></i>
                            <h2>Entrega por
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 feature-col">
                        <div class="feature-content">
                            <i class="fa fa-sync-alt"></i>
                            <h2>Reembolsável por 30</h2>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 feature-col">
                        <div class="feature-content">
                            <i class="fa fa-comments"></i>
                            <h2>Suporte 24/7</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         Feature End-->
        
        <!-- Category Start
        <div class="category">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <div class="category-item ch-400">
                            <img src="img/category-3.jpg" />
                            <a class="category-name" href="product-detail.php">

                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="category-item ch-250">
                            <img src="img/category-4.jpg" />
                            <a class="category-name" href="product-detail.php">

                            </a>
                        </div>
                        <div class="category-item ch-150">
                            <img src="img/category-5.jpg" />
                            <a class="category-name" href="product-detail.php">

                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="category-item ch-150">
                            <img src="img/category-6.jpg" />
                            <a class="category-name" href="product-detail.php">

                            </a>
                        </div>
                        <div class="category-item ch-250">
                            <img src="img/category-7.jpg" />
                            <a class="category-name" href="product-detail.php">

                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="category-item ch-400">
                            <img src="img/category-8.jpg" />
                            <a class="category-name" href="product-detail.php">

                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        Category End-->
        
        <!-- Call to Action Start
        <div class="call-to-action">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h1>Ligue-nos se tiver problemas</h1>
                    </div>
                    <div class="col-md-6">
                        <a href="tel:0123456789">+012-345-6789</a>
                    </div>
                </div>
            </div>
        </div>
        Call to Action End -->
        
        <!-- Featured Product Start -->
<div class="featured-product product">
    <div class="container-fluid">
        <div class="section-header" id="destaques">
            <h1>Produtos Em Destaque</h1>
        </div>
        <div class="row align-items-center product-slider product-slider-4">
            <?php
            while ($dados = mysqli_fetch_array($result2)){
                ?>
                <div class="col-lg-3">
                    <div class="product-item">
                        <div class="product-title">
                            <?php echo "<a href='product-detail.php?id=".$dados['produtoId']."'>".$dados['produtoNome']."</a>";?>
                            <div class="ratting">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>
                        <div class="product-image">
                            <a href="product-detail.php?id=<?php echo $dados['produtoId']; ?>">
                                <?php echo "<img src=\"".$dados['produtoImagemURL']."\">";?>
                            </a>
                            <div class="product-action">
                                <a href="confirm-add-product-cart.php?id=<?php echo $dados['produtoId']; ?>"><i class="fa fa-cart-plus"></i></a>
                                <a href="confirm-add-product-fav.php?id=<?php echo $dados['produtoId']; ?>"><i class="fa fa-heart"></i></a>
                                <a href="product-detail.php?id=<?php echo $dados['produtoId']; ?>"><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="product-price">
                            <?php
                            if ($dados['produtoDesconto']>0){
                                ?>
                                <h3>
                                    <span>
                                    <strike>
                                    <?php
                                    echo $dados['produtoPreco'];
                                    ?>
                                        <span>€ </span>
                                    </strike>
                                        &nbsp
                                    </span>
                                    <?php
                                    $preco = $dados['produtoPreco'] - $dados['produtoPreco'] * $dados['produtoDesconto'] / 100;
                                    echo number_format($preco, 2, '.', ' ');

                                    ?>
                                    <span>€</span>
                                </h3>

                                <a class="btn" href="product-detail.php?id=<?php echo $dados['produtoId']; ?>"><i class="fa fa-shopping-cart"></i>Comprar</a>
                                <?php
                            } else {
                                ?>
                                <h3><?php echo $dados['produtoPreco'];?><span>€</span></h3>
                                <a class="btn" href="product-detail.php?id=<?php echo $dados['produtoId']; ?>"><i class="fa fa-shopping-cart"></i>Comprar</a>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>
        <!-- Featured Product End -->       
        
        <!-- Newsletter Start
        <div class="newsletter">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <h1>Subscribe Our Newsletter</h1>
                    </div>
                    <div class="col-md-6">
                        <div class="form">
                            <input type="email" value="Your email here">
                            <button>Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         Newsletter End -->
        
        <!-- Recent Product Start -->



        <div class="recent-product product">
            <div class="container-fluid">
                <div class="section-header" id="recentes">
                    <h1>Produtos Recentes</h1>
                </div>
                <div class="row align-items-center product-slider product-slider-4">
                    <?php
                    while ($dados = mysqli_fetch_array($result)){
                    ?>
                    <div class="col-lg-3">
                        <div class="product-item">
                            <div class="product-title">
                                <?php echo "<a href='product-detail.php?id=".$dados['produtoId']."'>".$dados['produtoNome']."</a>";?>
                                <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                            <div class="product-image">
                                <a href="product-detail.php?id=<?php echo $dados['produtoId']; ?>">
                                    <?php echo "<img src=\"".$dados['produtoImagemURL']."\">";?>
                                </a>
                                <div class="product-action">
                                    <a href="confirm-add-product-cart.php?id=<?php echo $dados['produtoId']; ?>"><i class="fa fa-cart-plus"></i></a>
                                    <a href="confirm-add-product-fav.php?id=<?php echo $dados['produtoId']; ?>"><i class="fa fa-heart"></i></a>
                                    <a href="product-detail.php?id=<?php echo $dados['produtoId']; ?>"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="product-price">
                                <?php
                                if ($dados['produtoDesconto']>0){
                                    ?>
                                    <h3>
                                    <span>
                                    <strike>
                                    <?php
                                    echo $dados['produtoPreco'];
                                    ?>
                                        <span>€ </span>
                                    </strike>
                                        &nbsp
                                    </span>
                                        <?php
                                        $preco = $dados['produtoPreco'] - $dados['produtoPreco'] * $dados['produtoDesconto'] / 100;
                                        echo number_format($preco, 2, '.', ' ');

                                        ?>
                                        <span>€</span>
                                    </h3>

                                    <a class="btn" href="product-detail.php?id=<?php echo $dados['produtoId']; ?>"><i class="fa fa-shopping-cart"></i>Comprar</a>
                                    <?php
                                } else {
                                    ?>
                                    <h3><?php echo $dados['produtoPreco'];?><span>€</span></h3>
                                    <a class="btn" href="product-detail.php?id=<?php echo $dados['produtoId']; ?>"><i class="fa fa-shopping-cart"></i>Comprar</a>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <!-- Recent Product End -->
        
        <!-- Review Start
        <div class="review">
            <div class="container-fluid">
                <div class="row align-items-center review-slider normal-slider">
                    <div class="col-md-6">
                        <div class="review-slider-item">
                            <div class="review-img">
                                <img src="img/review-1.jpg" alt="Image">
                            </div>
                            <div class="review-text">
                                <h2>Customer Name</h2>
                                <h3>Profession</h3>
                                <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vitae nunc eget leo finibus luctus et vitae lorem
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="review-slider-item">
                            <div class="review-img">
                                <img src="img/review-2.jpg" alt="Image">
                            </div>
                            <div class="review-text">
                                <h2>Customer Name</h2>
                                <h3>Profession</h3>
                                <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vitae nunc eget leo finibus luctus et vitae lorem
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="review-slider-item">
                            <div class="review-img">
                                <img src="img/review-3.jpg" alt="Image">
                            </div>
                            <div class="review-text">
                                <h2>Customer Name</h2>
                                <h3>Profession</h3>
                                <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vitae nunc eget leo finibus luctus et vitae lorem
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        -- Review End -->
        
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
