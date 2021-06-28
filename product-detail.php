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

$sql="Select * from tamanhos";
$tamanhos=mysqli_query($con,$sql);

$sql="Select * from produtotamanhos where produtoTamanhoProdutoId=".$id;
$ptamanhos=mysqli_query($con,$sql);

$sql2="select * from produtos where produtoTipoCategoriaTipoId=".$dadosProduto['produtoTipoCategoriaTipoId']." and produtoId!=".$id;
$result2=mysqli_query($con,$sql2);




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
                                            <?php
                                        } else {
                                            ?>
                                            <h3><?php echo $dadosProduto['produtoPreco'];?><span>€</span></h3>

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

                                            <?php


                                            while ($dados=mysqli_fetch_array($tamanhos)){
                                                $i=$dados['tamanhoId'];
                                                $x=0;
                                                while ($dt=mysqli_fetch_array($ptamanhos)) {
                                                    if ($dt['produtoTamanhoTamanhoId']==$i){
                                                        echo "<div class=\"btn-group btn-group-sm\">";
                                                        echo "<button onclick=\"confirmTam('".$dados['tamanhoNome']."');\" class=\"btn\" type=\"button\" id=\"size".$i."\" name=\"size".$i."\" value=\"".$dados['tamanhoId']."\">".$dados['tamanhoNome']."</button>";
                                                        echo "</div>";
                                                        break;
                                                    }
                                                }
                                                mysqli_data_seek($ptamanhos, 0);
                                            }
                                           ?>

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
                                        <input type="text" hidden id="prodTam" value=""/>
                                        <button class="btn" onclick="confirmCar(<?php echo $dadosProduto['produtoId']; ?>)"><i class="fa fa-shopping-cart"></i> Adicionar ao Carrinho</button>
                                        <a class="btn" href="confirm-add-product-fav.php?id=<?php echo $dadosProduto['produtoId']; ?>"><i class="fa fa-heart"></i>Adicionar ao favoritos</a>
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
                            $genero="";
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

                            $result2=mysqli_query($con,$sql2);

                            while($dados=mysqli_fetch_array($result2)){

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
                                            <a href="product-detail.php">
                                                <?php echo "<img src=\"".$dados['produtoImagemURL']."\">";?>
                                            </a>
                                            <div class="product-action">
                                                <a href="confirm-add-product-fav.php?id=<?php echo $dadosProduto['produtoId']; ?>"><i class="fa fa-heart"></i></a>
                                                <a href="product-detail.php?id=<?php echo $dados['produtoId']; ?>"><i class="fa fa-search"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-price">
                                            <h3><span>$</span><?php echo $dados['produtoPreco'];?></h3>
                                            <a class="btn" href="product-detail.php?id=<?php echo $dados['produtoId']; ?>"><i class="fa fa-shopping-cart"></i>Comprar</a>
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
                    <div class="sidebar-widget brands">
                        <h2 class="title">Categoria</h2>
                        <nav class="navbar bg-light">
                            <ul class="navbar-nav">
                                <?php

                                $sql="Select categoriaId,categoriaNome from categorias";
                                $result=mysqli_query($con,$sql);

                                while($dados=mysqli_fetch_array($result)){
                                    $visivel="";
                                    if ($categ == $dados['categoriaId'])
                                        $visivel = "style='font-weight: bold;'";

                                    ?>

                                    <li class="nav-item">
                                        <a class="nav-link" <?php echo $visivel; ?>  href="product-list.php?cat=<?php echo $dados['categoriaId']?><?php if ($tipo!=0) echo "&tip=".$tipo; if (strlen($genero)>0) echo "&gen=".$genero;?>">
                                            <?php echo $dados['categoriaNome']?>
                                        </a>
                                    </li>

                                    <?php


                                }
                                //*******************

                                ?>
                            </ul>
                        </nav>
                    </div>
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
    <script>
        function confirmCar(prodId) {
            let pt=document.getElementById("prodTam").value;
            window.location.href = "confirm-add-product-cart.php?id="+prodId+"&tam="+pt;
        }

        function confirmTam(prodTam) {
            let pt=document.getElementById("prodTam");
            pt.value = prodTam;

        }

    </script>
<?php
bottom();
?>