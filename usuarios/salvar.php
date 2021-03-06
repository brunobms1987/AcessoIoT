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

//FIM - SCRIPT DE UPLOAD
//INÍCIO - SCRIPT DA SENHA (VERIFICA SE É GERAÇÃO AUTOMÁTICA OU FOI PASSADA

$senha = "";
if (isset($_POST['gerador']) && !empty($_POST['gerador'])) {
    $simbolos = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $senha[0] = $simbolos[rand(0, strlen($simbolos) - 1)];
    $senha[1] = $simbolos[rand(0, strlen($simbolos) - 1)];
    $senha[2] = $simbolos[rand(0, strlen($simbolos) - 1)];
    $senha[3] = $simbolos[rand(0, strlen($simbolos) - 1)];
    $senha[4] = $simbolos[rand(0, strlen($simbolos) - 1)];
    $senha = implode($senha);
} else {
    $senha = $_POST['senha'];
}

//FIM - SCRIPT DA SENHA (VERIFICA SE É GERAÇÃO AUTOMÁTICA OU FOI PASSADA
//INÍCIO - SCRIPT DE INSERÇÃO NO BANCO
//SE A ACAO PASSADA POR GET( NOS FORMULÁRIOS ) FOR 1, É CADASTRO NOVO, SENÃO É EDIÇÃO
if ($_GET['acao'] == 1) {
    $query = "INSERT INTO pessoa (pessoaNome, pessoaCPF, pessoaNascimento, pessoaTelefone, pessoaCelular, pessoaRFID, pessoaLogin, pessoaSenha, pessoaEmail, tipousuario_id)  "
            . "VALUES ('{$_POST['nome']}', '{$_POST['cpf']}', '{$_POST['datanasc']}', '{$_POST['telefone']}', '{$_POST['celular']}', '{$_POST['cartaoRFID']}', '{$_POST['usuario']}', "
            . "'{$_POST['senha']}', '{$_POST['email']}', '{$_POST['tipo']}');";
} else {
    $query = "UPDATE pessoa set pessoaNome='{$_POST['nome']}', pessoaCPF='{$_POST['cpf']}', pessoaNascimento='{$_POST['datanasc']}', pessoaTelefone='{$_POST['telefone']}',  pessoaCelular='{$_POST['celular']}', "
            . " pessoaRFID='{$_POST['cartaoRFID']}', pessoaLogin='{$_POST['usuario']}', pessoaSenha=$senha, pessoaEmail='{$_POST['email']}', tipousuario_id='{$_POST['tipo']}' where id={$_POST['id']} ";
}

$resultado = insere($conexao, $query);

if ($resultado) {
    echo "Salvo com sucesso <br>";
    echo "Usuário: " . $_POST['usuario'] . " | Senha: " . $senha . "<br>";
} else
    echo "Erro ao cadastrar <br>";


//FIM - SCRIPT DE INSERÇÃO NO BANCO

desconecta($conexao);
?>