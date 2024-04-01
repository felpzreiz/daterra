<?php
    $conn = mysqli_connect('localhost','id18653684_root','YtVQA(#^ra7LFGg?','id18653684_daterra');
    
    session_start();
    
    $email = $_SESSION['email'];
    $usuario = "SELECT * FROM cliente WHERE email = '".$email."'";
    $resultado_usuario = mysqli_query($conn, $usuario);
    $row_usuario = mysqli_fetch_assoc($resultado_usuario);
    $_SESSION['id'] = $row_usuario['id'];
    $id = $_SESSION['id'];

    $get_cesta = mysqli_query($conn, "SELECT * FROM cesta WHERE id_cliente = '$id'");

    while ($row_cesta = mysqli_fetch_assoc($get_cesta)){

        $id_prod = $row_cesta['id_produto'];
        $nome_prod = $row_cesta['nome_prod'];
        $preco = $row_cesta['preco'];
        $id_vendedor = $row_cesta['id_vendedor'];
        $entrega = $_POST['tipo'];

        $insert_pedidos = mysqli_query($conn, "INSERT INTO pedidos(id_produto, nome_prod, preco, id_vendedor, id_cliente, entrega) VALUES ('$id_prod', '$nome_prod', '$preco', '$id_vendedor', '$id', '$entrega')");
        $delete_cesta = mysqli_query($conn, "DELETE FROM cesta WHERE id_cliente = '$id'");
        $update_venda = mysqli_query($conn, "UPDATE produto SET venda = venda + 1 WHERE id = '$id_prod'");
    }

    header("Location: ../cliente.php");
?>