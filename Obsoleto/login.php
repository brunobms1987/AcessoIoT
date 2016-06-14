<html>
    <head>
        <meta charset="UTF-8">
        <title>LOGIN - Selectus Web System</title>
    </head>
    <body>
        <img src="arquivos/images/logo.png" alt="Logo" width="200"/>
        <br>
        <br>
        <form name="formulario" method="POST" action="verifica.php">
            Nome: <input type="text" name="nome" required/>        
            Senha: <input type="password" name="senha" required/>
            <br><br>
            <input type="submit" name="Enviar" value="Entrar no Sistema" required/>
        </form>
        <?php
        $erro_login = isset($_GET['erro']) ? $_GET['erro'] : 0;
            if ($erro_login == 1){
                echo "Favor verificar informações de usuário e senha.";
            }
        ?>
        <br>
        <br>
    </body>
</html>