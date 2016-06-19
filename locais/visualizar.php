<!--REFERENTE AO CADASTRO DE LOCAIS-->
<?php
if (!isset($_GET['id'])) {
    //caso não seja passado o id para buscar o usuário no banco, redireciona para a página de listagem.
    header("Location: index.php?pag=9");
}
$conexao = conecta();
$resultado = busca($conexao, "SELECT local.id, local.localDescricao, local.tipoLocalId, local.localUser01, local.localUser02, tipoLocal.tipoLocalDescricao from local inner join tipoLocal on local.tipoLocalID = tipoLocal.id where local.id={$_GET['id']}");

$local = mysqli_fetch_array($resultado);
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
                                <th>Nome do Local</th>
                                <th>Tipo do Local</th>
                                <th>Usuário 01</th>                   
                                <th>Usuário 02</th> 
                            </tr>

                            <tr>
                                <td><?= $local['id']; ?></td>
                                <td><?= $local['localDescricao']; ?></td>
                                <td><?= $local['tipoLocalDescricao']; ?></td>
                                <td><?= $local['localUser01']; ?></td>
                                <td><?= $local['localUser02']; ?></td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>   

        </div>
    </div>
</div>
<?=
"";
if ($_SESSION['idLogado'] == $local['localUser01'] || $_SESSION['idLogado'] == $local['localUser02']) {
    ?>
    <div class="row" style="margin-top: 10px">
        <div class="col-md-12">
            <button id="abrirLocal" onclick="abrirLocal()" class="btn btn-success"> Abrir Local </button>
        </div>
    </div>
    <?=
    "";
};
?>
<script>
    function abrirLocal(divName) {
        var divImpressao = document.getElementById('div_impressao');
        var janela = window.open('', '_blank', 'width=500px');
        janela.document.open();
        janela.document.write('<html><body onload="window.print()">' + divImpressao.innerHTML + '</html>');
        janela.document.close();

    }
</script>