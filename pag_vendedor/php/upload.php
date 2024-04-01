<?php
$conn = mysqli_connect('localhost','id18653684_root','YtVQA(#^ra7LFGg?','id18653684_daterra');

session_start();
$pasta_local = "uploads/";
$caminho_imagem = $pasta_local . basename($_FILES["arquivo"]["name"]);
$uploadok = 1;
$tipo_imagem = strtolower(pathinfo($caminho_imagem, PATHINFO_EXTENSION));
$novo_nome = $pasta_local . $_SESSION['id'] . "." . $tipo_imagem;

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
        $sql = "UPDATE vendedor
           SET foto = '$novo_nome'
           WHERE id = '" . $_SESSION['id'] . "'           
           ";
        $res = mysqli_query($conn, $sql) or die("Não foi possível atualizar o endereço da imagem");
        $_SESSION['foto'] = null;
        $_SESSION['foto'] = $novo_nome;
        $_SESSION['imagem_ok'] = "O arquivo ".basename($_FILES["arquivo"]["name"])." foi atualizado";
        header("location: ../vendedor.php");
    } else{

        print "Erro, não possível fazer o upload. <a href='../vendedor.php'>voltar</a>";
    }
}

?>