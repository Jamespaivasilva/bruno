<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/estilo.css">

        <title> Acesso Negado - Search Food</title>
    </head>
    <body>
       <?php include "inc/barra-topo.php" ?>
        <div class="container main margin-bottom-170px">
            <header>
                <?php include "inc/header.php" ?>
            </header>
            <div class="alert alert-warning ">
                  Email ou senha inválida
            </div>
            <div style="margin-top: 50px;margin-bottom: 57px;padding-bottom: 5px;">
                <a href="login.php"><button class="btn btn-cadastro">Voltar</button></a>
            </div>
        </div>

        <footer class="container-fluid div-footer">
            <?php include "inc/footer.php"?>
        </footer>
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/bootstrap.js"></script>
    </body>
</html>
