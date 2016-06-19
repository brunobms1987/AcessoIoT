<div class="container">
    <div class="row">


        <table class="table">
            <tbody><tr  style="background-color:#6495ED;">
                    <th>Código</th>
                    <th>Data de Acesso</th>
                    <th>Nome da Pessoa</th>
                    <th>Local</th>                   
                    <th>Cartão RFID</th>
                    <th>Status</th>
                </tr>

                <?php
                $conexao = conecta();
                include_once './verifica_logado.php';
                $tipoUser = $_SESSION['tipoLogado'];
                $id = $_SESSION['idLogado'];
                if ($tipoUser == 1)
                    $resultado = busca($conexao, "SELECT * from logacesso");

                $total = mysqli_num_rows($resultado);
                $qtdPorPagina = 20;

                //quantidade de páginas
                $paginas = ceil($total / $qtdPorPagina);

                //definindo a página inicial
                $pagAtual = isset($_GET['list']) ? $_GET['list'] : 1;
                $inicio = ($qtdPorPagina * $pagAtual) - $qtdPorPagina;

                $i = 0;
                $cor1 = "#D3D3D3;";
                $cor2 = "#BEBEBE;";
                while ($linha = mysqli_fetch_array($resultado)) {
                    ?> 
                    <tr style="background-color:<?= $i % 2 == 0 ? $cor1 : $cor2; ?>">
                        <td><?= $linha['id']; ?></td>
                        <td><?= date('d/m/Y H:m:s', strtotime($linha['data_acesso'])); ?></td>
                        <td><?= $linha['pessoa']; ?></td>
                        <td><?= $linha['local']; ?></td>
                        <td><?= $linha['tag']; ?></td>
                        <td><?= $linha['situacao']; ?></td>
                    </tr>
                    <?php
                    $i++;
                }
                desconecta($conexao);
                ?>
            </tbody>

        </table>
        <?php
        echo "<a href='index.php?pag=14&list=1'>Primeira</a> ";
        if ($pagAtual > 1)
            echo " <a href='index.php?pag=14&list=" . ($pagAtual - 1) . "'>Anterior</a> ";


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
            echo " <a href='index.php?pag=14&list=" . ($pagAtual + 1) . "'>Próxima</a> ";
        echo " <a href='index.php?pag=14&list=$paginas'>Última</a> ";
        ?>
    </div>
</div>

<script>
    function direcionar() {
        var x = document.getElementById("selecao_lista").selectedIndex + 1;
        window.location = "index.php?pag=14&list=" + x;
    }
</script>