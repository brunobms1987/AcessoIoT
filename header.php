<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <img src="img/logo.png" width="200">
                </div>
                <div class="col-md-4" >

                </div>
                <div class="col-md-4" >
                    <div class="row">                       
                        <div class="col-md-12">
                            Bem vindo <b><?php echo $_SESSION['nomeLogado'] ?></b>
                        </div>

                    </div>   
                    <div class="row">                       
                        <div class="col-md-12">                               
                            <a href="index.php?pag=4"> Usuários  </a> - <a href="index.php?pag=9"> Locais </a> 
                            <?= "";
                            if ($_SESSION['tipoLogado'] == 1)
                                echo " - <a href='index.php?pag=14'>Logs</a> "
                                ?>
                            - <a href="logout.php"> Logoff</a>
                        </div>

                    </div>   
                </div>

            </div>   
        </div>
    </div>
</nav>