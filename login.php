<?php
include_once ("includes/body.inc.php");
top();

$con = mysqli_connect("localhost", "root", "", "pap2021drk");
$sql = "Select * from utilizadores left join perfis on perfilId=utilizadorPerfilId";
//$sql="select utilizadorId,perfis.perfilNome as perfilNome from utilizadores left join perfis on perfilId=utilizadorPerfilId";
$res = mysqli_query($con, $sql) ;
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
        </div>
    </div>
</div>
        <!-- Bottom Bar End --> 
        
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Página Principal</a></li>
                    <li class="breadcrumb-item active">Login & Registar</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        <!-- Login Start -->
        <div class="login">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">    
                        <div class="register-form">
                            <form action="confirm-registar.php" id="regForm" method="post" >
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>E-mail</label>
                                        <input class="form-control" name="email" type="text" placeholder="E-mail" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Nome de utilizador</label>
                                        <input class="form-control" name="nome" type="text" placeholder="Name" value="<?php if (isset($_POST['nome'])) echo $_POST['nome']; ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Nº de Telemóvel</label>
                                        <input class="form-control" name="tele" type="text" placeholder="Mobile No" value="<?php if (isset($_POST['tele'])) echo $_POST['tele']; ?>">
                                    </div>

                                    <div class="col-md-6">
                                        <label>Password</label>
                                        <input class="form-control" name="pass" id="pass1" type="password" placeholder="Password" value="<?php if (isset($_POST['pass1'])) echo $_POST['pass1']; ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Confirmar Password</label>
                                        <input class="form-control" type="password" id="pass2" placeholder="Password">
                                    </div>
                                    <div class="col-md-12">
                                        <button type="button" class="btn" onclick="submeterRegisto()" value="Submeter">Submeter</button>
                                    </div>
                                    <!--div class="col-md-6">
                                        <label>País</label>
                                        <select class="custom-select">
                                            <option selected>United States</option>
                                            <option>Afghanistan</option>
                                            <option>Albania</option>
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
                                    </div-->
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="login-form">
                            <form action="confirm-login.php" id="loginForm" method="post" >
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>E-mail</label>
                                        <input class="form-control" type="text" name="email" placeholder="E-mail">
                                    </div>
                                    <div class="col-md-12">
                                        <label>Password</label>
                                        <input class="form-control" type="password" name="passw" placeholder="Password">
                                    </div>
                                    <div class="col-md-12">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="newaccount">
                                            <label class="custom-control-label" for="newaccount">Manter Login</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button class="btn" onclick="this.submitForm()">Submeter</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Login End -->
        
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
<script>
    function submeterRegisto(){
        const frm = document.getElementById("regForm");
        let pass1 = document.getElementById("pass1").value;
        let pass2 = document.getElementById("pass2").value;
        if (pass1==pass2){
            frm.submit();
        }else {
            alert("Passwords não coincidem!!!")
        }
    }
</script>



<?php
bottom();
?>