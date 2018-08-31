<?php
    session_start();   

    include '../controlers/validaPost.php';
    include '../controlers/retiraCaracterEspecial.php';

    $email = validaPost('email');
    $_SESSION['email'] = retiraCaracterEspecial($email);
?>

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
                <form class="form-horizontal" method="post" action="../controlers/atualizaSenhaPessoaFisica.php">
                    <div class="col-xs-12 col-sm-6 col-md-5">
                       <h1></h1>
                        <div class="form-group">
                            <label class="col-sm-2 control-label padding-top-7px">Nova senha</label>
                            <div class="col-sm-10">
                              <input type="text" name="senha" class="form-control "required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label padding-top-7px">Confirme Nova senha</label>
                            <div class="col-sm-10">
                              <input type="text" name="nova_senha" class="form-control "required>
                            </div>
                        </div>                        
                        <div class="form-group">
                           <div class="col-xs-12 col-sm-12">
                            <?php  
                                    if(isset($_SESSION['erro']) && $_SESSION['erro'] <> "" ){                                          
                                        echo "<label class='col-xs-12 col-sm-12 padding-top-7px alert alert-warning'> ";
                                        echo $_SESSION['erro'];
                                        unset( $_SESSION['erro'] );  // irá remover os dados de 'erro' 
                                        echo "</label> ";
                                        //$_SESSION['erro'] = ""; // Definindo valor, para não dar erro de existencia de sessions
                                    } else{ 
                                        echo $_SESSION['erro'] = "";
                                    }               
                                ?>                   
                            </div>
                            <div class="col-xs-12 col-sm-12">
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
