<div class="container">
    <div class="row">
        <table class="table">
            <tbody><tr  style="background-color:#6495ED;">
                    <th>Código</th>
                    <th>Nome do Local</th>
                    <th>Tipo Local</th>                   
                </tr>

                <?php
                $conexao = conecta();
                include_once './verifica_logado.php';
                $tipoUser = $_SESSION['tipoLogado'];
                $id = $_SESSION['idLogado'];
                if ($tipoUser == 1) {
                    $resultado = busca($conexao, "SELECT id, pessoaNome, pessoaLogin, tipoUsuario_id from pessoa");
                } else if ($tipoUser != 1) {
                    $resultado = busca($conexao, "SELECT id, pessoaNome, pessoaLogin, tipoUsuario_id from pessoa where id=$id");
                }

                //sou usuário comum??
                // $resultado = busca($conexao, "SELECT id,nome, tipo from usuario where id=id de quem ta logado");
                //para paginação

                $total = mysqli_num_rows($resultado);
                $qtdPorPagina = 10;

                //quantidade de páginas
                $paginas = ceil($total / $qtdPorPagina);

                //definindo a página inicial
                $pagAtual = isset($_GET['list']) ? $_GET['list'] : 1;
                $inicio = ($qtdPorPagina * $pagAtual) - $qtdPorPagina;

                //$query = "select * from usuario limit $inicio, $qtdPorPagina";
                //$resultado = busca($conexao, $query);

                $i = 0;
                $cor1 = "#D3D3D3;";
                $cor2 = "#BEBEBE;";
                while ($linha = mysqli_fetch_array($resultado)) {
                    ?> 
                    <tr style="background-color:<?= $i % 2 == 0 ? $cor1 : $cor2; ?>">
                        <td><?= $linha['id']; ?></td>
                        <td><?= $linha['localNome']; ?></td>
                        <td><?= $linha['tipoLocal_id']; ?></td>
                        <td>
                            <?= $linha['tipoUsuario_id'] == 1 ? "Administrador" : "Usuário"; ?>
                        </td>

                        <td>
                            <a  href="index.php?pag=7&id=<?= $linha['id']; ?>" title="Visualizar <?= $linha['pessoaNome']; ?>">Visualizar</a> |

                            <a  href="index.php?pag=8&id=<?= $linha['id']; ?>" title="Editar <?= $linha['pessoaNome']; ?>">Editar</a> | 
                            <a  href="usuarios/apagar.php?id=<?= $linha['id']; ?>" title="Apagar <?= $linha['pessoaNome']; ?>">Apagar</a>

                        </td>
                    </tr>

                    <?php
                    $i++;
                }
                desconecta($conexao);
                ?>
            </tbody>

        </table>
        <?php
        echo "<a href='index.php?pag=4&list=1'>Primeira</a> ";
        if ($pagAtual > 1)
            echo " <a href='index.php?pag=4&list=" . ($pagAtual - 1) . "'>Anterior</a> ";


        $select = " <select name='selecao_lista' id='selecao_lista' onchange=\"direcionar()\">";

        for ($x = 1; $x <= $paginas; $x++) {
            if ($x != $pagAtual)
                $select .="<option value='$x'>$x</option>";
            else
                $select .="<option value='$x' selected >$x</option>";
        }

        $select .="</select>";

        echo "Ir para página " . $select;

        if ($pagAtual + 1 <= $paginas)
            echo " <a href='index.php?pag=4&list=" . ($pagAtual + 1) . "'>Próxima</a> ";

        echo " <a href='index.php?pag=4&list=$paginas'>Última</a> ";

        if ($tipoUser == 1)
            echo " <a href='index.php?pag=5'><br>Cadastrar Novo Usuário</a> ";
        ?>
    </div>
</div>

<script>
    function direcionar() {
        var x = document.getElementById("selecao_lista").selectedIndex + 1;
        window.location = "index.php?pag=4&list=" + x;
    }
</script>