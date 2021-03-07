<?php
include_once ("includes/body.inc.php");
top();
$id=intval($_GET['id']);

$sql="select * from produtos where produtoId=$id";
$result=mysqli_query($con,$sql);
$dadosProduto=mysqli_fetch_array($result);

$sql="Select * from tipos";
$tipos=mysqli_query($con,$sql);
$sql="Select * from categorias";
$categorias=mysqli_query($con,$sql);


?>
<!-- Bottom Bar End -->

<!-- Breadcrumb Start -->
<div class="breadcrumb-wrap">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active"><a href="editing-list.php">Lista de edição</a></li>
            <li class="breadcrumb-item active">Editar produto</li>
        </ul>
    </div>
</div>
<!-- Breadcrumb End -->
<form action="confirm-edit-product.php" method="post" enctype="multipart/form-data">
    <!-- Checkout Start -->
    <div class="checkout">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="checkout-inner">
                        <div class="billing-address">
                            <div class="row">
                                <div class="col-md-12">
                                    <input name="idProduto" hidden value="<?php echo $dadosProduto['produtoId']?>"/>
                                    <label>Nome do produto</label>
                                    <input class="form-control" name="nomeProduto" type="text" placeholder="" value="<?php echo $dadosProduto['produtoNome']?>">
                                </div>
                                <div class="col-md-6">
                                    <label>Categoria</label>
                                    <select class="custom-select" id="categoriaProduto" name="categoriaProduto">
                                        <?php
                                        while ($dados=mysqli_fetch_array($categorias)){
                                            if ($dados['categoriaId'] == $dadosProduto['produtoTipoCategoriaCategoriaId']) $status = "selected"; else $status = "";

                                            echo "<option value=\"".$dados['categoriaId']."\" ".$status.">".$dados['categoriaNome']."</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label>Tipo</label>
                                    <select class="custom-select" id="tipoProduto" name="tipoProduto">
                                        <?php
                                        while ($dados=mysqli_fetch_array($tipos)){
                                            if ($dados['tipoId'] == $dadosProduto['produtoTipoCategoriaTipoId']) $status = "selected"; else $status = "";
                                            echo "<option value=\"".$dados['tipoId']."\" ".$status.">".$dados['tipoNome']."</option>";
                                        }
                                        ?>

                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label>Género</label>
                                    <select class="custom-select">
                                        <option selected>Homem</option>
                                        <option>Mulher</option>
                                        <option>Rapaz</option>
                                        <option>Rapariga</option>
                                        <option>Bébé</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label>Preço $</label>
                                    <input class="form-control" name="precoProduto" type="text" placeholder="0.00" value="<?php echo $dadosProduto['produtoPreco']?>">
                                </div>
                                <div class="col-md-3">
                                    <label>Desconto %</label>
                                    <input class="form-control" type="text" placeholder="0">
                                </div>
                                <div class="col-md-12">
                                    <label>Descrição do produto</label>
                                    <input class="form-control" name="descProduto" type="text" placeholder="">
                                </div>
                                <div class="col-md-12">
                                    <label for="img">Selecione a imagem:</label><br>
                                    <img width="15%" src="<?php echo "../".$dadosProduto['produtoImagemURL']?>"><br>
                                    <input type="file" id="img" name="imagemProduto" accept="image/*">
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
                <div class="col-lg-4">
                    <div class="checkout-inner">
                        <!--div class="checkout-summary">
                            <h1>Total no Cart </h1>
                            <p>Produto<span>$0.99</span></p>
                            <p class="sub-total">Sub Total<span>$0.99</span></p>
                            <p class="ship-cost">Custo de Envio<span>$1</span></p>
                            <h2>Total<span>$100</span></h2>
                        </div-->

                        <div class="checkout-payment">
                            <div class="payment-methods">
                                <h1>Tamanhos disponiveis</h1>
                                <div class="payment-method">
                                    <div class="custom-control custom-radio">
                                        <input type="checkbox" class="custom-control-input" id="payment-1" name="payment">
                                        <label class="custom-control-label" for="payment-1">S </label>
                                    </div>
                                    <div class="payment-content" id="payment-1-show">
                                    </div>
                                </div>
                                <div class="payment-method">
                                    <div class="custom-control custom-radio">
                                        <input type="checkbox" class="custom-control-input" id="payment-2" name="payment">
                                        <label class="custom-control-label" for="payment-2">M </label>
                                    </div>
                                    <div class="payment-content" id="payment-2-show">
                                    </div>
                                </div>
                                <div class="payment-method">
                                    <div class="custom-control custom-radio">
                                        <input type="checkbox" class="custom-control-input" id="payment-3" name="payment">
                                        <label class="custom-control-label" for="payment-3">L </label>
                                    </div>
                                    <div class="payment-content" id="payment-3-show">
                                    </div>
                                </div>
                                <div class="payment-method">
                                    <div class="custom-control custom-radio">
                                        <input type="checkbox" class="custom-control-input" id="payment-4" name="payment">
                                        <label class="custom-control-label" for="payment-4">XL </label>
                                    </div>
                                    <div class="payment-content" id="payment-4-show">
                                    </div>
                                </div>
                            </div>
                            <div class="payment-methods">
                                <h1>Idades disponiveis</h1>
                                <div class="payment-method">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="payment-5" name="payment">
                                        <label class="custom-control-label" for="payment-1">0-3 </label>
                                    </div>
                                    <div class="payment-content" id="payment-5-show">
                                    </div>
                                </div>
                                <div class="payment-method">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="payment-6" name="payment">
                                        <label class="custom-control-label" for="payment-2">4-7 </label>
                                    </div>
                                    <div class="payment-content" id="payment-6-show">
                                    </div>
                                </div>
                                <div class="payment-method">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="payment-7" name="payment">
                                        <label class="custom-control-label" for="payment-3">8-11 </label>
                                    </div>
                                    <div class="payment-content" id="payment-7-show">
                                    </div>
                                </div>
                                <div class="payment-method">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="payment-8" name="payment">
                                        <label class="custom-control-label" for="payment-4">12-15 </label>
                                    </div>
                                    <div class="payment-content" id="payment-8-show">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout-btn">
                                <button input type="submit">Guardar</button>
                            </div>
                        </div>
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
<script>
    let categoriaDropdown = document.getElementById('categoriaProduto');
    let tipoDropdown = document.getElementById('tipoProduto');
    /*while (currentYear >= earliestYear) {
        let dateOption = document.createElement('option');
        dateOption.text = currentYear;
        dateOption.value = currentYear;
        dateDropdown.add(dateOption);
        currentYear -= 1;
    }*/
</script>

