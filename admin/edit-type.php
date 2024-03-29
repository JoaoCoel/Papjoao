<?php
include_once ("includes/body.inc.php");
top();
$idT=intval($_GET['id']);

$sql="Select * from tipos where tipoId=".$idT;
$result=mysqli_query($con,$sql);
$dadosT=mysqli_fetch_array($result);

$sql="Select * from categorias";
$categorias=mysqli_query($con,$sql);


$sql="Select * from tipoCategorias where tipoCategoriaTipoId=".$idT;
$categoriasT=mysqli_query($con,$sql);
?>


<!-- Bottom Bar End -->

<!-- Breadcrumb Start -->
<div class="breadcrumb-wrap">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active"><a href="type-list.php">Lista de tipos</a></li>
            <li class="breadcrumb-item active">Editar tipo</li>
        </ul>
    </div>
</div>
<!-- Breadcrumb End -->
<form action="confirm-edit-type.php" method="post" enctype="multipart/form-data">
    <!-- Checkout Start -->
    <div class="checkout">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="checkout-inner">
                        <div class="billing-address">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Categorias a que se aplica:</label><br>

                                    <?php
                                    $i=0;
                                    while ($dados=mysqli_fetch_array($categorias)){
                                        $select = "";
                                        while ($dt=mysqli_fetch_array($categoriasT)){
                                            if ($dt['tipoCategoriaCategoriaId'] == $dados['categoriaId']) {
                                                $select = "checked";
                                                break;
                                            }
                                        }
                                        $i++;
                                        echo  "<input $select disabled='true' type='checkbox' id=\"id".$i."\" name=\"categ".$i."\" value=\"".$dados['categoriaId']."\">".$dados['categoriaNome']."</option>&nbsp&nbsp";
                                        mysqli_data_seek($categoriasT, 0);
                                    }
                                    echo  "<input hidden type='text' value=\"".$i."\" id='ncateg'>";
                                    ?>
                                    <br>
                                    <br>
                                </div>
                                <div class="col-md-12">
                                    <label>Nome do tipo</label>
                                    <input name="idTipo" hidden value="<?php echo $dadosT['tipoId']?>"/>
                                    <input class="form-control" name="nomeTipo" type="text" value="<?php echo $dadosT['tipoNome']?>">
                                </div>
                                <div class="checkout-payment">
                                    <div class="checkout-btn">
                                        <button type="submit">Guardar</button>
                                    </div>
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
                                    <label>Código ZIP</label>
                                    <input class="form-control" type="text" placeholder="ZIP Code">
                                </div>
                            </div>
                        </div-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
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


