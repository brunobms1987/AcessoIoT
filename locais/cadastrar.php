<!--REFERENTE AO CADASTRO DE LOCAIS-->
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
        <form action="index.php?pag=11&acao=1" method="POST"  enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-4">
                    <label for="nomeLocal">Nome do Local</label>
                    <input type="text" class="form-control" id="nome" name="nomeLocal" required="">
                </div>
            </div>   
            <div class="row">
                <div class="col-md-4">
                    <select class="form-control" name="tipoLocal">
                        <option value="1">Laboratório</option>
                        <option value="2">Sala de Aula</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="user01">Usuário Liberado 01</label>
                    <input type="text" class="form-control" id="nome" name="user01" required="">
                </div>
            </div> 
            <div class="row">
                <div class="col-md-4">
                    <label for="user02">Usuário Liberado 02</label>
                    <input type="text" class="form-control" id="nome" name="user02" required="">
                </div>
            </div> 
    </div>
</div>
<br>
<br>
<a href="index.php?pag=9" class="btn btn-danger"> Cancelar e Voltar </a>
<input type="submit"  class="btn btn-success" value="Cadastrar">

</form>
