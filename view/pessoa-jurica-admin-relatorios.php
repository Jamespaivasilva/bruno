<?php
  include '../controlers/dadosEmpresa.php';

  $id = $_GET['id'];

  if(!isset($id)){
    header('Location: ../view/login.php?');
  }
  
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">    
        <link rel="stylesheet" href="css/estilo.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="js/maskMoney.js" type="text/javascript"></script>
        <script type="text/javascript">
        $(document).ready(function(){
              $("input.dinheiro").maskMoney({showSymbol:true, symbol:"R$", decimal:",", thousands:"."});
        });
    </script>
        <title> </title>
    </head>
    <body>
        <?php include "inc/barra-topo.php"; ?>
        <div class="container main margin-bottom-170px">
            <header>
                <?php include "inc/header.php" ?>
            </header>
                <p><a href="pessoa-jurica-admin.php?id=<?php echo $id ?>" class="link-opcoes-usuario"><i class="glyphicon glyphicon-chevron-left"></i>Voltar</a></p>
                <h1 class="titulo-pag-usuario"> <?php echo dadosEmpresa(0);?></h1>
                <div class="row">
                  
                   <!--Inicio menu lateral-->
                    <div class="col-xs-12 col-sm-4 col-md-4">
                        <?php
                          $foto = dadosEmpresa(22);
                          if(isset($foto)){
                            echo "<img src='$foto' width='250' class='img-user img-responsive' style='height: 250px;'>";
                          }else{
                            echo "<img src='images/default-user-image.png' width='250' class='img-user img-responsive' style='height: 250px;'>";
                          }
                        ?>               
                        <div>
                            <ul class="lista-opcoes-usuario" role="tablist">
                                <li style="margin-bottom: 10px;"><a href="pessoa-jurica-admin-edita-perfil.php" class="link-opcoes-usuario">Editar Perfil</a></li>
                                <li style="margin-bottom: 10px;"><a href="reserva-visao-estabelecimento.php?id=<?php echo $id?>"  class="link-opcoes-usuario">Solicitação de Reserva</a></li>
                                <li style="margin-bottom: 10px;"><a href="pessoa-jurica-admin-intro-anuncios.php?id=<?php echo $id?>" class="link-opcoes-usuario">Anúncios</a></li>
                                <li style="margin-bottom: 10px;"><a href="pessoa-jurica-admin-relatorios.php" class="link-opcoes-usuario">Relatórios</a></li>
                                <li style="margin-bottom: 10px;"><a href="pessoa-jurica-admin-planos.php" class="link-opcoes-usuario">Planos VIP</a></li>
                                <li style="margin-bottom: 10px;"><a href="pessoa-jurica-admin-ajuda.php" class="link-opcoes-usuario">Ajuda</a></li>
                            </ul>
                        </div>
                    </div>
                    <!--Fim menu lateral-->                     
                    
                    <!--Inicio Intro-->
                    <div class="col-xs-12 col-sm-8 col-md-8 tab-content">
                        <!--Inicio Relatório-->
                        <div id="relatorio">
                              <div class="row text-center borda-ver-admin">
                                    <h1>Relatório</h1>
                                    <div class="col-md-6" style="height: 105px;margin-bottom: 20px;">
                                       <form class="form-horizontal" method="POST" action="">
                                           <div class="form-group">
                                            <label class="col-sm-4 control-label padding-top-7px">Estatísticas: </label>
                                            <div class="col-sm-8">
                                              <select class="form-control" name="dias" required>
                                                    <option value="">Selecione</option>
                                                    <option value="90">90 dias</option>
                                                    <option value="60">60 dias</option>
                                                    <option value="30">30 dias</option>
                                                    <option value="25">25 dias</option>
                                                    <option value="15">15 dias</option>
                                                    <option value="10">10 dias</option>
                                                    <option value="5">05 dias</option>
                                                    <option value="1">Hoje</option>
                                              </select>
                                            </div>
                                          </div>
                                          <button type="submit" name="solicitar" class="btn btn-cadastro botao-topo-cadastro pull-right">Buscar</button>
                                       </form>
                                    </div>
                                    <div class="col-md-6" style="padding-right: 20px;padding-left: 20px;margin-bottom: 20px;">
                                        <div class="row borda-ver-admin">
                                            <div style="position: relative;float: left;padding-top: 10px;text-align: left;">
                                                <div class="col-xs-6">
                                                    <p>Total de reservas:</p>
                                                </div>
                                                <div class="col-xs-6">
                                                <?php  include '../controlers/relatorio.php' ?>
                                                    <p> <?php echo $reservas ?></p>
                                                </div>
                                                <div class="col-xs-6">
                                                    <p>Total de check-in:</p>
                                                </div>
                                                <div class="col-xs-6">
                                                    <p> <?php echo $checkin ?> </p>
                                                </div>
                                                <div class="col-xs-6">
                                                    <p>Total de cancelamento:</p>
                                                </div>
                                                <div class="col-xs-6">
                                                    <p><?php  echo $cancelamento ?></p>
                                                </div> 
                                            </div>
                                            
                                        </div>
                                    </div>
                              </div>
                        </div>

                        <!--Fim Relatório-->                        
                    </div>
                </div>
                
            </div>

        <footer class="container-fluid div-footer">
            <?php include "inc/footer.php" ?>
        </footer>
        
<!--        <script src="js/jquery-3.2.1.min.js"></script>-->
        <script src="js/bootstrap.js"></script>
    </body>
</html>
