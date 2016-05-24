<?php

include './conexao.php';
$conexao = conecta();
$destino = "arquivos/fotosLogin/";
if (!file_exists($destino))
    mkdir($destino, 755);

$extImagens = array("jpg", "png", "bmp", "gif");
if (isset($_FILES['arquivos'])) {
    $arquivos = $_FILES['arquivos'];
    $nome = $_FILES['arquivos']['name'];
    $extensao = explode('.', $nome);
    $extensao = $extensao[count($extensao) - 1];
    $destino = "arquivos/fotosLogin/";
    $nomenovo = $_POST['nome'] . " - " . date("Y.m.d-H.i.s") . "." . $extensao;

    if (move_uploaded_file($arquivos['tmp_name'], $destino . $nomenovo)) {
        echo "<br> Arquivo movido com sucesso. <br>";
        echo "Nome do arquivo: " . $nomenovo;
    } else
        echo "<br> Erro ao fazer upload.";
}
if ($_GET['acao'] == 1) {
    $query = "insert into usuarios(usuarios_nome, usuarios_senha, usuarios_email, usuarios_tipo, usuarios_data_nascimento, usuarios_descricao, usuarios_foto) values('{$_POST['nome']}','{$_POST['senha']}','{$_POST['email']}','{$_POST['tipo']}','{$_POST['nascimento']}','{$_POST['descricao']}','$nomenovo')";
    $resultado = inserir($conexao, $query);
    if ($resultado) {
        echo "Usuário cadastrado.";
    } else
        echo "Usuário não cadastrado";
}
if ($_GET['acao'] == 2) {
    $query = "update usuarios set usuarios_nome = '{$_POST['nome']}', usuarios_senha = '{$_POST['senha']}',usuarios_email ='{$_POST['email']}',usuarios_tipo ='{$_POST['tipo']}', usuarios_data_nascimento ='{$_POST['nascimento']}', usuarios_descricao = '{$_POST['descricao']}',usuario_foto = '$nomenovo') where id = {$_POST['id']}";
    $resultado = alterar($conexao, $query);
    if ($resultado) {
        echo "Usuário alterado.";
    } else
        echo "Usuário não alterado";
}
header("location:listar.php");
?>