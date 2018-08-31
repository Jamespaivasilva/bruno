<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/estilo.css">
        <title>Redefinição de senha - Search Food </title>

    </head>
    <body>
       <?php include "inc/barra-topo.php" ?>
        <div class="container main">
           <div class="row">
            <header>
                <?php include "inc/header.php" ?>
            </header>
            </div>
            
            <div class="row">
               <h1>Redefinir Senha</h1>
                <form class="form-horizontal" method="post" action="">
                    <div class="col-xs-12 col-sm-6 col-md-5">
                        <div class="form-group">
                            <label class="col-sm-4 control-label padding-top-7px">Nova Senha</label>
                            <div class="col-sm-8">
                              <input type="password" name="novaSenha" class="form-control"required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label padding-top-7px">Confirmação da Senha</label>
                            <div class="col-sm-8">
                              <input type="password" name="novaSenha" class="form-control"required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12 col-sm-12">
                              <button type="submit" class="pull-right btn btn-cadastro botao-topo-cadastro">Enviar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <footer class="container-fluid div-footer">
            <?php include "inc/footer.php"?>
        </footer>
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/bootstrap.js"></script>
    </body>
</html>
