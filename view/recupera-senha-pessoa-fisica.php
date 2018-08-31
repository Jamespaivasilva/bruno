<?php
    session_start();
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
               <h1>Recuperação de Cadastro</h1>
                <form class="form-horizontal" method="post" action="redefinir-senha-pessoa-fisica.php">
                    <div class="col-xs-12 col-sm-6 col-md-5">
                       <h1></h1>
                        <div class="form-group">
                            <label class="col-sm-2 control-label padding-top-7px">Email</label>
                            <div class="col-sm-10">
                              <input type="text" name="email" class="form-control "required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label padding-top-7px">Data de nascimento</label>
                            <div class="col-sm-8">
                              <input type="date" class="form-control " name="dtNascimento" placeholder="exemplo@examplo.com" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label padding-top-7px">Pergunta</label>
                            <div class="col-sm-10">
                              <input type="text" name="pergunta" class="form-control"required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label padding-top-7px">Resposta</label>
                            <div class="col-sm-10">
                              <input type="text" name="resposta" class="form-control"required>
                            </div>
                        </div>
                        <div class="form-group"> 
                                <?php  
                                    if(isset($_SESSION['mensagem_erro']) && $_SESSION['mensagem_erro'] <> "" ){                                          
                                        echo "<label class='col-xs-12 col-sm-12 padding-top-7px alert alert-warning'> ";
                                        echo $_SESSION['mensagem_erro'];
                                        unset( $_SESSION['mensagem_erro'] );  // irá remover os dados de 'mensagem_erro' 
                                        echo "</label> ";
                                        //$_SESSION['mensagem_erro'] = ""; // Definindo valor, para não dar erro de existencia de sessions
                                    } else{ 
                                        echo $_SESSION['mensagem_erro'] = "";
                                    }               
                                ?>                                      
                            <div class="col-xs-12 col-sm-12">
                              <button type="submit" class="pull-right btn btn-cadastro botao-topo-cadastro">Enviar</button>
                              <a href="login.php"><button type="button" class="pull-right btn btn-cadastro botao-topo-cadastro">Cancelar</button></a>
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
