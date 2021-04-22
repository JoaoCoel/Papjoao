<?php
include_once("config.inc.php");
$con=mysqli_connect(HOST,USER,PWD,DATABASE);
$con->set_charset("utf8");
session_start();
$_SESSION['carrinho'][0]=-1;
// não é aqui!



function top(){
    ?>
    <!DOCTYPE HTML>

<html>

	<head>

		<title>Sneaker Store</title>

		<meta charset="utf-8" />

		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />

		<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />

		<link rel="stylesheet" href="assets/css/main.css" />

		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
	</head>

	<body class="is-preload">

		<!-- Wrapper -->

			<div id="wrapper">



				<!-- Header -->

					<header id="header" >
						<a href="index.php" class="logo">
							<span class="title">Sneaker Store</span>
						</a>



							<div style="float: right">
							<a href="#" data-toggle="modal" data-target="#login">Login
                                <i class="fas fa-home"></i>
							<a href="#" data-toggle="modal" data-target="#regista">Registar
                                <i class="fas fa-sign-in-alt"></i></a>
                                <br>
                                <a href="CriticasEFeedBacks.php">
                                    <i class="fas fa-comments"></i>
                                    <span class="btn-sm btn-light">Críticas e Feedbacks</span>
                                </a>
                                <a href="carrinho.php">
                                    <i class="fas fa-cart-plus"></i>
                                    <span class="btn-sm btn-light">Carrinho</span>

                                </a>

                                <a href="contact.php">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span class="btn-sm btn-light">Localização</span>
                                </a>

                                <a href="admin/admin.php">
                                    <i class="fas fa-users-cog"></i>
                                    <span class="btn-sm btn-light">Administração</span>
                                </a>




							</div>

						<div class="nav" style="width: 100%;">


							<ul style="background-color: #5d5d5d; margin-left: 30%">
                                <?php
                                $con=mysqli_connect(HOST,USER,PWD,DATABASE);
                                $sql="select * from marcas";
                                $result=mysqli_query($con,$sql);
                                while($dados=mysqli_fetch_array($result)){
                                ?>
                                <li><a class="menu" href="Marca.php?id=<?php echo $dados["marcaId"] ?>"><?php echo $dados["marcaNome"] ?></a></li>
                                <?php
                                }
                                ?>
							</ul>

						</div>

					</header>

    <?php

        }

?>

                <?php
function bot(){
    ?>

                <footer id="footer">

                    <div class="inner">

                        <section>

                            <h2>Contacte-nos</h2>

                            <form method="post" action="#">

                                <div class="fields">

                                    <div class="field half">

                                        <input type="text" name="nome" id="nome" placeholder="Nome" />

                                    </div>



                                    <div class="field half">

                                        <input type="text" name="email" id="email" placeholder="Email" />

                                    </div>



                                    <div class="field">

                                        <input type="text" name="notas" id="notas" placeholder="Crítica" />

                                    </div>



                                    <div class="field">

                                        <textarea name="message" id="message" rows="3" placeholder="Notas"></textarea>

                                    </div>



                                    <div class="field text-right">

                                        <label>&nbsp;</label>



                                        <ul class="actions" style="width: 290px; height: 70px">

                                            <li><input type="submit" value="Enviar Mensagem" class="primary" style="height: 80px; text-align: center;" /></li>
                                        </ul>

                                    </div>

                                </div>

                            </form>

                        </section>

                        <section>

                            <h2>Apoio ao Cliente</h2>



                            <table class="alt" style="background-color: white">

                                <th><span class="fa fa-envelope-o"></span> <a href="https://www.google.com/intl/pt-PT/gmail/about/#">sneakerstore@apoio.pt</a></th>

                                <thead><span class="fa fa-phone"></span> +351 912345678</thead>

                                <th><span class="fa fa-map-pin"></span>Escola Secundária Pinhal do Rei, Marinha Grande, Leiria, Portugal</th>

                            </table>



                            <h2>Redes Sociais</h2>



                            <table class="icons" style="height: 51px; width: 300px">

                                <tr><a href="https://twitter.com/login?lang=pt" class="icon style2 fa-twitter"><span class="label" style="background-color: #ffffff">Twitter</span></a></tr>

                                <tr ><a href="https://pt-pt.facebook.com/" class="icon style2 fa-facebook" style="margin-left: 20px; margin-right: 20px"><span class="label">Facebook</span></a></tr>

                                <tr><a href="https://www.instagram.com/" class="icon style2 fa-instagram"><span class="label">Instagram</span></a></tr>





                            </table>

                        </section>




                        <ul class="copyright" >

                            <li>Copyright © 2020 Company Name</li>

                            <li>Template by: <a href="https://www.phpjabbers.com/">PHPJabbers.com</a></li>

                        </ul>

                    </div>

                </footer>



            </div>



        <!-- Scripts -->

        <script src="assets/js/jquery.min.js"></script>

        <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>

        <script src="assets/js/jquery.scrolly.min.js"></script>

        <script src="assets/js/jquery.scrollex.min.js"></script>

        <script src="assets/js/main.js"></script>
        <script src="js/common.js"></script>



    </body>

</html>

    <?php

        }

?>
<?php
    function top_2(){
    ?>
    <!DOCTYPE HTML>

<html>

<head>

    <title>Sneaker Store</title>

    <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />

    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css" />

    <link rel="stylesheet" href="../assets/css/main.css" />

    <noscript><link rel="stylesheet" href="../assets/css/noscript.css" /></noscript>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
</head>

<body class="is-preload">

<!-- Wrapper -->

<div id="wrapper">



    <!-- Header -->

    <header id="header" >
        <a href="../index.php" class="logo">
            <span class="title">Sneaker Store</span>
        </a>
        <div style="float: right">
            <a href="#" data-toggle="modal" data-target="#login">Login
                <i class="fas fa-home"></i>
                <a href="#" data-toggle="modal" data-target="#regista">Registar
                    <i class="fas fa-sign-in-alt"></i></a>
                <br>
                <a href="CriticasEFeedBacks.php">
                    <i class="fas fa-comments"></i>
                    <span class="btn-sm btn-light">Críticas e Feedbacks</span>
                </a>
                <a href="carrinho.php">
                    <i class="fas fa-cart-plus"></i>
                    <span class="btn-sm btn-light">Carrinho</span>

                </a>

                <a href="contact.php">
                    <i class="fas fa-map-marker-alt"></i>
                    <span class="btn-sm btn-light">Localização</span>
                </a>

                <a href="admin.php">
                    <i class="fas fa-users-cog"></i>
                    <span class="btn-sm btn-light">Administração</span>
                </a>

        </div>
    </header>

    <?php

        }

?>

    <?php
    function bot_2(){
    ?>

    <footer id="footer">

        <div class="inner">

            <section>

                <h2>Contacte-nos</h2>

                <form method="post" action="#">

                    <div class="fields">

                        <div class="field half">

                            <input type="text" name="nome" id="nome" placeholder="Nome" />

                        </div>



                        <div class="field half">

                            <input type="text" name="email" id="email" placeholder="Email" />

                        </div>



                        <div class="field">

                            <input type="text" name="notas" id="notas" placeholder="Crítica" />

                        </div>



                        <div class="field">

                            <textarea name="message" id="message" rows="3" placeholder="Notas"></textarea>

                        </div>



                        <div class="field text-right">

                            <label>&nbsp;</label>



                            <ul class="actions" style="width: 290px; height: 70px">

                                <li><input type="submit" value="Enviar Mensagem" class="primary" style="height: 80px; text-align: center;" /></li>
                            </ul>

                        </div>

                    </div>

                </form>

            </section>

            <section>

                <h2>Apoio ao Cliente</h2>



                <table class="alt" style="background-color: white">

                    <th><span class="fa fa-envelope-o"></span> <a href="https://www.google.com/intl/pt-PT/gmail/about/#">sneakerstore@apoio.pt</a></th>

                    <thead><span class="fa fa-phone"></span> +351 912345678</thead>

                    <th><span class="fa fa-map-pin"></span>Escola Secundária Pinhal do Rei, Marinha Grande, Leiria, Portugal</th>

                </table>



                <h2>Redes Sociais</h2>



                <table class="icons" style="height: 51px; width: 300px">

                    <tr><a href="https://twitter.com/login?lang=pt" class="icon style2 fa-twitter"><span class="label" style="background-color: #ffffff">Twitter</span></a></tr>

                    <tr ><a href="https://pt-pt.facebook.com/" class="icon style2 fa-facebook" style="margin-left: 20px; margin-right: 20px"><span class="label">Facebook</span></a></tr>

                    <tr><a href="https://www.instagram.com/" class="icon style2 fa-instagram"><span class="label">Instagram</span></a></tr>





                </table>

            </section>




            <ul class="copyright" >

                <li>Copyright © 2020 Company Name</li>

                <li>Template by: <a href="https://www.phpjabbers.com/">PHPJabbers.com</a></li>

            </ul>

        </div>

    </footer>



</div>



<!-- Scripts -->

<script src="assets/js/jquery.min.js"></script>

<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="assets/js/jquery.scrolly.min.js"></script>

<script src="assets/js/jquery.scrollex.min.js"></script>

<script src="assets/js/main.js"></script>
<script src="js/common.js"></script>



</body>

</html>

<?php

}

?>
