<?php

include './config/conexao.php';
$conexao = conecta();
$query = "select * from pessoa where pessoaLogin ='{$_POST['usuario']}' and pessoaSenha='{$_POST['senha']}'";
$resultado = mysqli_query($conexao, $query);
if (mysqli_num_rows($resultado) > 0) {
    $linha = mysqli_fetch_array($resultado);
    session_start();

    $_SESSION['loginLogado'] = $linha['pessoaLogin'];
    $_SESSION['idLogado'] = $linha['id'];
    $_SESSION['tipoLogado'] = $linha['tipoUsuario_id'];
    $_SESSION['senhaLogado'] = $linha['pessoaSenha'];
    $_SESSION['nomeLogado'] = $linha['pessoaNome'];
    $_SESSION['rfidLogado'] = $linha['pessoaRFID'];
    desconecta($conexao);
    header('Location:index.php?pag=4');
} else {
    desconecta($conexao);
    header('Location:login.php?erro=1');
}
?>