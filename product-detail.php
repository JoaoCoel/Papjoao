<?php
include_once ("includes/body.inc.php");
top();

$id=intval($_GET['id']);
//$idTipo=intval($_GET['idTipo']);


$sql="select * from produtos where produtoId=$id";
$result=mysqli_query($con,$sql);
$dadosProduto=mysqli_fetch_array($result);

$sql="Select * from tipos";
$tipos=mysqli_query($con,$sql);
$sql="Select * from categorias";
$categorias=mysqli_query($con,$sql);


$sql2 = "Select produtoId,produtoNome,produtoPreco,produtoDesconto,produtoImagemURL from produtos where produtoDestaque ='Sim'";
$result2 = mysqli_query($con, $sql2);

//$sql3="select * from produtos inner join tipoCategorias on produtosTipoCategoriaTipoId=tipoCategoriaTipoId where produtosTipoCategoriaTipoId=$idTipo";
//$res=mysqli_query($con,$sql3);

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
                    <form action="product-list.php?search=$_POST['search']">
                        <div class="search">
                            <input type="text" id="search" name="search" value="">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
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
<?php
$sql="Select produtoId,produtoNome,produtoPreco,categorias.categoriaNome as categ,tipos.tipoNome as tipo, produtoImagemURL from produtos left join categorias 
      on produtoTipoCategoriaCategoriaId=categoriaId left join tipos on produtoTipoCategoriaTipoId=tipoId";

$result=mysqli_query($con,$sql);

?>
    <div class="product-detail">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="product-detail-top">
                        <div class="row align-items-center">
                            <div class="col-md-5">
                                <div class="product-slider-single normal-slider">
                                    <img src="<?php echo $dadosProduto['produtoImagemURL'];?>" alt="Product Image">
                                </div>
                                <!--div class="product-slider-single-nav normal-slider">
                                        <div class="slider-nav-img"><img src="<?php// echo $dadosProduto['produtoImagemURL'];?>" alt="Product Image"></div>
                                    </div-->
                            </div>
                            <div class="col-md-7">
                                <div class="product-content">
                                    <div class="title"><h2><?php echo $dadosProduto['produtoNome'];?></h2></div>
                                    <div class="ratting">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="quantity">
                                        <h3><b>Preço:</b></h3>
                                        <?php
                                        if ($dadosProduto['produtoDesconto']>0){
                                            ?>
                                            <h3>
                                    <span>
                                    <s>
                                    <?php
                                    echo $dadosProduto['produtoPreco'];
                                    ?>
                                        <span>€ </span>
                                    </s>
                                        &nbsp
                                    </span>
                                                <?php
                                                $preco = $dadosProduto['produtoPreco'] - $dadosProduto['produtoPreco'] * $dadosProduto['produtoDesconto'] / 100;
                                                echo number_format($preco, 2, '.', ' ');

                                                ?>
                                                <span>€</span>
                                            </h3>

                                            <a class="btn" href="product-detail.php?id=<?php echo $dadosProduto['produtoId']; ?>"><i class="fa fa-shopping-cart"></i>Comprar</a>
                                            <?php
                                        } else {
                                            ?>
                                            <h3><?php echo $dadosProduto['produtoPreco'];?><span>€</span></h3>
                                            <a class="btn" href="product-detail.php?id=<?php echo $dadosProduto['produtoId']; ?>"><i class="fa fa-shopping-cart"></i>Comprar</a>
                                            <?php
                                        }
                                        ?>

                                    </div>
                                    <!-- <div class="quantity">
                                         <h4>Quantidade:</h4>
                                         <div class="qty">
                                             <button class="btn-minus"><i class="fa fa-minus"></i></button>
                                             <input type="text" value="1">
                                             <button class="btn-plus"><i class="fa fa-plus"></i></button>
                                         </div>
                                     </div> -->
                                    <div class="p-size">
                                        <h4>Tamanho:</h4>
                                        <div class="btn-group btn-group-sm">
                                            <button type="button" class="btn">S</button>

                                            <?php
                                            /*

                                            while ($dadosProduto=mysqli_fetch_array($tamanhos)){
                                                $i=$dadosProduto['tamanhoId'];
                                                $x=0;
                                                while ($dt=mysqli_fetch_array($ptamanhos)){
                                                    if ($dt['produtoTamanhoTamanhoId']==$i ){
                                                        $x=1;
                                                        break;
                                                    }

                                                }

                                                echo "<div class=\"custom-control custom-radio\">";
                                                if ($x == 1) {
                                                    echo "<input class=\"custom-control-input\" checked type=\"checkbox\" id=\"size".$i."\" name=\"size".$i."\" value=\"".$dadosProduto['tamanhoId']."\"/>";
                                                } else {

                                                    echo "<input class=\"custom-control-input\" type=\"checkbox\" id=\"size".$i."\" name=\"size".$i."\" value=\"".$dadosProduto['tamanhoId']."\"/>";
                                                }
                                                // echo  "<input type='checkbox' class='custom-control-input' id=\"size'.$i.'\" name=\"size'.$i.'\" value=\"".$dados['tamanhoId']."\">".$dados['tamanhoNome']."</option>&nbsp&nbsp";



                                                echo "<label class=\"custom-control-label\" for=\"size".$i."\">".$dadosProduto['tamanhoNome']."</label><br>";
                                                echo "</div>";
                                                //<input type="checkbox" class="custom-control-input" id="size" name="payment">
                                                // <label class="custom-control-label" for="payment-1">S </label>
                                            }
                                            */?>

                                        </div>
                                    </div>
                                    <!-- <div class="p-color">
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


                    <div class="row product-detail-bottom">
                        <div class="col-lg-12">
                            <ul class="nav nav-pills nav-justified">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="pill" href="#description">Descrição</a>
                                </li>

                            </ul>

                            <div class="tab-content">
                                <div id="description" class="container">
                                    <p>
                                        <?php echo $dadosProduto['produtoDescricao'];?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="product">
                        <div class="section-header">
                            <h1>Produtos Relacionados</h1>
                        </div>
                        <div class="row align-items-center product-slider product-slider-3">
                            <?php

                            $sql="Select produtoId,produtoNome,produtoPreco,produtoDesconto,produtoGenero,categorias.categoriaNome as categ,tipos.tipoNome as tipo, produtoImagemURL from produtos left join categorias 
                            on produtoTipoCategoriaCategoriaId=categoriaId left join tipos on produtoTipoCategoriaTipoId=tipoId";

                            $categ=0;
                            $tipo=0;
                            if (isset($_GET['search']) or isset($_GET['cat'])  or isset($_GET['tip']) or isset($_GET['gen'])){
                                $sql.=" where ";
                                if (isset($_GET['search'])){
                                    $filtro = $_GET['search'];
                                    $sql.=" produtoNome like \"".$filtro."%\"";
                                    $sql .= " and ";
                                }
                                if (isset($_GET['cat'])) {
                                    $categ = $_GET['cat'];
                                    $sql .= " produtoTipoCategoriaCategoriaId=". $categ;
                                    $sql .= " and ";
                                }

                                if (isset($_GET['tip'])) {
                                    $tipo = $_GET['tip'];
                                    $sql .= " produtoTipoCategoriaTipoId=". $tipo;
                                    $sql .= " and ";
                                }
                                if (isset($_GET['gen'])) {
                                    $genero = $_GET['gen'];
                                    $sql .= " produtoGenero like \"%".$genero."%\"";
                                }

                                if (substr($sql, -5) == " and ") $sql = substr($sql,0, strlen($sql)-5);

                            }

                            $result=mysqli_query($con,$sql) or die (mysqli_error($con));

                            while($dados=mysqli_fetch_array($result2)){

                                ?>
                                <div class="col-lg-3">
                                    <div class="product-item">
                                        <div class="product-title">
                                            <?php echo "<a href='product-detail.php'>".$dados['produtoNome']."</a>";?>
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
                                                <?php echo "<img src=\"".$dados['produtoImagemURL']."\">";?>
                                            </a>
                                            <div class="product-action">
                                                <a href="#"><i class="fa fa-cart-plus"></i></a>
                                                <a href="#"><i class="fa fa-heart"></i></a>
                                                <a href="product-detail.php"><i class="fa fa-search"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-price">
                                            <h3><span>$</span><?php echo $dados['produtoPreco'];?></h3>
                                            <a class="btn" href="product-detail.php"><i class="fa fa-shopping-cart"></i>Comprar</a>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
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
                                    <a class="nav-link" href="product-list.php?cat=2"><i class="fa fa-child"></i>Criança</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="product-list.php?cat=1"><i class="fa fa-tshirt"></i>Adulto</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="product-list.php?cat=3"><i class="fa fa-mobile-alt"></i>Acessórios</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <!--
                    <div class="sidebar-widget widget-slider">
                        <div class="sidebar-slider normal-slider">
                            <div class="product-item">
                                <div class="product-title">
                                    <a href="product-detail.php">Product Name</a>
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
                                        <img src="img/product-10.jpg" alt="Product Image">
                                    </a>
                                    <div class="product-action">
                                        <a href="#"><i class="fa fa-cart-plus"></i></a>
                                        <a href="#"><i class="fa fa-heart"></i></a>
                                        <a href="product-detail.php"><i class="fa fa-search"></i></a>
                                    </div>
                                </div>
                                <div class="product-price">
                                    <h3><span>$</span>0.99</h3>
                                    <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                </div>
                            </div>
                            <div class="product-item">
                                <div class="product-title">
                                    <a href="product-detail.php">Product Name</a>
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
                                        <a href="product-detail.php"><i class="fa fa-search"></i></a>
                                    </div>
                                </div>
                                <div class="product-price">
                                    <h3><span>$</span>0.99</h3>
                                    <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                </div>
                            </div>
                            <div class="product-item">
                                <div class="product-title">
                                    <a href="product-detail.php">Product Name</a>
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
                                    <a class="btn" href="product-detail.php"><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    -->

                    <div class="sidebar-widget brands">
                        <h2 class="title">Roupa</h2>
                        <ul>
                            <?php

                            $sql="Select tipoId,tipoNome from tipos";
                            $result=mysqli_query($con,$sql);

                            while($dados=mysqli_fetch_array($result)){
                                $visivel = "";
                                if ($categ != 0) {
                                    $sql="Select * from tipocategorias where tipoCategoriaCategoriaId=".$categ." and tipoCategoriaTipoId=".$dados['tipoId'];

                                    $tc=mysqli_query($con,$sql);
                                    if (mysqli_num_rows($tc)==0) $visivel=" hidden ";
                                }


                                ?>

                                <li><a <?php echo $visivel;?> href="product-list.php?tip=<?php echo $dados['tipoId']?><?php if (isset($categ)) echo "&cat=".$categ; ?>"><?php echo $dados['tipoNome']?>
                                    </a><span <?php echo $visivel;?> ><?php echo contaCoisas($con,array($dados['tipoId'])); ?></span></li>

                                <?php


                            }
                            //*******************

                            ?>

                    </div>

                    <!--div class="sidebar-widget brands">
                        <h2 class="title">Género</h2>
                        <ul>
                            <li><a  href="product-list.php?gen=M&tip=<?php echo $tipo?><?php if (isset($categ)) echo "&cat=".$categ; ?>">Homem
                                </a><span><?php echo contaCoisas($con,array("M"),"produtos",array("produtoGenero")); ?></span></li>
                            <li><a  href="product-list.php?gen=F&tip=<?php echo $tipo?><?php if (isset($categ)) echo "&cat=".$categ; ?>">Mulher
                                </a><span><?php echo contaCoisas($con,array("F"),"produtos",array("produtoGenero")); ?></span></li>
                            <li><a  href="product-list.php?gen=U&tip=<?php echo $tipo?><?php if (isset($categ)) echo "&cat=".$categ; ?>">Unissexo
                                </a><span><?php echo contaCoisas($con,array("U"),"produtos",array("produtoGenero")); ?></span></li>
                        </ul>
                    </div>
                    <div class="sidebar-widget brands">
                        <h2 class="title">Tamanho</h2>
                        <ul>
                            <li><a href="#">S</a><span>(34)</span></li>
                            <li><a href="#">M</a><span>(67)</span></li>
                            <li><a href="#">L</a><span>(74)</span></li>
                            <li><a href="#">XL</a><span>(89)</span></li>
                        </ul>
                    </div-->



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