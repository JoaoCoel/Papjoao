<?php
include_once ("includes/body.inc.php");
top();
$pid=intval($_SESSION['pid']);
$sql="select * from utilizadores left join perfis on utilizadorPerfilId=perfilId where utilizadorId=".$_SESSION['id'];
$result=mysqli_query($con,$sql);
$dados=mysqli_fetch_array($result);


$sql1="select * from enderecos left join perfis on enderecoPerfilId=perfilId where perfilId=".$pid;
$result1=mysqli_query($con,$sql1);
$dados1=mysqli_fetch_array($result1);








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
        
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Página Principal</a></li>
                    <li class="breadcrumb-item active">Minha Conta</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <!-- My Account Start -->
        <div class="my-account">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="account-nav" data-toggle="pill" href="#account-tab" role="tab"><i class="fa fa-user"></i>Detalhes da conta</a>
                            <a class="nav-link" id="orders-nav" data-toggle="pill" href="#orders-tab" role="tab"><i class="fa fa-shopping-bag"></i>Pedidos</a>
                            <a class="nav-link" id="address-nav" data-toggle="pill" href="#address-tab" role="tab"><i class="fa fa-map-marker-alt"></i>Endereço</a>
                            <a class="nav-link" href="index.php"><i class="fa fa-sign-out-alt"></i>Logout</a>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="account-tab" role="tabpanel" aria-labelledby="account-nav">
                                <h4>Detalhes da conta</h4>
                                <form action="confirm-edit-account.php" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input class="form-control" type="text"  placeholder="Nome" value="<?php echo $dados['perfilNome']?>" name="perfilNome">
                                            <input hidden class="form-control" type="text" placeholder="Nome" value="<?php echo $dados['perfilId']?>" name="perfilId">
                                        </div>
                                        <div class="col-md-6">
                                            <input class="form-control" type="text" placeholder="Telemóvel" value="<?php echo $dados['perfilTele']?>" name="perfilTele">
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn">Atualizar a Conta</button>
                                            <br><br>
                                        </div>
                                    </div>
                                </form>
                                <h4>Mudar Password</h4>
                                <form name="passform" action="confirm-edit-password.php" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-control" id="pass"  name="oldpass" type="password" placeholder="Current Password">
                                            <input hidden class="form-control" type="text" placeholder="Nome" value="<?php echo $dados['utilizadorId']?>" name="utilizadorId">
                                        </div>
                                        <div class="col-md-6">
                                            <input class="form-control" id="pass1" name="pass"  type="password" placeholder="Nova Password" value="<?php if (isset($_POST['pass1'])) echo $_POST['pass1']; ?>">
                                        </div>
                                        <div class="col-md-6">
                                            <input class="form-control" type="password" id="pass2" placeholder="Confirmar Password">
                                        </div>
                                        <div class="col-md-12">
                                            <button onclick="submeterRegisto()" class="btn">Salvar Mudanças</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="orders-tab" role="tabpanel" aria-labelledby="orders-nav">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>Nº</th>
                                                <th>Data</th>
                                                <th>Preço</th>
                                                <th>Pagamento</th>
                                                <th>Morada</th>
                                                <th>Cod. Postal</th>
                                                <th>Localidade</th>
                                                <th>Estado</th>
                                                <th>Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <script>
                                            function ver(encId)
                                            {
                                                window.location.href = "order-detail.php?encId="+encId;
                                            }
                                        </script>

                                        <?php
                                        $sql2="select * from encomendas where encomendaPerfilId=".$pid;

                                        $result2=mysqli_query($con,$sql2);
                                        while($dados2=mysqli_fetch_array($result2)){
                                        ?>
                                            <tr>
                                                <td><?php echo $dados2['encomendaNum'];?></td>
                                                <td><?php echo $dados2['encomendaData'];?></td>
                                                <td><?php echo $dados2['encomendaPrec'];?></td>
                                                <td><?php echo $dados2['encomendaPagam'];?></td>
                                                <td><?php echo $dados2['encomendaMorada'];?></td>
                                                <td><?php echo $dados2['encomendaCodPostal'];?></td>
                                                <td><?php echo $dados2['encomendaLocal'];?></td>
                                                <td><?php echo $dados2['encomendaEstado'];?></td>
                                                <td><button class="btn" onclick="ver(<?php echo $dados2['encomendaId'];?>);">Ver</button></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="address-tab" role="tabpanel" aria-labelledby="address-nav">
                                <h4>Endereço</h4>
                                <form action="confirm-edit-endereco.php" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p>Morada: <?php echo $dados1['enderecoMorada']?></p>
                                            <p>Cod. Postal: <?php echo $dados1['enderecoCodPostal']?> <?php echo $dados1['enderecoLocal']?></p>
                                            <a class="btn" href="edit-address.php">Editar Endereço</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- My Account End -->
        
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
    function submeterRegisto() {
        const frm = document.getElementById("passform");
        let pass = document.getElementById("pass").value;
        let pass1 = document.getElementById("pass1").value;
        let pass2 = document.getElementById("pass2").value;
        if (pass1 == pass2) {
            frm.submit();
        } else {
            alert("Passwords não coincidem!!!")

        }
    }

</script>

<?php
bottom();
?>
