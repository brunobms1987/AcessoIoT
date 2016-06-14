<?php

include './conexao.php';
$conexao = conecta();
$query = "select * from pessoa where pessoaLogin='{$_POST['nome']}' and pessoaSenha='{$_POST['senha']}'";
echo $query;
$resultado = mysqli_query($conexao, $query);
if (mysqli_num_rows($resultado) > 0) {
    $linha = mysqli_fetch_array($resultado);
    session_start();

    $_SESSION['loginLogado'] = $linha['pessoaLogin'];
    $_SESSION['senhaLogado'] = $linha['pessoaSenha'];
    $_SESSION['nomeLogado'] = $linha['pessoaNome'];

    desconecta($conexao);
    header('Location:index.php');
} else {
    desconecta($conexao);
    header('Location:login.php');
}
?>