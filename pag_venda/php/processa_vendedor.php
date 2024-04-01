<?php
session_start();
include_once("conexao.php");

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$endereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);
$cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
$estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
$cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
$celular = filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_STRING);
$comercial = filter_input(INPUT_POST, 'nomec', FILTER_SANITIZE_STRING);

$result_usuario = "INSERT INTO vendedor(nome, endereco, cidade, estado, cpf, email, senha, celular, comercial) VALUES ( '$nome', '$endereco', '$cidade', '$estado', '$cpf', '$email', '$senha', '$celular', '$comercial')";
$resultado_usuario = mysqli_query($conn, $result_usuario);

if(mysqli_insert_id($conn)) {
	header("Location: ../venda.php");
} else {
	header("Location: ../../index.html");
}

?>