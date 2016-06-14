<?php
include_once './config/conexao.php';
include_once './verifica_logado.php';
include_once './paginacao.php';

$pagComum = array(4,7,8);

if ($tipoUser == 2 && !in_array($pagina, $pagComum)){
    header("Location:index.php?pag=4");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/bootstrap.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script>
            function confirmar(id) {
                var r = confirm("Tem certeza que deseja apagar este registro?");
                if (r == true) {
                    window.location.href = "index.php?id=" + id;
                }
            }
        </script>
        <style>
            @media print {
                body * {
                    visibility: hidden;
                }
                #div_impressao, #div_impressao * {
                    visibility: visible;
                }
                #div_impressao-to-print {
                    position: absolute;
                    left: 0;
                    top: 0;
                }
            }
        </style>
        <title></title>
    </head>
    <body>
        <div class="container">
            <header>
                <?php include './header.php'; ?>
            </header>
            <article>
                <div class="jumbotron">
                    <?php include $url; ?>
                </div>
                <!-- fim jumbottom -->
            </article>

            <footer>

            </footer>


        </div> <!-- fim container -->

    </body>
</html>
