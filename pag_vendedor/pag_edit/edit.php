<?php
session_start();
$conn = mysqli_connect('localhost','id18653684_root','YtVQA(#^ra7LFGg?','id18653684_daterra');

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
$result_usuario = "SELECT * FROM produto WHERE id = $id";
$resultado_usuario = mysqli_query($conn, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);
$_SESSION['id_produto'] = $id;

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
    
    <title>Daterra</title>
</head>

<body>
    <!-- INICIO MENU ESCONDIDO -->
    <div id="tab-hid">
        <div id="tabBorder"></div>

        <p onclick="fecharNav()" class="times">&times;</p>

        <div id="tabBorder"></div>

        <br>

        <ul>
	        <a href="http://daterra3tds.000webhostapp.com/index.html" id="menu-item">Home</a>
	        <a href="https://daterra3tds.000webhostapp.com/pag_compre/compra.php" id="menu-item">Comprar</a>
	        <a href="https://daterra3tds.000webhostapp.com/pag_venda/venda.php" id="menu-item">Vender</a>
	        <a href="https://daterra3tds.000webhostapp.com/pag_login/login.php" id="menu-item">Sair</a>
        </ul>

        <br>

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
	        <a href="https://daterra3tds.000webhostapp.com/pag_login/login.php" id="menu-item">Sair</a>
        </div>
        <div id="navRight">
            <a href="" class="social-icons"><i class="fa fa-facebook"></i></a>
            <a href="" class="social-icons"><i class="fa fa-instagram"></i></a>
            <a href="" class="social-icons"><i class="fa fa-twitter"></i></a>
        </div>
    </nav>
    <!-- FIM MENU -->

    <br>

    <main>

        <div class="formulario">

            <div class="formularioBox">

                <form action="php/processa_edit.php" method="post">

                    <div>
                        <label for="nome">Novo nome do produto:</label><br>
                        <input type="text" name="nome" id="nome" value='<?php echo $row_usuario['nome']; ?>'/>
                    </div>

                    <div>
                        <label for="nome">Novo preço:</label><br>
                        <input type="number" min="0" name="preco" id="preco" step=".01" value='<?php echo $row_usuario['preco']; ?>' />
                    </div>
                    
                    <div>
                        <label for="nome">Tipo de venda:</label><br>
                        <select name="tipo_venda" id="estado">
                            <option value="Kg">Por quilograma (Kg).</option>
                            <option value="a unid.">Por unidade.</option>
                        </select>
                    </div>

                    <div>
                        <label for="nome">Atualizar estoque:</label><br>
                        <input type="number" min="0" name="estoque" id="estoque" value='<?php echo $row_usuario['estoque']; ?>' />
                    </div>

                    <div>
                        <label for="nome">Nova descrição:</label><br>
                        <input type="text" name="descricao" id="descricao" value='<?php echo $row_usuario['descricao']; ?>'/>
                    </div>

                    <div class="submit">
                        <input type="submit" value="Enviar" id="submit">
                    </div>
                </form>

                <br>

            </div>

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

        const tel = document.getElementById('tel') // Seletor do campo de telefone

        tel.addEventListener('keypress', (e) => mascaraTelefone(e.target.value)) // Dispara quando digitado no campo
        tel.addEventListener('change', (e) => mascaraTelefone(e.target.value)) // Dispara quando autocompletado o campo

        const mascaraTelefone = (valor) => {
            valor = valor.replace(/\D/g, "")
            valor = valor.replace(/^(\d{2})(\d)/g, "($1) $2")
            valor = valor.replace(/(\d)(\d{4})$/, "$1-$2")
            tel.value = valor // Insere o(s) valor(es) no campo
        }

        const cpf = document.getElementById('cpf') // Seletor do campo de cpf

        cpf.addEventListener('keypress', (e) => mascaraCpf(e.target.value)) // Dispara quando digitado no campo
        cpf.addEventListener('change', (e) => mascaraCpf(e.target.value)) // Dispara quando autocompletado o campo

        const mascaraCpf = (valor) => {

            cpf.value = valor.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, "$1.$2.$3-$4");
        }
    </script>

</body>
</html>