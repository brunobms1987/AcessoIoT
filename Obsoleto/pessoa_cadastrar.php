<?php
require './verifica_logado.php';
include './menu.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form class="form-horizontal" method="post" action="salvar.php?acao=1" enctype="multipart/form-data">
            <div class="form-group">
                <label for="note3" class="col-sm-2 control-label">Nome</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nome" id="note3" placeholder="Nome" required>
                </div>
            </div>

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">E-Mail</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" name="email" id="inputEmail3" placeholder="example@example.com" required>
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Senha</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="senha" id="inputPassword3" placeholder="Password" required>
                </div>
            </div>
            <div class="form-group">
                <label for="dataNascimento" class="col-sm-2 control-label">Data de Nascimento</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name="nascimento" id="inputPassword3" required>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <div class="radio">
                        <label>
                            Tipo de Usuário:<br>
                            <input type="radio" name="tipo" value="1"> Administrador
                            <input type="radio" name="tipo" value="2" checked="checked"> Autor
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Descrição</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="descricao" rows="5" cols="40" required></textarea>
                </div>
            </div>
            <br>Foto:<br>
            <input type="file" name="arquivos" required><br>
            <br>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10" required>
                    <button type="submit" class="btn btn-default">Cadastrar</button>
                </div>
            </div>
        </form>
    </body>
</html>
