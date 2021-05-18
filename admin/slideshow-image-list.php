<?php
include_once ("includes/body.inc.php");
top();

?>

<script>
    function confirmDelete(slideId)
    {
        let r=confirm("Tem a certeza? ("+slideId+")");
        if (r == true) {
            window.location.href = "delete-slideshow-image.php?id="+slideId;
        }
    }

    function add()
    {
        window.location.href = "add-slideshow-image.php";
    }

</script>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Lista produtos</title>
    <style>
        .caixa{
            border: solid 1px black;
            text-align: center;
            font-size: 46px;
        }
        .branca{
            background-color: white;
            color: black;

        }
        .preta{
            background-color: black;
            color: white;

        }

    </style>

</head>
<body>

<div class="wishlist-page">
    <div class="container-fluid">
        <div class="wishlist-page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <div class="container">
                            <?php
                            echo "<button type='button' class='btn btn-light' onclick=\"add();\" style='background: #FF6F61; color: #FFF'>Adicionar</button>";
                            ?>
                            <table class="table table-bordered">
                                <tr>
                                    <thead class="thead-dark">
                                        <th align='center'>Id</th>
                                        <th align='center'>Texto</th>
                                        <th align='center'>Imagem</th>
                                        <th colspan="4" align='center'>Opções</th>
                                    </thead>
                                </tr>
                                        <tr>
                                            <?php
                                            $sql="Select slideshowImagemId,slideshowImagemURL,slideshowImagemTexto from slideshowImagens";

                                            $result=mysqli_query($con,$sql);


                                                while($dados=mysqli_fetch_array($result)){

                                                    echo "<tr>";
                                                    echo "<td align='center'>".$dados['slideshowImagemId']."</td>";
                                                    echo "<td align='center'>".$dados['slideshowImagemTexto']."</td>";
                                                    echo "<td align='center'><img width=100px src=\"..".$dados['slideshowImagemURL']."\"></td>";
                                                    echo "<td align='center'><button type='button' class='btn-cart' onclick=\"confirmDelete(".$dados['slideshowImagemId'].");\">Eliminar</button></td>";
                                                    echo "</tr>";

                                                }
                                                //*******************

                                            ?>
                                        </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
</body>
<?php
bottom();
?>

