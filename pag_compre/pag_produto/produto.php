<?php
session_start();

$conn = mysqli_connect('localhost','id18653684_root','YtVQA(#^ra7LFGg?','id18653684_daterra');

include("funcao.php");

$codigo = LimpaString($_GET['id']);

$sql = "SELECT * FROM produto WHERE id = '$codigo'";
$res = mysqli_query($conn, $sql) or die("Não foi possível realizar a consulta.");
$linha = mysqli_fetch_array($res);
$codigo = $_SESSION['cod'];

$nome_vendedor = $linha[1];

$vend = "SELECT comercial FROM vendedor WHERE id = '$nome_vendedor'";
$res_vend = mysqli_query($conn, $vend) or die("Não foi possível realizar a consulta.");
$linha_vend = mysqli_fetch_array($res_vend);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="icon.png">
    
    <title>Daterra | <?php print $linha[2];?></title>
    
    <style>
        .produto1{
            width: 70%;
            height: 460px;
            text-align: center;
            background-image: url(../../pag_vendedor/pag_add/php/<?php print $linha[3]; ?>);
            border-radius: 15px;
        }
        
        @media screen and (max-width: 550px) {
            .produto1{
                width: 99%;
                margin-bottom: 30px;
            }
        }
        
        .produto-info a{
            font-size: 20px;
            text-decoration: none;
            border-radius: 8px;
            padding: 4px 10%;
            background-color: #2d462f;
            color: white;
        }
    </style>
</head>
<body>

    <!-- INICIO MENU ESCONDIDO -->
    <div id="tab-hid">
        <div id="tabBorder"></div>

        <p onclick="fecharNav()" class="times">&times;</i></p>

        <br>

        <ul>
	        <a href="http://daterra3tds.000webhostapp.com/index.html" id="menu-item">Home</a>
	        <a href="https://daterra3tds.000webhostapp.com/pag_compre/compra.php" id="menu-item">Comprar</a>
	        <a href="https://daterra3tds.000webhostapp.com/pag_venda/venda.php" id="menu-item">Vender</a>
	        <a href="https://daterra3tds.000webhostapp.com/pag_login/login.php" id="menu-item">Login</a>
        </ul>

        <br>

        <div id="tabBorder"></div>
    </div>
    <!-- FIM MENU ESCONDIDO -->

    <!-- INICIO MENU -->
    <nav>
        <div id="navBar"><img src="img/bars.png" alt="" onclick="abrirNav()"></div>
        <div id="navLeft"><a href="../../index.html"><img src="img/logo.jpg" alt=""></a></div>
        <div id="navCenter">
            <a href="http://daterra3tds.000webhostapp.com/index.html" id="menu-item">Home</a>
	        <a href="https://daterra3tds.000webhostapp.com/pag_compre/compra.php" id="menu-item">Comprar</a>
	        <a href="https://daterra3tds.000webhostapp.com/pag_venda/venda.php" id="menu-item">Vender</a>
	        <a href="https://daterra3tds.000webhostapp.com/pag_login/login.php" id="menu-item">Login</a>
        </div>
        <div id="navRight">
            <a href="" class="social-icons"><i class="fa fa-facebook"></i></a>
            <a href="" class="social-icons"><i class="fa fa-instagram"></i></a>
            <a href="" class="social-icons"><i class="fa fa-twitter"></i></a>
        </div>
    </nav>
    <!-- FIM MENU -->

    <main>
        <div class="produto_card">

            <div class="produto1">
                <div class="blur-box">
                    <img src="../../pag_vendedor/pag_add/php/<?php print $linha[3]; ?>">
                </div>
            </div>

            <div class="produto2">
                <div class="produto-info">

                    <p class="produto-titulo"><?php print $linha[2]; ?></p>
                    <p class="produto-price">R$ <?php print $linha[4]; ?> <span><?php print $linha[5]; ?></span></p>
                    
                    <p style="height:10px;"></p>
                    
                    <p class="produto-desc"><?php print $linha[8]; ?></p>
                    
                    <p style="height:20px;"></p>
                    
                    <p class="produto-desc"><b>Vendedor:</b> <?php print $linha_vend[0]; ?></p>
                    
                    <p style="height: 10px;"></p>
                    
                    <a href="../../pag_login/login.php?id=<?php print $linha[0];?>">Comprar</a>
                    
                    <p style="height: 5px;"></p>
                    
                </div>
            </div>
        </div>
    </main>

    <!-- INICIO FOOTER -->
    <footer id="myFooter">
        <div class="containerFooter">
            <ul>
	            <li><a href="https://daterra3tds.000webhostapp.com/index.html">Home</a></li>
	            <li><a href="https://daterra3tds.000webhostapp.com/pag_compre/compra.php">Comprar</a></li>
	            <li><a href="https://daterra3tds.000webhostapp.com/pag_venda/venda.php">Vender</a></li>
	            <li><a href="https://daterra3tds.000webhostapp.com/pag_login/login.php">Login</a></li>
            </ul>
            <p class="footer-copyright">© 2022 Copyright - Daterra</p>
        </div>
        <div class="footer-social">
            <a href="" class="social-icons"><i class="fa fa-facebook"></i></a>
            <a href="" class="social-icons"><i class="fa fa-instagram"></i></a>
            <a href="" class="social-icons"><i class="fa fa-twitter"></i></a>
        </div>
    </footer>
    <!-- FIM FOOTER -->

    <!-- INICIO SCRIPT -->
    <script type="text/javascript">

        function abrirNav(){
            document.getElementById("tab-hid").style.height="100%";
        }

        function fecharNav(){
            document.getElementById("tab-hid").style.height="0px";
        }

    </script>
    <!-- FIM SCRIPT -->

</body>
</html>