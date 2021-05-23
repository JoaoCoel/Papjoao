<?php
include_once ("includes/body.inc.php");
top();

?>
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
                            <table class="table table-bordered">
                                <tr>
                                    <thead class="thead-dark">
                                        <th align='center'>Id</th>
                                        <th align='center'>Nome</th>
                                        <th align='center'>Email</th>
                                        <th align='center'>Estado</th>
                                        <th align='center'>Administrador</th>
                                    </thead>
                                </tr>
                                    <tr>
                                        <?php
                                        $sql="select * from utilizadores left join perfis on utilizadorPerfilId=perfilId";
                                        $result=mysqli_query($con,$sql);

                                        //echo "<table class='table table-striped'>";
                                            while($dados=mysqli_fetch_array($result)){
                                        ?>
                                                <form action="confirm-edit-estado.php" method="post" enctype="multipart/form-data">
                                                    <?php
                                                    echo "<tr>";
                                                    echo "<input type='text' hidden name='perfilId' value=".$dados['perfilId'].">";
                                                    echo "<td align='center' >".$dados['perfilId']."</td>";
                                                    echo "<td align='center'>".$dados['perfilNome']."</td>";
                                                    echo "<td align='center'>".$dados['utilizadorEmail']."</td>";
                                                    ?>

                                                    <td align="center">
                                                        <select onchange="this.form.submit()" type="submit" class="custom-select" id="perfilEstado" name="perfilEstado">
                                                            <?php
                                                            if ($dados['perfilEstado']=='ativo') {
                                                                echo "<option selected value='ativo'>ativo</option>";
                                                                echo "<option value='inativo'>inativo</option>";
                                                                echo "<option value='pendente'>pendente</option>";
                                                            }else if ($dados['perfilEstado']=='inativo'){
                                                                echo "<option value='ativo'>ativo</option>";
                                                                echo "<option selected value='inativo'>inativo</option>";
                                                                echo "<option value='pendente'>pendente</option>";
                                                            }else{
                                                                echo "<option value='ativo'>ativo</option>";
                                                                echo "<option value='inativo'>inativo</option>";
                                                                echo "<option selected value='pendente'>pendente</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </td>
                                                    <td align="center">
                                                        <select onchange="this.form.submit()" type="submit" class="custom-select" id="perfilAdmin" name="perfilAdmin">
                                                            <?php

                                                            if ($dados['perfilAdmin']=='sim') {
                                                                echo "<option selected value='sim'>Sim</option>";
                                                                echo "<option value='nao'>Não</option>";
                                                            }else if ($dados['perfilAdmin']=='nao'){
                                                                echo "<option value='sim'>Sim</option>";
                                                                echo "<option selected value='nao'>Não</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </td>
                                                </form>
                                                <?php
                                            }
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