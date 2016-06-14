
<?php
$id = $_GET['id'];

$conexao = conecta();

$resultado = busca($conexao, "select * from usuario where id= $id");

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
                    <label for="nome">Nome completo</label>
                    <input type="text" class="form-control" id="nome" name="nome" required="" value="<?= $registro['nome'] ?>">
                </div>
                <div class="col-md-4">
                    <label for="usuario">Usuário</label>
                    <input type="text" class="form-control" id="usuario" name="usuario" required="" value="<?= $registro['usuario'] ?>">
                </div>
            </div>   

            <div class="row">
                <div class="col-md-4" >
                    <label for="datanasc">Data de nasc</label>
                    <input type="date"  class="form-control" id="datanasc" name="datanasc" required="" value="<?= $registro['dataNasc'] ?>">
                </div> 
            </div>   
            <div class="row">
                <div class="col-md-4" >
                    <label for="email">Email</label>
                    <input type="email"  class="form-control" id="email" name="email" required="" value="<?= $registro['email'] ?>">    
                </div> 
            </div>   

            <div class="row">

                <div class="col-md-3" >
                    <label for="senha">Senha</label>
                    <input type="password"  class="form-control"  id="senha" name="senha" required="" value="<?= $registro['senha'] ?>">
                </div>               
                <div class="col-md-4 " > 
                    <div class="checkbox">

                        <label for="gerador" >
                            <input type="checkbox" id="gerador" name="gerador" > Gerar automaticamente
                        </label>
                    </div>

                </div>               

            </div>   
            <div class="row">
                <div class="col-md-12">
                    <label for="tipo">Tipo de usuário</label> <br>
                    <label>  <input type="radio"  id="tipo" name="tipo"  value="1" <?= $registro['tipo'] == 1 ? "checked" : "" ?>> Administrador </label>
                    <label>   <input type="radio"  id="tipo" name="tipo" value="2" <?= $registro['tipo'] == 2 ? "checked" : "" ?>>  Comum </label>
                </div>                
            </div>   
            <div class="row">
                <div class="col-md-8">

                    <label for="descricao">Descrição</label>
                    <textarea id="descricao" class="form-control" name="descricao">
                        <?= $registro['descricao'] ?>
                    </textarea>   
                </div>                
            </div>   
            <br>
            <div class="row">
                <div class="col-md-5">
                    <img src="./uploads/<?= $registro['foto'] ?>"/>
                    <input type="hidden" id="fotoantiga" name="fotoantiga" value="<?= $registro['foto'] ?>">
                </div>
                <div class="col-md-7">
                    <label for="arquivo">Arquivo</label>
                    <input type="file"  id="arquivo" name="arquivo" >    
                </div>                
            </div>  
    </div>
</div>
<br>
<br>
<a href="index.php" class="btn btn-danger"> Cancelar e Voltar </a>
<input type="submit"  class="btn btn-success" value="Cadastrar">

</form>
