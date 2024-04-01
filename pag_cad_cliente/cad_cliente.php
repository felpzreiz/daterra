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
        <br>

        <div class="title"><span>Cadastre-se</span> para ser cliente.</div>

        <div class="formulario">

            <div class="formularioBox">

                <form action="php/processa_cliente.php" method="post">

                    <div>
                        <label for="nome">Nome completo:</label><br>
                        <input type="text" name="nome" id="nome" placeholder="ex: João da Silva" required/>
                    </div>

                    <div>
                        <label for="nome">Endereço:</label><br>
                        <input type="text" name="endereco" id="endereco" placeholder="ex: Rua Pau Brasil" required/>
                    </div>

                    <div>
                        <label for="nome">Cidade:</label><br>
                        <input type="text" name="cidade" id="cidade" placeholder="ex: Taubaté" />
                    </div>

                    <div>
                        <label for="nome">Estado:</label><br>
                        <select name="estado" id="estado">
                            <option value="AC">Acre</option>
                            <option value="AL">Alagoas</option>
                            <option value="AP">Amapá</option>
                            <option value="AM">Amazonas</option>
                            <option value="BA">Bahia</option>
                            <option value="CE">Ceará</option>
                            <option value="DF">Distrito Federal</option>
                            <option value="ES">Espírito Santo</option>
                            <option value="GO">Goiás</option>
                            <option value="MA">Maranhão</option>
                            <option value="MT">Mato Grosso</option>
                            <option value="MS">Mato Grosso do Sul</option>
                            <option value="MG">Minas Gerais</option>
                            <option value="PA">Pará</option>
                            <option value="PB">Paraíba</option>
                            <option value="PR">Paraná</option>
                            <option value="PE">Pernambuco</option>
                            <option value="PI">Piauí</option>
                            <option value="RJ">Rio de Janeiro</option>
                            <option value="RN">Rio Grande do Norte</option>
                            <option value="RS">Rio Grande do Sul</option>
                            <option value="RO">Rondônia</option>
                            <option value="RR">Roraima</option>
                            <option value="SC">Santa Catarina</option>
                            <option value="SP">São Paulo</option>
                            <option value="SE">Sergipe</option>
                            <option value="TO">Tocantins</option>
                        </select>
                    </div>

                    <div>
                        <label for="nome">CPF:</label><br>
                        <input type="text" name="cpf" id="cpf" placeholder="ex: 000.000.000-00" maxlength="14" required/>
                    </div>

                    <div>
                        <label for="nome">E-mail:</label><br>
                        <input type="text" name="email" id="email" placeholder="ex: joaosilva@email.com" required/>
                    </div>

                    <div>
                        <label for="nome">Celular:</label><br>
                        <input type="text" name="tel" id="tel" placeholder="ex: (00) 00000-0000" maxlength="15" required/>
                    </div>

                    <div>
                        <label for="nome">Senha:</label><br>
                        <input type="password" name="senha" id="senha" required/>
                    </div>

                    <div class="submit">
                        <input type="submit" value="Enviar" id="submit">
                    </div>
                </form>

                <br>

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
    <!-- FIM SCRIPT -->

</body>
</html>