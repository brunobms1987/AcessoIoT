
<?php
$id = $_GET['id'];

$conexao = conecta();

$resultado = busca($conexao, "select * from pessoa where id= $id");

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
        <form action="index.php?pag=6&acao=2" method="POST"  enctype="multipart/form-data">
            <input type="hidden" id="id" name="id" value="<?= $registro['id'] ?>">
            <div class="row">
                <div class="col-md-4">
                    <label for="nome">Nome Completo</label>
                    <input type="text" class="form-control" id="nome" name="nome" required="" value="<?= $registro['pessoaNome'] ?>">
                </div>
            </div>   
            <div class="row">
                <div class="col-md-4">
                    <label for="usuario">CPF</label>
                    <input type="text" class="form-control" id="usuario" name="cpf" required="" value="<?= $registro['pessoaCPF'] ?>">
                </div>
            </div>   
            <div class="row">
                <div class="col-md-4" >
                    <label for="datanasc">Data de Nascimento</label>
                    <input type="date"  class="form-control" id="datanasc" name="datanasc" required="" value="<?= $registro['pessoaNascimento'] ?>">
                </div> 
            </div>   
            <div class="row">
                <div class="col-md-4" >
                    <label for="datanasc">Telefone</label>
                    <input type="text"  class="form-control" id="telefone" name="telefone" value="<?= $registro['pessoaTelefone'] ?>">
                </div> 
            </div>   
            <div class="row">
                <div class="col-md-4" >
                    <label for="datanasc">Celular</label>
                    <input type="text"  class="form-control" id="celular" name="celular" value="<?= $registro['pessoaCelular'] ?>">
                </div> 
            </div>   
            <div class="row">
                <div class="col-md-4" >
                    <label for="datanasc">Cartão RFID</label>
                    <input type="text"  class="form-control" id="cartaoRFID" name="cartaoRFID"  value="<?= $registro['pessoaRFID'] ?>">
                </div>  
            </div>   
            <div class="row">
                <div class="col-md-4" >
                    <label for="email">Email</label>
                    <input type="email"  class="form-control" id="email" name="email" required=""  value="<?= $registro['pessoaEmail'] ?>">    
                </div> 
            </div>   
            <div class="row">
                <div class="col-md-4">
                    <label for="usuario">Usuário</label>
                    <input type="text" class="form-control" id="usuario" name="usuario" required=""  value="<?= $registro['pessoaLogin'] ?>">
                </div>
            </div>   
            <div class="row">
                <div class="col-md-3" >
                    <label for="senha">Senha</label>
                    <input type="password"  class="form-control"  id="senha" name="senha" required="" value="<?= $registro['pessoaSenha'] ?>">
                </div>               
            </div>   
            <div class="row">
                <div class="col-md-12"><br>
                    <label for="tipo">Tipo de Usuário</label> <br>
                    <label>  <input type="radio"  id="tipo" name="tipo"  value="1" <?= $registro['tipoUsuario_id'] == 1 ? "checked" : "" ?>> Administrador </label>
                    <label>  <input type="radio"  id="tipo" name="tipo"  value="2" <?= $registro['tipoUsuario_id'] == 2 ? "checked" : "" ?>> Comum </label>
                </div>                
            </div>   
    </div>
</div>



<br>
<br>
<a href="index.php" class="btn btn-danger"> Cancelar e Voltar </a>
<input type="submit"  class="btn btn-success" value="Cadastrar">

</form>
