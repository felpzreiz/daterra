<?php
    $conn = mysqli_connect('localhost','id18653684_root','YtVQA(#^ra7LFGg?','id18653684_daterra');
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
    
    <title>Daterra | Comprar</title>
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
        <div id="navLeft"><a href="../index.html"><img src="img/logo.jpg" alt=""></a></div>
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
        
        <br><br>
        
        <div id="produto">

            <?php
		
	                $pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);		
	                $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
		
	                //Setar a quantidade de itens por pagina
	                $qnt_result_pg = 999999;
		
	                //calcular o inicio visualização
	                $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;
		
	                $result_usuarios = "SELECT * FROM produto LIMIT $inicio, $qnt_result_pg";
	                $resultado_usuarios = mysqli_query($conn, $result_usuarios);
                    $row_produto = mysqli_fetch_assoc($resultado_usuarios);
	                
	                while($row_produto = mysqli_fetch_assoc($resultado_usuarios)){
                        echo "<div id='card'><a href='pag_produto/produto.php?id=".$row_produto['id']."'><img src='../pag_vendedor/pag_add/php/" . $row_produto['imagem'] . "' alt=''><p id='title-card'>" . $row_produto['nome'] . "</p><br><p class='price-card'>R$ " . $row_produto['preco'] . "</p><a href='pag_produto/produto.php?id=".$row_produto['id']."' class='card-buy'>Ver mais +</a></a></div>";
	                }
		
                ?>

        </div>
    </main>

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

    <script type="text/javascript">
        function abrirNav(){
            document.getElementById("tab-hid").style.height="100%";
        }

        function fecharNav(){
            document.getElementById("tab-hid").style.height="0px";
        }
    </script>
</body>
</html>
