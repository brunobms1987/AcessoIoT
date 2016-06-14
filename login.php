<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/login.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12" >     
                    <div class="account-wall">                       
                        <form class="form-signin" method="post" action="verifica.php">
                            <img src="img/logo.png" width="290"><br><br>
                            <input type="text" name="usuario" class="form-control" placeholder="Usuário" autofocus>
                            <input type="password" name="senha" class="form-control" placeholder="Senha" >
                            <button class="btn btn-lg btn-primary btn-block" type="submit">Enviar</button>
                            <br>
                            <?php
                            $erro_login = isset($_GET['erro']) ? $_GET['erro'] : 0;
                            if ($erro_login == 1) {
                                echo "Favor verificar informações de usuário e senha.";
                            }
                            ?>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
