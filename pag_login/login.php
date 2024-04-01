<?php
    
    session_start();
    
    $id_prod = $_GET['id'];
    $_SESSION['id_prod'] = $id_prod;
    
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="estilo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="icon.png">
    
    <title>Daterra | Login</title>
    
   </head>
<body>

    <div class="container">

        <div class="cover">
            <div class="front">
                <img src="img/farmer.jpg" alt="">
                <div class="text">
                <span class="text-1">Plante<br>essa ideia.</span>
                <span class="text-2">Conecte-se.</span>
                </div>
            </div>
        </div>

        <div class="forms">

            <div class="form-content">

              <div class="login-form">

                <div class="title">Login</div>

                    <form method="POST" action="php/valida.php">

                        <div class="input-boxes">

                            <div class="input-box">
                                <i class="fas fa-envelope"></i>
                                <input type="text" id="email" name="email" placeholder="Insira seu e-mail" required>
                            </div>
                            
                            <div class="input-box">
                                <i class="fas fa-lock"></i>
                                <input type="password" id="senha" name="senha" placeholder="Insira sua senha" required>
                            </div>

                            <br>

                            <div>
                                <p>Tipo de conta:</p>
                                <input type="radio" name="conta" value="vendedor"> Vendedor<br>
                                <input type="radio" name="conta" value="cliente"> Cliente<br> 
                            </div>

                            <div class="button input-box">
                                <input type="submit" value="Entrar" id="entrar" name="entrar">
                            </div>
                            
                            <div class="text sign-up-text">Não possui uma conta? Cadastre-se como:</div>
                            <div class="text sign-up-text"><a href="../pag_cad_cliente/cad_cliente.php">Cliente</a> ou <a href="../pag_venda/venda.php">Vendedor</a>.</div>

                        </div>

                    </form>

                </div>

            </div>

        </div>
        
    </div>

</body>
</html>