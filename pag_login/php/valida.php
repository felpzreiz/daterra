<?php
session_start();

$login = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$entrar = filter_input(INPUT_POST, 'entrar', FILTER_SANITIZE_STRING);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
$conta = $_POST['conta'];
$_SESSION['email'] = $login;

$id_prod = $_SESSION['id_prod'];

$connect = mysqli_connect('localhost','id18653684_root','YtVQA(#^ra7LFGg?','id18653684_daterra');

    if (isset($entrar)) {
        if ($conta == "vendedor") {
            $verifica = mysqli_query($connect, "SELECT * FROM vendedor WHERE email = '$login' AND senha = '$senha'") or die("erro ao selecionar");

            if (mysqli_num_rows($verifica)<=0){

                echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='../login.php';</script>";
                header("Location:../Index.html");

            } else {

                setcookie("login",$login);
                header("Location:../../pag_vendedor/vendedor.php");
            }
        }

        if ($conta == "cliente") {
            $verifica = mysqli_query($connect, "SELECT * FROM cliente WHERE email = '$login' AND senha = '$senha'") or die("erro ao selecionar");
            $row_verifica = mysqli_fetch_assoc($verifica);

            if (mysqli_num_rows($verifica)<=0){

                echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='../login.php';</script>";
                header("Location:../pag_login/login.php");

            } else {

                if ($id_prod <> ""){

                    $verifica_prod = mysqli_query($connect, "SELECT * FROM produto WHERE id = '$id_prod'");
                    $row_produto = mysqli_fetch_assoc($verifica_prod);

                    $nome_produto = $row_produto['nome'];
                    $preco = $row_produto['preco'];
                    $id_vendedor = $row_produto['id_vendedor'];

                    $verifica_vend = mysqli_query($connect, "SELECT * FROM vendedor WHERE id = '$id_vendedor'");
                    $row_vend = mysqli_fetch_assoc($verifica_vend);

                    $nome_vendedor = $row_vend['comercial'];
                    $id_cliente = $row_verifica['id'];

                    $verifica_prod = mysqli_query($connect, "INSERT INTO cesta(id_produto, nome_prod, preco, id_vendedor, nome_vend, id_cliente) VALUES ('$id_prod', '$nome_produto', '$preco', '$id_vendedor', '$nome_vendedor', '$id_cliente')");

                    setcookie("login",$login);
                    header("Location:../../pag_cliente/cliente.php");

                }else{

                    setcookie("login",$login);
                    header("Location:../../pag_cliente/cliente.php");

                }
            }
        
        }
    }
?>