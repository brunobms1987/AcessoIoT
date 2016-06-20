<!--REFERENTE AO CADASTRO DE LOCAIS-->
<?php
$id = $_GET['id'];
$conexao = conecta();
$resultado = busca($conexao, "select * from local where id= $id");
$registro = mysqli_fetch_array($resultado);
?>

<script>
    $(document).ready(function () {
        $("#gerador").change(function () {
            if ($(this).is(":checked")) {
                $("#senha").prop("disabled", true);
                $("#senha").prop("required", false);
            }
            else {
                $("#senha").prop("disabled", false);
                $("#senha").prop("required", true);
            }
        });
    });
</script>
<div class="container-fluid">
    <div class="container">
        <form action="index.php?pag=11&acao=2" method="POST"  enctype="multipart/form-data">
            <input type="hidden" id="id" name="id" value="<?= $registro['id'] ?>">
            <div class="row">
                <div class="col-md-4">
                    <label for="nomeLocal">Nome do Local</label>
                    <input type="text" class="form-control" id="nome" name="nomeLocal" value="<?= $registro['localDescricao'] ?>" required="">
                </div>
            </div>   
            <div class="row">
                <div class="col-md-4">
                    <select class="form-control" name="tipoLocal" value="<?= $registro['tipoLocalId'] ?>">
                        <option value="1">Laboratório</option>
                        <option value="2">Sala de Aula</option>
                    </select>
                </div>
                <!--</div>   
                <div class="row">
                    <div class="col-md-4">
                        <label for="user01">Usuário Liberado 01</label>
                        <input type="text" class="form-control" id="nome" name="user01" value="<?= $resLiberaUser['pessoa_id'] ?>" required="">
                    </div>
                </div> 
                <div class="row">
                    <div class="col-md-4">
                        <label for="user02">Usuário Liberado 02</label>
                        <input type="text" class="form-control" id="nome" name="user02" value="<?= $resLiberaUser['pessoa_id'] ?>"required="">
                    </div>
                </div> -->
            </div>
    </div>
    <br>
    <br>
    <a href="index.php?pag=9" class="btn btn-danger"> Cancelar e Voltar </a>
    <input type="submit"  class="btn btn-success" value="Salvar">

    </form>
