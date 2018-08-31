<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/estilo.css">

        <title> Sucesso! </title>
    </head>
    <body>
       <div class="container-fluid barra-topo">
          <div class="div-botao-topo">
           <button class="pull-right btn btn-info">Login</button>
           <button class="pull-right btn btn-info botao-topo-cadastro">Cadastrar</button>
          </div>
       </div>
        <div class="container main">
            <header>
                <?php include "inc/header.php" ?>
            </header>
            <div class="alert alert-warning">
                  Reserva feita com sucesso!
            </div>
            <div style="margin-top: 50px;margin-bottom: 57px;padding-bottom: 5px;">
                <a href="login.php"><button class="btn btn-cadastro">Ir ao Login</button></a>
                <a href="../index.php"><button class="btn btn-cadastro">Inicio</button></a>
            </div>
        </div>

        <footer class="container-fluid div-footer">
            <?php include "inc/footer.php"?>
        </footer>
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/bootstrap.js"></script>
    </body>
</html>
