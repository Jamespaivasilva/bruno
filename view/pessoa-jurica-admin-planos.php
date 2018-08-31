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
                        
                        
                        
                        <!--incio Planos-->
                        <div class="row" id="planos">
                              <div class="text-center">
                                 <h1>Planos</h1>
                                  <div class="col-md-6 margin-botton-50px">
                                      <a href="pessoa-jurica-admin-planos-contratados.php?id=<?php echo $id ?>" >
                                          <div class="div-admin">
                                              <img src="images/sucesso.png" style="height: 147px;"><br>
                                              <a href="pessoa-jurica-admin-planos-contratados.php?id=<?php echo $id ?>"  class="link-opcoes-usuario"><strong>Meus Planos Contratados</strong></a>
                                          </div>
                                      </a>
                                  </div>
                                  <div class="col-md-6 margin-botton-50px">
                                      <a href="pessoa-jurica-admin-contratar-plano.php?id=<?php echo $id?>">
                                          <div class="div-admin">
                                              <img src="images/mais.jpeg" style="height: 147px;"><br>
                                              <a href="pessoa-jurica-admin-contratar-plano.php?id=<?php echo $id?>"  aria-controls="editar-perfil" role="tab" data-toggle="tab"  class="link-opcoes-usuario"><strong>Contratar novos planos</strong></a>
                                          </div>
                                      </a>                                      
                                  </div>
                              </div>
                        </div>
                        <!--Fim Planos-->
                        
                        
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
