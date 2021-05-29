<?php
include_once ("includes/body.inc.php");
if (isset($_POST['email']) and (isset($_POST['passw']))){
    $email=($_POST['email']);
    $pass=($_POST['passw']);
    $con=mysqli_connect("localhost","root","","pap2021drk");
    $sql="Select * from utilizadores left join perfis on perfilId=utilizadorPerfilId where utilizadorEmail='".$email."'";
    $res=mysqli_query($con,$sql) or die(mysqli_error($con));

    if($res->num_rows > 0) {
        $dados=mysqli_fetch_array($res);
        var_dump($dados);
        if ($pass == $dados['utilizadorPass'] && $dados['perfilEstado']=="ativo"){
            session_start();
            $_SESSION['id']=$dados['utilizadorId'];
            $_SESSION['pid']=$dados['perfilId'];
            $_SESSION['nome']=$dados['perfilNome'];
            $_SESSION['admin']=$dados['perfilAdmin'];
            header("location:index.php");
            return;
        }
    }
    header("location:login.php");

}

?>