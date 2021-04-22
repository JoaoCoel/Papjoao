<?php
include_once ("includes/body.inc.php");
top();



?>
<script>
    function searchName()
    {
        let sstr = document.getElementById("search").innerText;
        alert(sstr);
        if (sstr.length > 0) window.location.href = "editing-list.php?search="+sstr;
    }
</script>
<!-- Bottom Bar End -->

<!-- Breadcrumb Start -->
<div class="breadcrumb-wrap">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Página Principal</a></li>
            <li class="breadcrumb-item active">Lista de Produtos</li>
        </ul>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Product List Start -->
<div class="product-view">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-md-12">
                        <div class="product-view-top">
                            <div class="row">
                                <div class="col-md-4">
                                    <form action="product-list.php?search=$_POST['search']">
                                        <div class="product-search">
                                            <input type="text" id="search" name="search" value="">
                                            <button type="submit"><i class="fa fa-search"></i></button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-4">
                                    <div class="product-short">
                                        <div class="dropdown">
                                            <div class="dropdown-toggle" data-toggle="dropdown">Ordenar produto por</div>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item">A-Z</a>
                                                <a href="#" class="dropdown-item">Mais recentes</a>
                                                <a href="#" class="dropdown-item">Preço +</a>
                                                <a href="#" class="dropdown-item">Preço -</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--div-- class="col-md-4">
                                    <div class="product-price-range">
                                        <div class="dropdown">
                                            <div class="dropdown-toggle" data-toggle="dropdown">Preço dos produtos</div>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item">$0 to $20</a>
                                                <a href="#" class="dropdown-item">$21 to $40</a>
                                                <a href="#" class="dropdown-item">$41 to $60</a>
                                                <a href="#" class="dropdown-item">$61 to $80</a>
                                                <a href="#" class="dropdown-item">$81 to $100</a>
                                                <a href="#" class="dropdown-item">$101 to $150</a>
                                                <a href="#" class="dropdown-item">$151 to $200</a>
                                                <a href="#" class="dropdown-item">$251 to $300</a>
                                                <a href="#" class="dropdown-item">$301 to $350</a>
                                                <a href="#" class="dropdown-item">$351 to $400</a>
                                            </div>
                                        </div>
                                    </div>
                                </div-->
                            </div>
                        </div>
                    </div>

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

$result=mysqli_query($con,$sql) or die (mysqli_error($con));

while($dados=mysqli_fetch_array($result)){

/*
https://phpdelusions.net/mysqli_examples/search_filter

*/

?>

                    <div class="col-md-4">
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
                                    <a href="cart.php"><i class="fa fa-cart-plus"></i></a>
                                    <a href="wishlist.php"><i class="fa fa-heart"></i></a>
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


                <!-- Pagination Start -->
                    <div class="col-md-12">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">Anterior</a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Próximo</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Pagination Start -->

            <!--div class="payment-method">
                <div class="custom-control custom-checkbox">
                    <?php
/*
                    while ($dados=mysqli_fetch_array($tamanhos)){
                        $i=$dados['tamanhoId'];
                        $x=0;
                        while ($dt=mysqli_fetch_array($ptamanhos)){
                            if ($dt['produtoTamanhoTamanhoId']==$i ){
                                $x=1;
                                break;
                            }

                        }

                        echo "<div class=\"custom-control custom-radio\">";
                        if ($x == 1) {
                            echo "<input class=\"custom-control-input\" checked type=\"checkbox\" id=\"size".$i."\" name=\"size".$i."\" value=\"".$dados['tamanhoId']."\"/>";
                        } else {

                            echo "<input class=\"custom-control-input\" type=\"checkbox\" id=\"size".$i."\" name=\"size".$i."\" value=\"".$dados['tamanhoId']."\"/>";
                        }
                        // echo  "<input type='checkbox' class='custom-control-input' id=\"size'.$i.'\" name=\"size'.$i.'\" value=\"".$dados['tamanhoId']."\">".$dados['tamanhoNome']."</option>&nbsp&nbsp";



                        echo "<label class=\"custom-control-label\" for=\"size".$i."\">".$dados['tamanhoNome']."</label><br>";
                        echo "</div>";
                        //<input type="checkbox" class="custom-control-input" id="size" name="payment">
                        // <label class="custom-control-label" for="payment-1">S </label>
                    }*/
                    ?>

                </div>
                <div class="payment-content" id="payment-1-show">
                </div>
            </div-->

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
                            <!--li class="nav-item">
                                <a class="nav-link" href="product-list.php?cat=2"><i class="fa fa-child"></i>Criança</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="product-list.php?cat=1"><i class="fa fa-tshirt"></i>Adulto</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="product-list.php?cat=3"><i class="fa fa-mobile-alt"></i>Acessórios</a>
                            </li-->
                        </ul>
                    </nav>
                </div>

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

                            <li>
                                <a <?php echo $visivel;?> href="product-list.php?tip=<?php echo $dados['tipoId']?>
                                <?php if ($categ>0) echo "&cat=".$categ; if (strlen($genero)>0) echo "&gen=".$genero;?>"><?php echo $dados['tipoNome']?>
                                </a><span <?php echo $visivel;?> ><?php echo contaCoisas($con,array($dados['tipoId'])); ?></span>
                            </li>

                            <?php


                        }
                                //*******************

                        ?>
                </div>

                <div class="sidebar-widget brands">
                    <h2 class="title">Género</h2>
                    <ul>

                        <li><a  href="product-list.php?gen=M<?php if ($tipo !=0) echo "&tip=".$tipo?><?php if ($categ!=0) echo "&cat=".$categ; ?>">Homem
                            </a><span><?php echo contaCoisas($con,array("M"),"produtos",array("produtoGenero")); ?></span></li>
                        <li><a  href="product-list.php?gen=F<?php if ($tipo !=0) echo "&tip=".$tipo?><?php if ($categ!=0) echo "&cat=".$categ; ?>">Mulher
                            </a><span><?php echo contaCoisas($con,array("F"),"produtos",array("produtoGenero")); ?></span></li>
                        <li><a  href="product-list.php?gen=U<?php if ($tipo !=0) echo "&tip=".$tipo?><?php if ($categ!=0) echo "&cat=".$categ; ?>">Unissexo
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
                        </div>



            </div>
        </div>
    </div>
</div>
        <!-- Side Bar End -->


        <!-- Product List End -->
        
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

