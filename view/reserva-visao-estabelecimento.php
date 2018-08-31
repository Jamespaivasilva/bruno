<?php
    include "../controlers/foto_empresa.php";
    $id = $_GET['id'];
    isset($_GET['cpf']) ? $cpf = $_GET['cpf'] : '';
    isset($_GET['reserva']) ? $reserva = $_GET['reserva'] : '';
 
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
            <div class="row margin-botton-50px">
                <h1>Reservas(Registradas)</h1>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <img src="<?php echo  fotoEmpresa($id);?>" class="img-responsive" style="width: 260px;">
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <h4>
                        <?php
                            include "../controlers/nome_empresa.php";
                            echo  nome_empresa($id);
                        ?>
                    </h4>
                    <p>
                      <?php
                            include "../controlers/endereco_empresa.php";
                            echo  endereco_empresa($id);
                        ?>
                    </p>
                    <div style="width: 100%" class="embed-responsive embed-responsive-16by9"><iframe  class="embed-responsive-item" width="100%" height="400" src="https://www.mapsdirections.info/en/custom-google-maps/map.php?width=100%&height=600&hl=ru&q=Rua%20galvao%20bueno+(Search%20Now)&ie=UTF8&t=&z=14&iwloc=A&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="https://www.mapsdirections.info/en/custom-google-maps/">Create a custom Google Map</a> by <a href="https://www.mapsdirections.info/en/">UK Maps</a></iframe>
                    </div>
                </div>
            </div>
            <div class="row margin-botton-50px">
                <div class="col-xs-12 col-sm-6 col-md-6 text-center margin-bt-xs borda-ver pad-top-bott">
                    <h3>Solicitação de reserva</h3>
                    <form method="post" action= <?php echo '../controlers/validaLista.php?id='. $id ?>>
                       <div class="row margin-botton-30px">
                           <div class="form-group">
                                <div class="col-sm-6 margin-left-150px">
                                  <select class="form-control" name="cliente" required>
                                     <option value="">Selecione</option>
                                      <?php
                                            include "../controlers/retornaLista.php";
                                      ?>
                                  </select>
                                </div>
                           </div>
                       </div>
                        
                        <button type="submit" class="btn btn-cadastro botao-topo-cadastro" >Visualizar</button>
                    </form>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 text-center margin-bt-xs borda-ver pad-top-bott">
                    <h3>Consulta pelo CPF</h3>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                    <form method="post" action= <?php echo '../controlers/buscaCpf.php?id='. $id ?>>
                       <div class="row margin-botton-30px">
                           <div class="form-group">
                                <div class="col-sm-6 margin-left-150px">
                                  <input type="text" class="form-control " name="cpf" id="campoCpf" placeholder="XXX.XXX.XXX-XX">
                                </div>
                           </div>
                       </div>                        
                        <button type="submit" class="btn btn-cadastro botao-topo-cadastro" >Pesquisar</button>
                    </form>
                </div>
            </div>
            
            <?php   
                  if( (isset($cpf) and $cpf === 'true') || isset($reserva) ){
                      include "../view/inc/info-usuario.php";
                  }
            ?>
            <div class="row">
                <div class="col-sm-offset-2 col-md-offset-2 col-sm-5 col-md-4 borda-ver pad-top-bott">
                   <h3 class="centro-md">Solicitações aceitas</h3>
                    <table class="table table-fixed">
                        <thead>
                          <tr>
                            <th class="col-xs-3" style="padding-right: 47px;">Nome</th>
                            <th class="col-xs-3">Data</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <?php 
                               include "../controlers/retornoListaAprovados.php";
                            ?>
                          </tr>                      
                        </tbody>
                      </table>
                </div>
                <div class="col-md-offeset-2 col-sm-5 col-md-4 borda-ver pad-top-bott">
                   <h3 class="centro-md">Solicitações recusadas</h3>
                    <table class="table table-fixed">
                        <thead>
                          <tr>
                            <th class="col-xs-3" style="padding-right: 47px;">Nome</th>
                            <th class="col-xs-3">Data</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                             <?php 
                               include "../controlers/retornoListaReprovados.php";
                            ?>
                          </tr>                            
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
            
        <footer class="container-fluid div-footer">
            <?php include "inc/footer.php"?>
        </footer>
        <script>
            jQuery(function($){
   
                $("#campoCpf").mask("999.999.999-99");
            });
   
        </script>
        
<!--        <script src="js/jquery-3.2.1.min.js"></script>-->
        <script src="js/jquery.maskedinput.js" type="text/javascript"></script>
        <script src="js/bootstrap.js"></script>
    </body>
</html>
