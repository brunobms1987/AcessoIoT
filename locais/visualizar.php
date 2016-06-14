
<?php
if (!isset($_GET['id'])) {
    //caso não seja passado o id para buscar o usuário no banco, redireciona para a página de listagem.
    header("Location: index.php?pag=4");
}
$conexao = conecta();
$resultado = busca($conexao, "SELECT * from pessoa where id={$_GET['id']}");
$usuario = mysqli_fetch_array($resultado);
?> 
<style>
    th {
        text-align: center;
    }
    td {
        text-align: center;
    }
</style>
<div id="div_impressao">


    <div class="container-fluid">
        <div  class="container" >
            <div class="row">
                <div class="col-md-12" >
                    <table class="table">
                        <tbody><tr  style="background-color:#6495ED;">
                                <th>Código</th>
                                <th>Usuário</th>
                                <th>Nome</th>
                                <th>Email</th>                   
                                <th>Data de Nascimento</th>
                                <th>Tipo Usuário</th>
                            </tr>

                            <tr>
                                <td><?= $usuario['id']; ?></td>
                                <td><?= $usuario['pessoaLogin']; ?></td>
                                <td><?= $usuario['pessoaNome']; ?></td>
                                <td><?= $usuario['pessoaEmail']; ?></td>
                                <td><?= date('d/m/Y', strtotime($usuario['pessoaNascimento'])); ?></td>
                                <td><?= $usuario['tipoUsuario_id'] == 1 ? "Administrador" : "Usuário"; ?></td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>   

        </div>
    </div>
</div>
<script>
    function imprimir(divName) {
        var divImpressao = document.getElementById('div_impressao');
        var janela = window.open('', '_blank', 'width=500px');
        janela.document.open();
        janela.document.write('<html><body onload="window.print()">' + divImpressao.innerHTML + '</html>');
        janela.document.close();

    }
</script>