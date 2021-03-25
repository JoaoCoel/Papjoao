<?php
include_once ("includes/body.inc.php");
top();

?>

<script>
    function confirmDelete(tamId)
    {
        let r=confirm("Tem a certeza? ("+tamId+")");
        if (r == true) {
            window.location.href = "delete-size.php?id="+tamId;
        }
    }


</script>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Lista tamanhos</title>
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

<div class="container">
    <a href="index.php">Voltar</a>
    <a class="ml-5" href="add-size.php">Adicionar</a>
    <table class="table table-striped">
        <tr>
            <th width="3%" align='left'>Id</th>
            <th width="3%" align='left'>Tamanho</th>
        </tr>
            <tr>
                <?php
                $sql="Select tamanhoId,tamanhoNome from tamanhos";

                $result=mysqli_query($con,$sql);

                echo "<table>";
                    while($dados=mysqli_fetch_array($result)){

                        echo "<tr>";
                        echo "<td width='3%' align='left'>".$dados['tamanhoId']."</td>";
                        echo "<td width='3%' align='left'>".$dados['tamanhoNome']."</td>";
                        echo "<td align='left'><button type='button' onclick=\"confirmDelete(".$dados['tamanhoId'].");\">Eliminar</button></td>";
                        echo "</tr>";

                    }
                    //*******************
                    echo "</table>";
                ?>
            </tr>
    </table>

</div>



<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
</body>
<?php
bottom();
?>

