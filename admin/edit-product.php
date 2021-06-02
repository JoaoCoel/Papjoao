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

$sql="Select * from tamanhos";
$tamanhos=mysqli_query($con,$sql) or die;

$sql="Select * from produtotamanhos where produtoTamanhoProdutoId=$id";;
$ptamanhos=mysqli_query($con,$sql) or die;

$sql="Select * from tipocategorias";
$categ=1;
$cattipo=mysqli_query($con,$sql) or die;
$cattipoarr=array();

while ($dados=mysqli_fetch_array($cattipo)){
    array_push($cattipoarr,$dados);

}

?>

<script>

    function catChange()
    {
        let categoriaDropdown = document.getElementById('categoriaProduto').value;
        let tipoDropdown = document.getElementById('tipoProduto');
        let cattipo = JSON.parse(document.getElementById('cattipo').value);

        let i;
        let k;
        let select=0;

        for (i = 0; i < tipoDropdown.length ; i++) {
            tipoDropdown.options[i].hidden = true;
            tipoDropdown.options[i].selected = false;
        }

        for (i=0;i<cattipo.length;i++) {
            if (categoriaDropdown == cattipo[i][0]) {
                for (k=0; tipoDropdown.length ; k++) {
                    if (tipoDropdown.options[k].value == cattipo[i][1] ){
                        tipoDropdown.options[k].hidden = false;
                        if (select==0) {
                            tipoDropdown.options[k].selected = true;
                            select=1;
                        }
                        break;
                    }
                }

            }

        }

    }

</script>
<!-- Bottom Bar End -->

<!-- Breadcrumb Start -->
<div class="breadcrumb-wrap">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active"><a href="backoffice/editing-list.php">Lista de edição</a></li>
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
                                <input class="form-control" name="cattipo" id="cattipo" hidden value='<?php echo json_encode($cattipoarr);?>' type="text" placeholder="">
                                <div class="col-md-6">
                                    <label>Categoria</label>
                                    <select onchange="catChange();" class="custom-select" id="categoriaProduto" name="categoriaProduto">
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
                                    <select class="custom-select" id="generoProduto" name="generoProduto">
                                        <?php
                                        if ($dadosProduto['produtoGenero']=='M') {
                                            echo "<option value='M' selected>Homem</option>";
                                            echo "<option value='F' >Mulher</option>";
                                            echo "<option value='U' >Unissexo</option>";
                                        }else if ($dadosProduto['produtoGenero']=='F') {
                                            echo "<option value='M' >Homem</option>";
                                            echo "<option value='F' selected>Mulher</option>";
                                            echo "<option value='U' >Unissexo</option>";
                                        }else {
                                            echo "<option value='M' >Homem</option>";
                                            echo "<option value='F' >Mulher</option>";
                                            echo "<option value='U' selected>Unissexo</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label>Preço €</label>
                                    <input class="form-control" name="precoProduto" type="text" placeholder="0.00" value="<?php echo $dadosProduto['produtoPreco']?>">
                                </div>
                                <div class="col-md-3">
                                    <label>Desconto %</label>
                                    <input class="form-control" name="descontoProduto" type="text" placeholder="0" value="<?php echo $dadosProduto['produtoDesconto']?>">
                                </div>
                                <div class="col-md-12">
                                    <label>Descrição do produto</label>
                                    <input class="form-control" name="descProduto" type="text" placeholder="" value="<?php echo $dadosProduto['produtoDescricao']?>">
                                </div>
                                <div class="col-md-2">
                                    <label>Em Destaque</label>
                                    <select class="custom-select" id="produtoDestaque" name="produtoDestaque">
                                        <?php
                                        if ($dadosProduto['produtoDestaque']=='Sim') {
                                            echo "<option selected value='Sim'>Sim</option>";
                                            echo "<option value='Nao'>Não</option>";
                                        }else{
                                            echo "<option  value='Sim'>Sim</option>";
                                            echo "<option selected value='Nao'>Não</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-10">
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
                                    <div class="custom-control custom-checkbox">
                                        <?php

                                        while ($dados=mysqli_fetch_array($tamanhos)){
                                            $i=$dados['tamanhoId'];
                                            $chk = "";

                                            while ($dt=mysqli_fetch_array($ptamanhos)) {
                                                if ($dt['produtoTamanhoTamanhoId']==$i){
                                                    $chk="checked";
                                                }

                                            }
                                            echo "<div class=\"custom-control custom-radio\">";
                                            echo "<input class=\"custom-control-input\" ".$chk." type=\"checkbox\" id=\"size".$i."\" name=\"size".$i."\" value=\"".$dados['tamanhoId']."\"/>";
                                            echo "<label class=\"custom-control-label\" for=\"size".$i."\">".$dados['tamanhoNome']."</label><br>";
                                            echo "</div>";
                                            mysqli_data_seek($ptamanhos, 0);

                                            //<input type="checkbox" class="custom-control-input" id="size" name="payment">
                                            // <label class="custom-control-label" for="payment-1">S </label>
                                        }
                                        ?>

                                    </div>
                                    <div class="payment-content" id="payment-1-show">
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

    $( document ).ready(function() {
        catChange();
    });

</script>

