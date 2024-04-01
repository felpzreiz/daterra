<?php
session_start();

$conn = mysqli_connect('localhost','id18653684_root','YtVQA(#^ra7LFGg?','id18653684_daterra');

$descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
$id = $_SESSION['id'];

$result_usuario = "UPDATE vendedor SET descricao='$descricao' WHERE id='$id'";
$resultado_usuario = mysqli_query($conn, $result_usuario);

if(mysqli_insert_id($conn)) {
	header("Location: ../vendedor.php");
} else {
	header("Location: ../vendedor.php");
}

?>