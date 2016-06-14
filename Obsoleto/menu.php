<?php
//require './verifica_logado.php';
$nome_usuario = $_COOKIE['nome_usuario'];
?>
<img src="arquivos/images/logo.png" alt="" width="200"/><br>
<?= $nome_usuario ?> - <a href="funcoes.php?sair=1">Sair</a><br>
<a href="listar.php">Usuários</a><br> <!--Incluir verificação se é admin-->
<a href="index.php">Notícias</a><br>
<br>
<br>
