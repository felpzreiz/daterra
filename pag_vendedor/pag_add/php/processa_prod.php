<?php
session_start();

$conn = mysqli_connect('localhost','id18653684_root','YtVQA(#^ra7LFGg?','id18653684_daterra');

$id_vendedor = $_SESSION['id'];
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$preco = filter_input(INPUT_POST, 'preco', FILTER_SANITIZE_STRING);
$tipo_venda = filter_input(INPUT_POST, 'tipo_venda', FILTER_SANITIZE_STRING);
$estoque = filter_input(INPUT_POST, 'estoque', FILTER_SANITIZE_STRING);
$descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
$venda = 0;

date_default_timezone_set('America/Sao_Paulo');
$date = date("YmdHis");

$pasta_local = "uploads/";
$caminho_imagem = $pasta_local . basename($_FILES["arquivo"]["name"]);
$uploadok = 1;
$tipo_imagem = strtolower(pathinfo($caminho_imagem, PATHINFO_EXTENSION));
$novo_nome = $pasta_local . $_SESSION['id'] . $date . "." . $tipo_imagem;

// verificar se é uma imagem ou não 
if (isset($_POST['enviar'])) {
    $check = getimagesize($_FILES['arquivo']['tmp_name']);
    if ($check !== false) {
        $uploadok = 1;
    } else {
        print "Arquivo não é uma imagem. <a href='../vendedor.php'>voltar</a>";
        $uploadok = 0;
    }
}

// verificar se o arquivo já existe
/* if (file_exists($caminho_imagem)) {
    print "Erro, arquivo já existente no servidor. <a href='usuario.php'>voltar</a>";
    $uploadok = 0;
}
*/

// verificar o tamanho do arquivo => 1024KB = 1MB
if ($_FILES["arquivo"]["size"] > 100000000) {
    print "Erro, arquivo muito grande. <a href='../vendedor.php'>voltar</a>";
    $uploadok = 0;
}

// verificar o tipo da imagem permitido
if ($tipo_imagem != "jpg" && $tipo_imagem != "png" && $tipo_imagem != "jpeg") {
    print "Erro, permitido somente arquivos no formato jpg, png e jpeg. <a href='../vendedor.php'>voltar</a>";
    $uploadok = 0;
}

if ($uploadok == 0) {
    print "Erro, seu arquivo não foi aceito. <a href='../vendedor.php'>voltar</a>";
} else {
    if (move_uploaded_file($_FILES["arquivo"]["tmp_name"], $novo_nome)) {

        $sql = "INSERT INTO produto(id_vendedor, nome, imagem, preco, tipo_venda, estoque, venda, descricao) VALUES ('$id_vendedor', '$nome', '$novo_nome', '$preco', '$tipo_venda', '$estoque', 0, '$descricao')";

        $res = mysqli_query($conn, $sql) or die("Não foi possível atualizar o endereço da imagem");
        $_SESSION['foto'] = null;
        $_SESSION['foto'] = $novo_nome;
        $_SESSION['imagem_ok'] = "O arquivo ".basename($_FILES["arquivo"]["name"])." foi atualizado";
        header("location: ../../vendedor.php");
    } else{

        print "Erro, não possível fazer o upload. <a href='../../vendedor.php'>voltar</a>";
    }
}
?>