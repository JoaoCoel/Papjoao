<?php
include_once ("includes/body.inc.php");
top();
?>
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
                <div class="search">
                    <input type="text" placeholder="Search">
                    <button><i class="fa fa-search"></i></button>
                </div>
            </div>
            <div class="col-md-3">
                <div class="user">
                    <a href="wishlist.php" class="btn wishlist">
                        <i class="fa fa-heart"></i>
                        <span>(0)</span>
                    </a>
                    <a href="cart.php" class="btn cart">
                        <i class="fa fa-shopping-cart"></i>
                        <span>(0)</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Bottom Bar End -->
        
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Página Principal</a></li>
                    <li class="breadcrumb-item"><a href="product-list.php">Produtos</a></li>
                    <li class="breadcrumb-item active">Detalhes do Produto</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <!-- Product Detail Start -->
        <div class="product-detail">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="product-detail-top">
                            <div class="row align-items-center">
                                <div class="col-md-5">
                                    <div class="product-slider-single normal-slider">
                                        <img src="img/accessories-1.jpg" alt="Product Image">
                                        <img src="img/accessories-2.jpg" alt="Product Image">
                                        <img src="img/accessories-3.jpg" alt="Product Image">
                                        <img src="img/accessories-4.jpg" alt="Product Image">
                                        <img src="img/accessories-5.jpg" alt="Product Image">
                                        <img src="img/accessories-6.jpg" alt="Product Image">
                                    </div>
                                    <div class="product-slider-single-nav normal-slider">
                                        <div class="slider-nav-img"><img src="img/accessories-1.jpg" alt="Product Image"></div>
                                        <div class="slider-nav-img"><img src="img/accessories-2.jpg" alt="Product Image"></div>
                                        <div class="slider-nav-img"><img src="img/accessories-3.jpg" alt="Product Image"></div>
                                        <div class="slider-nav-img"><img src="img/accessories-4.jpg" alt="Product Image"></div>
                                        <div class="slider-nav-img"><img src="img/accessories-5.jpg" alt="Product Image"></div>
                                        <div class="slider-nav-img"><img src="img/accessories-6.jpg" alt="Product Image"></div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="product-content">
                                        <div class="title"><h2>Produto</h2></div>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="price">
                                            <h4>Preço:</h4>
                                            <p>$0.99 <span>$1.49</span></p>
                                        </div>
                                       <!-- <div class="quantity">
                                            <h4>Quantidade:</h4>
                                            <div class="qty">
                                                <button class="btn-minus"><i class="fa fa-minus"></i></button>
                                                <input type="text" value="1">
                                                <button class="btn-plus"><i class="fa fa-plus"></i></button>
                                            </div>
                                        </div>
                                        <div class="p-size">
                                            <h4>Tamanho:</h4>
                                            <div class="btn-group btn-group-sm">
                                                <button type="button" class="btn">S</button>
                                                <button type="button" class="btn">M</button>
                                                <button type="button" class="btn">L</button>
                                                <button type="button" class="btn">XL</button>
                                            </div> 
                                        </div>
                                         <div class="p-color">
                                            <h4>Cor:</h4>
                                            <div class="btn-group btn-group-sm">
                                                <button type="button" class="btn">Branco</button>
                                                <button type="button" class="btn">Preto</button>
                                                <button type="button" class="btn">Azul</button>
                                            </div> 
                                        </div> -->
                                        <div class="action">
                                            <a class="btn" href="#"><i class="fa fa-shopping-cart"></i>Adicionar ao Carrinho</a>
                                            <a class="btn" href="checkout.php"><i class="fa fa-shopping-bag"></i>Comprar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--<div class="row product-detail-bottom">
                            <div class="col-lg-12">
                                <ul class="nav nav-pills nav-justified">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="pill" href="#description">Descrição</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#specification">Especificações</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#reviews">Comentários</a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div id="description" class="container tab-pane active">
                                        <h4>Descrição</h4>
                                        <p>
                                        </p>
                                    </div>
                                    <div id="specification" class="container tab-pane fade">
                                         <h4>Especificações</h4>
                                         <ul>
                                             <li></li>
                                             <li></li>
                                         </ul>
                                     </div>
                                     <div id="reviews" class="container tab-pane fade">
                                         <div class="reviews-submitted">
                                             <div class="reviewer">H Gravida - <span>01 Jan 2020</span></div>
                                             <div class="ratting">
                                                 <i class="fa fa-star"></i>
                                                 <i class="fa fa-star"></i>
                                                 <i class="fa fa-star"></i>
                                                 <i class="fa fa-star"></i>
                                                 <i class="fa fa-star"></i>
                                             </div>
                                             <p>
                                             </p>
                                         </div>
                                         <div class="reviews-submit">
                                             <h4>Põe o teu comentário:</h4>
                                             <div class="ratting">
                                                 <i class="far fa-star"></i>
                                                 <i class="far fa-star"></i>
                                                 <i class="far fa-star"></i>
                                                 <i class="far fa-star"></i>
                                                 <i class="far fa-star"></i>
                                             </div>
                                             <div class="row form">
                                                 <div class="col-sm-6">
                                                     <input type="text" placeholder="Name">
                                                 </div>
                                                 <div class="col-sm-6">
                                                     <input type="email" placeholder="Email">
                                                 </div>
                                                 <div class="col-sm-12">
                                                     <textarea placeholder="Review"></textarea>
                                                 </div>
                                                 <div class="col-sm-12">
                                                     <button>Submeter</button>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                </div>
                            </div>
                        </div>-->
                        
                        <div class="product">
                            <div class="section-header">
                                <h1>Produtos Relacionados</h1>
                            </div>

                            <div class="row align-items-center product-slider product-slider-3">
                                <div class="col-lg-3">
                                    <div class="product-item">
                                        <div class="product-title">
                                            <a href="product-detail-accessories.php">Produto</a>
                                            <div class="ratting">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <div class="product-image">
                                            <a href="product-detail-accessories.php">
                                                <img src="img/accessories-1.jpg" alt="Product Image">
                                            </a>
                                            <div class="product-action">
                                                <a href="#"><i class="fa fa-cart-plus"></i></a>
                                                <a href="#"><i class="fa fa-heart"></i></a>
                                                <a href="product-detail-accessories.php"><i class="fa fa-search"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-price">
                                            <h3><span>$</span>0.99</h3>
                                            <a class="btn" href="product-detail-accessories.php"><i class="fa fa-shopping-cart"></i>Comprar</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="product-item">
                                        <div class="product-title">
                                            <a href="product-detail-accessories.php">Produto</a>
                                            <div class="ratting">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <div class="product-image">
                                            <a href="product-detail-accessories.php">
                                                <img src="img/accessories-2.jpg" alt="Product Image">
                                            </a>
                                            <div class="product-action">
                                                <a href="#"><i class="fa fa-cart-plus"></i></a>
                                                <a href="#"><i class="fa fa-heart"></i></a>
                                                <a href="product-detail-accessories.php"><i class="fa fa-search"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-price">
                                            <h3><span>$</span>0.99</h3>
                                            <a class="btn" href="product-detail-accessories.php"><i class="fa fa-shopping-cart"></i>Comprar</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="product-item">
                                        <div class="product-title">
                                            <a href="product-detail-accessories.php">Produto</a>
                                            <div class="ratting">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <div class="product-image">
                                            <a href="product-detail-accessories.php">
                                                <img src="img/accessories-3.jpg" alt="Product Image">
                                            </a>
                                            <div class="product-action">
                                                <a href="#"><i class="fa fa-cart-plus"></i></a>
                                                <a href="#"><i class="fa fa-heart"></i></a>
                                                <a href="product-detail-accessories.php"><i class="fa fa-search"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-price">
                                            <h3><span>$</span>0.99</h3>
                                            <a class="btn" href="product-detail-accessories.php"><i class="fa fa-shopping-cart"></i>Comprar</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="product-item">
                                        <div class="product-title">
                                            <a href="product-detail-accessories.php">Produto</a>
                                            <div class="ratting">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <div class="product-image">
                                            <a href="product-detail-accessories.php">
                                                <img src="img/accessories-4.jpg" alt="Product Image">
                                            </a>
                                            <div class="product-action">
                                                <a href="#"><i class="fa fa-cart-plus"></i></a>
                                                <a href="#"><i class="fa fa-heart"></i></a>
                                                <a href="product-detail-accessories.php"><i class="fa fa-search"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-price">
                                            <h3><span>$</span>0.99</h3>
                                            <a class="btn" href="product-detail-accessories.php"><i class="fa fa-shopping-cart"></i>Comprar</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="product-item">
                                        <div class="product-title">
                                            <a href="product-detail-accessories.php">Produto</a>
                                            <div class="ratting">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <div class="product-image">
                                            <a href="product-detail-accessories.php">
                                                <img src="img/accessories-5.jpg" alt="Product Image">
                                            </a>
                                            <div class="product-action">
                                                <a href="#"><i class="fa fa-cart-plus"></i></a>
                                                <a href="#"><i class="fa fa-heart"></i></a>
                                                <a href="product-detail-accessories.php"><i class="fa fa-search"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-price">
                                            <h3><span>$</span>0.99</h3>
                                            <a class="btn" href="product-detail-accessories.php"><i class="fa fa-shopping-cart"></i>Comprar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Side Bar Start -->
                    <div class="col-lg-4 sidebar">
                        <div class="sidebar-widget category">
                            <h2 class="title">Categoria</h2>
                            <nav class="navbar bg-light">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="product-list-crincas.php"><i class="fa fa-child"></i>Crianças & Bébés</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="product-list.php"><i class="fa fa-tshirt"></i>Homem e Mulher</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="product-list-accessories.php"><i class="fa fa-mobile-alt"></i>Acessórios</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        
                        <!--<div class="sidebar-widget widget-slider">
                            <div class="sidebar-slider normal-slider">
                                <div class="product-item">
                                    <div class="product-title">
                                        <a href="product-detail.php">Produto</a>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="product-image">
                                        <a href="product-detail.php">
                                            <img src="img/product-7.jpg" alt="Product Image">
                                        </a>
                                        <div class="product-action">
                                            <a href="#"><i class="fa fa-cart-plus"></i></a>
                                            <a href="#"><i class="fa fa-heart"></i></a>
                                            <a href="product-detail.php"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-price">
                                        <h3><span>$</span>0.99</h3>
                                        <a class="btn" href="product-detail.php"><i class="fa fa-shopping-cart"></i>Comprar</a>
                                    </div>
                                </div>
                                <div class="product-item">
                                    <div class="product-title">
                                        <a href="#">Produto</a>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="product-image">
                                        <a href="product-detail.php">
                                            <img src="img/product-8.jpg" alt="Product Image">
                                        </a>
                                        <div class="product-action">
                                            <a href="#"><i class="fa fa-cart-plus"></i></a>
                                            <a href="#"><i class="fa fa-heart"></i></a>
                                            <a href="product-detail.php"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-price">
                                        <h3><span>$</span>0.99</h3>
                                        <a class="btn" href="product-detail.php"><i class="fa fa-shopping-cart"></i>Comprar</a>
                                    </div>
                                </div>
                                <div class="product-item">
                                    <div class="product-title">
                                        <a href="#">Produto</a>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="product-image">
                                        <a href="product-detail.php">
                                            <img src="img/product-9.jpg" alt="Product Image">
                                        </a>
                                        <div class="product-action">
                                            <a href="#"><i class="fa fa-cart-plus"></i></a>
                                            <a href="#"><i class="fa fa-heart"></i></a>
                                            <a href="#"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-price">
                                        <h3><span>$</span>0.99</h3>
                                        <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Comprar</a>
                                    </div>
                                </div>
                            </div>
                        </div>-->

                        <div class="sidebar-widget brands">
                            <h2 class="title">Acessórios</h2>
                            <ul>
                                <li><a href="product-list-accessories.php">Malas</a><span>(45)</span></li>
                                <li><a href="product-list-accessories.php">Carteiras</a><span>(45)</span></li>
                                <li><a href="product-list-accessories.php">Aneis</a><span>(34)</span></li>
                                <li><a href="product-list-accessories.php">Brincos</a><span>(67)</span></li>
                                <li><a href="product-list-accessories.php">Relógios</a><span>(74)</span></li>
                                <li><a href="product-list-accessories.php">Cascois</a><span>(89)</span></li>
                                <li><a href="product-list-accessories.php">Óculos</a><span>(28)</span></li>
                            </ul>
                        </div>
                        
                        <!--div class="sidebar-widget tag">
                            <h2 class="title">Tags Cloud</h2>
                            <a href="#">Lorem ipsum</a>
                            <a href="#">Vivamus</a>
                            <a href="#">Phasellus</a>
                            <a href="#">pulvinar</a>
                            <a href="#">Curabitur</a>
                            <a href="#">Fusce</a>
                            <a href="#">Sem quis</a>
                            <a href="#">Mollis metus</a>
                            <a href="#">Sit amet</a>
                            <a href="#">Vel posuere</a>
                            <a href="#">orci luctus</a>
                            <a href="#">Nam lorem</a>
                        </div>
                    </div>
                     Side Bar End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Product Detail End -->
        
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
