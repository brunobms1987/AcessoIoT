<?php

$banco = "acessoiot";
$usuario = "root";
$senha = "";
$host = "localhost";

function conecta() {
    global $banco, $host, $usuario, $senha;
    try {
        $conexao = mysqli_connect($host, $usuario, $senha, $banco);
        return $conexao;
    } catch (Exception $e) {
        return NULL;
    }
}

function busca($conexao, $query) {
    try {
        mysqli_set_charset($conexao, "utf8");
        return mysqli_query($conexao, $query);
    } catch (Exception $e) {
        desconecta($conexao);
        return NULL;
    }
}

function exclui($conexao, $query) {
    try {
        return mysqli_query($conexao, $query);
    } catch (Exception $e) {
        desconecta($conexao);
        return NULL;
    }
}

function insere($conexao, $query) {
    try {
        mysqli_set_charset($conexao, "utf8");
        if (mysqli_query($conexao, $query))
            return true;
        else
            return false;
        //  echo  mysqli_insert_id ($conexao); //retorna ultimo id
    } catch (Exception $e) {
        return false;
    }
}

function insereERetornaId($conexao, $query) {

    try {
        mysqli_query($conexao, $query);
        return mysqli_insert_id($conexao);
    } catch (Exception $e) {
        return NULL;
    }
}

function desconecta($conexao) {
    mysqli_close($conexao);
}
?>


