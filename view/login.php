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
                <form class="form-horizontal" method="post" action="../model/valida_login.php">
                    <div class="col-xs-12 col-sm-6 col-md-5">
                       <h1>Usuário</h1>
                        <div class="form-group">
                            <label class="col-sm-2 control-label padding-top-7px">Login</label>
                            <div class="col-sm-10">
                              <input type="email" name="email" class="form-control "required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label padding-top-7px">Senha</label>
                            <div class="col-sm-10">
                              <input type="password" name="senha" class="form-control"required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-8 col-sm-8 control-label padding-top-7px"><a href="recupera-senha-pessoa-fisica.php" class="link-recuperar-senha">Recuperar senha</a></label>
                            <div class="col-xs-4 col-sm-4">
                              <button type="submit" class="pull-right btn btn-cadastro botao-topo-cadastro">Logar</button>
                            </div>
                        </div>
                    </div>
                </form>
                <form class="form-horizontal" method="post" action="../model/valida_login_pessoa_juridica.php">   
                    <div class="col-xs-12 col-sm-6 col-md-5 col-md-offset-2">
                       <h1>Empresa</h1>
                        <div class="form-group">
                            <label class="col-sm-2 control-label padding-top-7px">Login</label>
                            <div class="col-sm-10">
                              <input type="email" name = "email"class="form-control "required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label padding-top-7px">Senha</label>
                            <div class="col-sm-10">
                              <input type="password" name="senha" class="form-control"required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-8 col-sm-8 control-label padding-top-7px "><a href="#" class="link-recuperar-senha">Recuperar senha</a></label>
                            <div class="col-xs-4 col-sm-4">
                              <button type="submit" class="pull-right btn btn-cadastro botao-topo-cadastro">Logar</button>
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
