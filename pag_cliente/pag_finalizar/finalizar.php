<?php
    $conn = mysqli_connect('localhost','id18653684_root','YtVQA(#^ra7LFGg?','id18653684_daterra');
    
    session_start();
    
    $email = $_SESSION['email'];
    $usuario = "SELECT * FROM cliente WHERE email = '".$email."'";
    $resultado_usuario = mysqli_query($conn, $usuario);
    $row_usuario = mysqli_fetch_assoc($resultado_usuario);
    $_SESSION['id'] = $row_usuario['id'];
    $id = $_SESSION['id'];
    $id_prod = $_SESSION['id_prod'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="icon.png">
    
    <title>Daterra | Finalizar</title>

    <style>

        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Bodoni+Moda:ital,wght@1,800&display=swap');

        *{
            padding: 0px;
            margin:0px;
            overflow-x: hidden;
            font-family: 'Poppins', sans-serif;
        }

        body{
            background-color: #465F48;
        }

        .container {
            width: 100vw;
            height: 100vh;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
        }

        .box {
            
            border-radius: 10px;
            background: #fff;
        }

        .fin-box{
            width: 90%;
            margin: 30px;
        }

        .title{
            font-size: 24px;
            font-weight: 500;
            color: #333;
        }

        input[type=submit] {
            padding:5px 15px; 
            background:#465F48; 
            font-size: 17px;
            color: #fff;
            border:0 none;
            cursor:pointer;
            -webkit-border-radius: 5px;
            border-radius: 5px; 
        }

    </style>
</head>

<body>
    <div class="container">
        <div class="box">
            <div class="fin-box">

                <div class="title">Finalizar Pedido</div>

                <br>

                <h3>Resumo do pedido</h3>

                <br>

                <?php
	                $pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);		
	                $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
		
	                //Setar a quantidade de itens por pagina
	                $qnt_result_pg = 999999;
		
	                //calcular o inicio visualização
	                $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;
		
	                $result_cesta = "SELECT * FROM cesta WHERE id_cliente = $id LIMIT $inicio, $qnt_result_pg";
	                $resultado_cesta = mysqli_query($conn, $result_cesta);
	                
	                while($row_cesta = mysqli_fetch_assoc($resultado_cesta)){

                        echo "<p>" . $row_cesta['nome_prod'] . " - R$ " . $row_cesta['preco'] . "</p>";

                        $total = $total + $row_cesta['preco'];
	                }

                    echo "<p><strong>Total:</strong> R$ " . $total . "</p>";
                ?>

                <form action="processa_pedido.php" method="post">

                    <br>
                    
                    <div>
                        <p>Você prefere:</p>
                        <input type="radio" name="tipo" value="Entrega"> Receber em casa.<br>
                        <input type="radio" name="tipo" value="Retira"> Retirar com o vendedor.<br> 
                    </div>

                    <br>
            
                    <input type="submit" value="Finalizar compra!">
                </form>

            </div>
        </div>
    </div>
</body>
</html>