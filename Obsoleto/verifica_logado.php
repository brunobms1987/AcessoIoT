<?php
$nome = "";
session_start();

if (!isset($_SESSION['nomeLogado']) and ! isset($_SESSION['senhaLogado'])) {
    session_destroy();
    header("Location:login.php");
} else {
    $nome = $_SESSION['nomeLogado'];
}
?>