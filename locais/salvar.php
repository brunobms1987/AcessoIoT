<!--REFERENTE AO CADASTRO DE LOCAIS-->
<?php
$conexao = conecta();
date_default_timezone_set('America/Sao_Paulo');
//INÍCIO - CRIAÇÃO DO DESTINO DOS UPLOADS
$destino = "uploads/";
$hoje = date('Y/m/d');

if (!file_exists($destino))
    mkdir($destino);

//FIM - CRIAÇÃO DO DESTINO DOS UPLOADS
//INÍCIO - SCRIPT DE UPLOAD

$fotoUp = false;
$nomenovo = null;

if (!empty($_FILES['arquivo']['name'])) {
    $arquivo = $_FILES['arquivo'];
    $nome = $_FILES['arquivo']['name'];
    $extensao = explode(".", $nome);
    $extensao = $extensao[count($extensao) - 1];

    $nomenovo = date("Y.m.d.H.i.s") . "." . $extensao;

    if (!move_uploaded_file($_FILES['arquivo']['tmp_name'], $destino . $nomenovo)) {
        $nomenovo = 'semfoto.png';
    }
}

if ($_GET['acao'] == 1) {
    $query = "INSERT INTO local (localDescricao, tipoLocalId) VALUES ('{$_POST['nomeLocal']}', {$_POST['tipoLocal']});";
} else {
    $query = "UPDATE local set localDescricao='{$_POST['nomeLocal']}', tipoLocalID='{$_POST['tipoLocal']}' where id={$_POST['id']} ";
}

$resultado = insere($conexao, $query);

if ($resultado) {
    echo "Salvo com sucesso <br>";
    echo "Local: " . $_POST['nomeLocal'];
} else
    echo "Erro ao cadastrar";
desconecta($conexao);
?>