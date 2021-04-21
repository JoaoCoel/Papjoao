<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);


include_once("config.inc.php");
$con=mysqli_connect(HOST,USER,PWD,DATABASE);
$con->set_charset("utf8");
session_start();
function top(){
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <title>DRK Clothing Store</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="eCommerce HTML Template Free Download" name="keywords">
        <meta content="eCommerce HTML Template Free Download" name="description">

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="stylesheet">

        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="lib/slick/slick.css" rel="stylesheet">
        <link href="lib/slick/slick-theme.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>
    <!-- Top bar Start -->
    <div class="top-bar">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <i class="fa fa-envelope"></i>
                    drk.clothes.support@email.com
                </div>
                <div class="col-sm-6">
                    <i class="fa fa-phone-alt"></i>
                    +012-345-6789
                </div>
            </div>
        </div>
    </div>
    <!-- Top bar End -->

    <!-- Nav Bar Start -->
    <div class="nav" >
        <div class="container-fluid">
            <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                <a href="#" class="navbar-brand">MENU</a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse" >
                    <div class="navbar-nav mr-auto" >
                        <a href="index.php" class="nav-item nav-link active">Pagina Principal</a>
                        <a href="admin/editing-list.php" class="nav-item nav-link">Editar Produtos</a>
                        <a href="cart.php" class="nav-item nav-link">Carrinho</a>
                        <!--a href="my-account.php" class="nav-item nav-link">Minha Conta</a-->
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Mais Paginas</a>
                            <div class="dropdown-menu">
                                <a href="wishlist.php" class="dropdown-item">Lista de Desejos</a>
                                <a href="contact.html" class="dropdown-item">Contacte-nos</a>
                            </div>
                        </div>
                    </div>

                    <?php
                    $con=mysqli_connect("localhost", "root","","pap2021drk");
                    $sql="select * from utilizadores inner join perfis on utilizadorId=perfilUserId where utilizadorId=".$_SESSION['id'];
                    $res = mysqli_query($con, $sql);
                    $dados=mysqli_fetch_array($res);
                    if(isset($_SESSION['id'])){
                    ?>
                        <div class="navbar-nav ml-auto">
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><span><?php echo $dados['perfilNome']?></span>&nbsp;
                                    <img src="<?php echo $dados['perfilAvatarURL'] ?>" style="width: 40px; height: 40px"></a>
                                <div class="dropdown-menu">
                                    <a href="my-account.php" class="dropdown-item">Perfil</a>
                                    <a href="logout.php" class="dropdown-item">Logout</a>

                                </div>
                            </div>
                        </div>
    <?php
                    }else{
    ?>

                        <div class="navbar-nav ml-auto">
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Conta do utilizador</a>
                                <div class="dropdown-menu">
                                    <a href="login.php" class="dropdown-item">Login & Registar</a>
                                </div>
                            </div>
                        </div>
    <?php
                    }
    ?>



                </div>
            </nav>
        </div>
    </div>
    <!--    TOP      -->


    <?php
}


function bottom(){
    ?>
    <!--  BOTTOM  -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-6 copyright">
                    <p>Copyright &copy; <a href="https://htmlcodex.com">HTML Codex</a>. All Rights Reserved</p>
                </div>

                <div class="col-md-6 template-by">
                    <p>Template By <a href="https://htmlcodex.com">HTML Codex</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Bottom End -->

    <!-- Back to Top -->
    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/slick/slick.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    </body>
    </html>
    <?php
}

function contaCoisas($cn, $filtro, $table="produtos", $field=array("produtoTipoCategoriaTipoId")){
    $sql="Select COUNT(*) as nProdutos from ".$table." where ";

    for ($i=0;$i<count($field);$i++){
        $sql.=$field[$i]."='".$filtro[$i]."' and ";
    }
    $sql = substr($sql,0, strlen($sql)-5);

    $result=mysqli_query($cn,$sql);
    $dados=mysqli_fetch_array($result) or die (mysqli_error($cn));
    return $dados['nProdutos'] ;
}

function procuraCoisas($cn, $filtro, $table="produtos", $field="produtoNome"){
    $sql="Select * from ".$table." where ".$field." like \"%".$filtro."%\"";

    $result=mysqli_query($cn,$sql);
    $dados=mysqli_fetch_array($result);
    return $dados;
}
?>