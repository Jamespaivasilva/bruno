
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
                <h1 style="text-align: center;margin-bottom: 30px;">Contate-nos</h1>
            </div>
            <div class="row">
               <hr class="margin-botton-30px">
                <div class="col-sm-2 col-md-3"></div>
                <div class="col-sm-8 col-md-5">
                    <form class="form-horizontal" method="post" action="../controlers/ajuda-contato.php">
                        <div class="form-group">
                            <label class="col-sm-4 control-label padding-top-7px">Nome</label>
                            <div class="col-sm-8">
                              <input type="text" name="nome" class="form-control "required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label padding-top-7px">Email</label>
                            <div class="col-sm-8">
                              <input type="email" name="email" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label padding-top-7px">Motivo do Contato</label>
                            <div class="col-sm-8">
                              <input type="text" name="motivoContato" class="form-control "required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label padding-top-7px">Descrição do Assunto</label>
                            <div class="col-sm-8">
                                <textarea type="text" name="descricaoAssunto" class="form-control" rows="5" required></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-8 control-label padding-top-7px">
                            <?php 
                                include "../controlers/ajuda-contato.php";                                

                                if(isset($_GET['text'])){
                                    $texto = $_GET['text'];
                                    if($texto = "1"){
                                        echo "Enviado com sucesso!";
                                    }
                                }                                
                            ?>
                            </label>
                        </div>
                        
                        <div class="col-xs-12 col-sm-12 margin-botton-30px">
                              <a href="../../../index.php"><button type="button" class="pull-right btn btn-cadastro botao-topo-cadastro" style="margin-right: -14px;">Cancelar</button></a>
                              <button type="submit" name="btn" class="pull-right btn btn-cadastro botao-topo-cadastro">Enviar</button>
                        </div>
                    </form>
                </div>
                <div class="col-sm-2 col-md-3"></div>
            </div>
        </div>
            
        <footer class="container-fluid div-footer">
            <?php include "inc/footer.php"?>
        </footer>
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/bootstrap.js"></script>
    </body>
</html>
