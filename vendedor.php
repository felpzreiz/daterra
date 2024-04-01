<?php
    $conn = mysqli_connect('localhost','id18653684_root','YtVQA(#^ra7LFGg?','id18653684_daterra');
    
    session_start();
    
    $email = $_SESSION['email'];
    $usuario = "SELECT * FROM vendedor WHERE email = '".$email."'";
    $resultado_usuario = mysqli_query($conn, $usuario);
    $row_usuario = mysqli_fetch_assoc($resultado_usuario);
    $_SESSION['id'] = $row_usuario['id'];
    $id = $_SESSION['id'];
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
    
    <title>Daterra | <?php echo $row_usuario['comercial']; ?></title>
</head>
<body>

    <!--JANELA MODAL-->

    <div id="modal-container-img">
        <div id="modalImg">
            <div id="fecharModalImg" onclick="fecharModalImg()">&times;</div>

            <div class="modalText">

                <h3>Atualizar imagem de perfil:</h3>
                <br>
                <p>Insira sua nova imagem de perfil fazendo upload de um arquivo.</p>
                <br>

                <form action="php/upload.php" method="post" enctype="multipart/form-data">

                    <label class="custom-file-upload">
                        <input type="file" name="arquivo"/>
                        Escolha uma imagem
                    </label>

                    <br>
                    <br>

                    <input type="submit" value="Enviar Imagem" name="enviar">

                </form>

            </div>
        </div>
    </div>

    <div id="modal-container-desc">

        <div id="modalDesc">
            <div id="fecharModalImg" onclick="fecharModalDesc()">&times;</div>

            <div class="modalText">

                <h3>Atualizar descrição do perfil:</h3>
                <br>
                <p>Escreva uma nova descrição para seu perfil:</p>
                <br>

                <form action="php/processa_desc.php" method="post">

                    <input type="text" name="descricao" id="descricao">

                    <br><br>

                    <input type="submit" value="Enviar descrição" name="enviar">

                </form>

            </div>
        </div>
    </div>

    <div id="modal-container-edit">

        <div id="modalDesc">
            <div id="fecharModalImg" onclick="fecharModalEdit()">&times;</div>

            <div class="modalText">

                <h3>Editar um produto:</h3>
                <br>
                <p>Digite o ID do produto que deseja editar:</p>
                <br>

                <form action="pag_edit/edit.php" method="post">

                    <input type="text" name="id" id="descricao">

                    <br><br>

                    <input type="submit" value="Editar produto" name="enviar">

                </form>

            </div>
        </div>
    </div>

    <!--JANELA MODAL-->

    <!-- INICIO MENU ESCONDIDO -->
    <div id="tab-hid">
        <div id="tabBorder"></div>

        <p onclick="fecharNav()" class="times">&times;</i></p>

        <br>

        <ul>
	        <a href="http://daterra3tds.000webhostapp.com/index.html" id="menu-item">Home</a>
	        <a href="https://daterra3tds.000webhostapp.com/pag_compre/compra.php" id="menu-item">Comprar</a>
	        <a href="https://daterra3tds.000webhostapp.com/pag_venda/venda.php" id="menu-item">Vender</a>
	        <a href="https://daterra3tds.000webhostapp.com/pag_login/login.php" id="menu-item">Sair</a>
        </ul>

        <br>

        <div id="tabBorder"></div>
    </div>
    <!-- FIM MENU ESCONDIDO -->

    <!-- INICIO MENU -->
    <nav>
        <div id="navBar"><img src="img/bars.png" alt="" onclick="abrirNav()"></div>
        <div id="navLeft"><a href="../index.html"><img src="img/logo_auto_x2_auto_x2.jpg" alt=""></a></div>
        <div id="navCenter">
            <a href="http://daterra3tds.000webhostapp.com/index.html" id="menu-item">Home</a>
	        <a href="https://daterra3tds.000webhostapp.com/pag_compre/compra.php" id="menu-item">Comprar</a>
	        <a href="https://daterra3tds.000webhostapp.com/pag_venda/venda.php" id="menu-item">Vender</a>
	        <a href="https://daterra3tds.000webhostapp.com/pag_login/login.php" id="menu-item">Sair</a>
        </div>
        <div id="navRight">
            <a href="" class="social-icons"><i class="fa fa-facebook"></i></a>
            <a href="" class="social-icons"><i class="fa fa-instagram"></i></a>
            <a href="" class="social-icons"><i class="fa fa-twitter"></i></a>
        </div>
    </nav>
    <!-- FIM MENU -->

    <main>
        
        <br>

        <div class="title">Página do <span>agricultor</span></div>

        <div class="profile">
            <div class="profile1">
                <?php

                    echo "<img src='php/" . $row_usuario['foto'] . "' alt=''>";
		
                ?>
            </div>

            <div class="profile2">

            <?php
            
                echo "<p class='profileMain'>" . $row_usuario['comercial'] . "<span> " . $row_usuario['cidade'] . ", ". $row_usuario['estado'] . "</span></p>";
                echo "<p class='profileOcup'>Agricultor</p>";
                echo "<p class='profileDesc'>" . $row_usuario['descricao'] . "</p>";
                echo "</tr>";
		
            ?>
            
            <br>

            <div class="buttons">Editar: <br><button onclick="abrirModalDesc()"><a href="#">Descrição</a></button><br><button onclick="abrirModalImg()"><a href="#">Imagem</a></button></div>

            </div>
        </div>

        <br>

        <div class="title"><span>Produtos</span><button><a href="pag_add/add.php">Adicionar +</a></button><button><a onclick="abrirModalEdit()">Editar</a></button></div>

        <div class="tableList">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Estoque</th>
                    <th>Descrição</th>
                    <th>Venda</th>
                </tr>
                
                <?php
		
	                $pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);		
	                $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
		
	                //Setar a quantidade de itens por pagina
	                $qnt_result_pg = 999999;
		
	                //calcular o inicio visualização
	                $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;
		
	                $result_usuarios = "SELECT * FROM produto WHERE id_vendedor = $id LIMIT $inicio, $qnt_result_pg";
	                $resultado_usuarios = mysqli_query($conn, $result_usuarios);
	                
	                while($row_usuario = mysqli_fetch_assoc($resultado_usuarios)){
                        echo "<tr>";
		                echo "<td>" . $row_usuario['id'] . "</td>";
                        echo "<td>" . $row_usuario['nome'] . "</td>";
                        echo "<td>" . $row_usuario['preco'] . "</td>";
                        echo "<td>" . $row_usuario['estoque'] . "</td>";
                        echo "<td>" . $row_usuario['descricao'] . "</td>";
                        echo "<td>" . $row_usuario['venda'] . "</td>";
                        echo "</tr>";
	                }
		
                ?>

            </table>
        </div>
        
        <br>

        <div class="title"><span>Pedidos</span></div>

        <div class="tableList">
            <table>
                <tr>
                    <th>ID Cliente</th>
                    <th>ID Produto</th>
                    <th>Produto</th>
                    <th>Preço</th>
                </tr>
                
                <?php
		
	                $pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);		
	                $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
		
	                //Setar a quantidade de itens por pagina
	                $qnt_result_pg = 999999;
		
	                //calcular o inicio visualização
	                $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;
		
	                $result_usuarios = "SELECT * FROM pedidos WHERE id_vendedor = $id LIMIT $inicio, $qnt_result_pg";
	                $resultado_usuarios = mysqli_query($conn, $result_usuarios);
	                
	                while($row_usuario = mysqli_fetch_assoc($resultado_usuarios)){
                        echo "<tr>";
		                echo "<td>" . $row_usuario['id_cliente'] . "</td>";
                        echo "<td>" . $row_usuario['id_produto'] . "</td>";
                        echo "<td>" . $row_usuario['nome_prod'] . "</td>";
                        echo "<td>" . $row_usuario['preco'] . "</td>";
                        echo "</tr>";
	                }
		
                ?>

            </table>
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

        var modal1 = document.getElementById("modal-container-desc")
        var modal2 = document.getElementById("modal-container-img")
        var modal3 = document.getElementById("modal-container-edit")

        function abrirModalDesc (){
            modal1.style.display = "block"
        }

        function fecharModalDesc (){
            modal1.style.display = "none"
        }

        function abrirModalImg (){
            modal2.style.display = "block"
        }

        function fecharModalImg (){
            modal2.style.display = "none"
        }

        function abrirModalEdit (){
            modal3.style.display = "block"
        }

        function fecharModalEdit (){
            modal3.style.display = "none"
        }
    </script>
    <!-- FIM SCRIPT -->

</body>
</html>