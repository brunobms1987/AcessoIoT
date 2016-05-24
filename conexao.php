<?php
$usuario = "root";
$base = "AcessoIoT";
$senha = "";
$servidor = "localhost";

/**
 * Função que conecta com o banco de dados.
 * @global $usuario => Indica o usuário do banco de dados.
 * @global $base => Indica a base de dados utilizada.
 * @global $senha => Indica a senha para acesso ao BD.
 * @global $servidor => Indica o servidor do banco de dados.
 * @return
 */
function conecta() {
    global $usuario, $base, $senha, $servidor;
    try {
        $conexao = mysqli_connect($servidor, $usuario, $senha, $base);
        return $conexao;
    } catch (Exception $e) {
        return NULL;
    }
}

function desconecta($conexao) {
    mysqli_close($conexao);
}

/**
 * Função que exibe os registro do banco de dados.
 * @param $conexao => Indica o objeto do estado da conexão.
 * @param $query => Indica a consulta do estado da conexão.
 * @return => Retorna o conjunto de registros do banco.
 */
function buscar($conexao, $query) {
    return mysqli_query($conexao, $query);
}

function inserir($conexao, $query) {
    if (mysqli_query($conexao, $query))
        return true;
    else
        return false;
}

function alterar($conexao, $query) {
    if (mysqli_query($conexao, $query))
        return true;
    else
        return false;
}

function excluir($conexao, $query) {
    if (mysqli_query($conexao, $query))
        return true;
    else
        return false;
}

?>