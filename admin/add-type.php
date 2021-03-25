<?php
include_once ("includes/body.inc.php");
top();
$sql="Select * from tipos";
$tipos=mysqli_query($con,$sql);
$sql="Select * from categorias";
$categorias=mysqli_query($con,$sql);

?>
<script>
function validateForm()
{
    //alert("cheguei");
    let ncateg = document.getElementById("ncateg").value;
    let nselect=0;
    let i;
    let desctipo = document.getElementById("nomeTipo").value;
    //alert("categ = " + nselect + " descTipo = " + desctipo);
    for (i=1;i<=parseInt(ncateg);i++){
        if (document.getElementById("id"+i).checked) nselect++;
    }

    if (nselect>0 && desctipo.length>0){
        document.getElementById("but").disabled = false;
    }else {
        document.getElementById("erro").hidden = false;

    }

}



</script>

        <!-- Bottom Bar End --> 

        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active"><a href="type-list.php">Lista de tipos</a></li>
                    <li class="breadcrumb-item active">Adicionar tipo</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
<form  action="confirm-add-type.php" method="post" enctype="multipart/form-data">
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
                                            $i++;
                                            echo  "<input onchange='validateForm();' type='checkbox' id=\"id".$i."\" name=\"categ".$i."\" value=\"".$dados['categoriaId']."\">".$dados['categoriaNome']."</option>&nbsp&nbsp";
                                        }
                                        echo  "<input hidden type='text' value=\"".$i."\" id='ncateg'>";
                                        ?>
                                        <br>
                                        <br>
                                    </div>
                                    <div class="col-md-12">
                                        <label>Nome do tipo</label>
                                        <input class="form-control" onchange="validateForm();" name="nomeTipo" id="nomeTipo" type="text" placeholder="">
                                        <label hidden id="erro">Selecione pelo menos uma categoria e preencha o nome do tipo</label>
                                    </div>

                                    <div class="checkout-payment">
                                        <div class="checkout-btn" >
                                            <button input disabled name="addType" id="but" type="submit">Adicionar</button>
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


