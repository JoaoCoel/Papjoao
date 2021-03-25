<?php
include_once ("includes/body.inc.php");
top();

?>

<script>
    function confirmDelete(tipId)
    {
        let r=confirm("Tem a certeza? ("+tipId+")");
        if (r == true) {
            window.location.href = "delete-type.php?id="+tipId;
        }
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

<div class="container">
    <a href="index.php">Voltar</a>
    <a class="ml-5" href="add-type.php">Adicionar</a>
    <table class="table table-striped">
        <tr>
            <th width="3%" align='left'>Id</th>
            <th width="3%" align='left'>Tipo</th>
        </tr>
            <tr>
                <?php
                $sql="Select tipoId,tipoNome from tipos";

                $result=mysqli_query($con,$sql);

                echo "<table>";
                    while($dados=mysqli_fetch_array($result)){

                        echo "<tr>";
                        echo "<td width='3%' align='left'>".$dados['tipoId']."</td>";
                        echo "<td width='3%' align='left'>".$dados['tipoNome']."</td>";
                        echo "<td align='left'><button type='button' onclick=\"confirmDelete(".$dados['tipoId'].");\">Eliminar</button></td>";
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
