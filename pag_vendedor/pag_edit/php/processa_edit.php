<?php
session_start();

$conn = mysqli_connect('localhost','id18653684_root','YtVQA(#^ra7LFGg?','id18653684_daterra');

$id_vendedor = $_SESSION['id'];
$id = $_SESSION['id_produto'];
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$preco = filter_input(INPUT_POST, 'preco', FILTER_SANITIZE_STRING);
$tipo_venda = filter_input(INPUT_POST, 'tipo_venda', FILTER_SANITIZE_STRING);
$estoque = filter_input(INPUT_POST, 'estoque', FILTER_SANITIZE_STRING);
$descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);

$result_usuario = "UPDATE produto SET nome='$nome', preco='$preco', tipo_venda='$tipo_venda', estoque='$estoque', descricao='$descricao' WHERE id='$id' AND id_vendedor='$id_vendedor'";
$resultado_usuario = mysqli_query($conn, $result_usuario);

header("Location: ../../vendedor.php");


?>