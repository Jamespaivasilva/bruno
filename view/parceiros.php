<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/estilo.css">
        <title> </title>

    </head>
    <body>
       <?php include "inc/barra-topo.php" ?>
        <div class="container main margin-bottom-170px">
           <div class="row">
            <header>
                <?php include "inc/header.php" ?>
            </header>
            </div>
            
            <div class="row">
                <h1 style="text-align: center;" class="margin-botton-30px">Parceiros</h1>
                    <!-- <?php include "../controlers/retornaParceiros.php" ?> -->

                <div class="col-sm-4 col-md-3 margin-botton-50px" style="text-align: center;">
                    <div>
                        <div class="display-in">
                            <img src="empresas/sushi_isao.jpg" width="261" height="150" class="img-responsive">
                        </div>
                        <p><a href="perfil-estabelecimento.php?id=1" class="link-opcoes-usuario">Sushi Isao</a></p>
                    </div>
                </div>
                <div class="col-sm-4 col-md-3 margin-botton-50px" style="text-align: center;">
                    <div>
                        <div class="display-in">
                            <img src="empresas/serra_restaurante.jpg" width="261" height="150" class="img-responsive">
                        </div>
                        <p><a href="perfil-estabelecimento.php?id=11" class="link-opcoes-usuario">SERRAO</a></p>
                    </div>
                </div>
                <div class="col-sm-4 col-md-3 margin-botton-50px" style="text-align: center;">
                    <div>
                        <div class="display-in">
                            <img src="empresas/maxresdefault.jpg" width="261" height="150" class="img-responsive">
                        </div>
                        <p><a href="perfil-estabelecimento.php?id=3" class="link-opcoes-usuario">Alemão</a></p>
                    </div>
                </div>

            </div>
        </div>   
        <footer class="container-fluid div-footer">
            <?php include "inc/footer.php"?>
        </footer>
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/bootstrap.js"></script>
    </body>
</html>
