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
                <p><a href="pessoa-jurica-admin.php" class="link-opcoes-usuario"><i class="glyphicon glyphicon-chevron-left"></i>Voltar</a></p>
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
                    <!--Fim menu lateral-->                     
                    
                    <!--Inicio Intro-->
                    <div class="col-xs-12 col-sm-8 col-md-8 tab-content">
                        <!--Inicio inserir anúncios-->
                        <div id="inserirAnuncios">
                              <div class="row text-center borda-ver-admin">
                                  <h1 class="margin-botton-50px">Contratar Novo Plano</h1>
                                  <div class="col-xs-12">
                                      <h3 style="text-align: left;margin-bottom: 20px;">Infelizmente não conseguimos finalizar a sua compra...</h3>
                                      <div class="col-sm-12 col-md-1"></div>
                                      <div class="col-sm-10" style="text-align: left;margin-bottom: 20px;">
                                          <div class="col-sm-12 col-md-6" style="font-size: 17px;font-weight: bold;margin-bottom: 20px;">
                                              <p>Retorno Operadora:</p>
                                          </div>
                                          <div class="col-sm-12 col-md-6" style="font-size: 17px;font-weight: bold;margin-bottom: 20px;">
                                              <p>XXXXXXXXXXXXXXXXXXXXXX</p>
                                          </div>
                                          <div class="col-sm-12 col-md-6" style="font-size: 14px;font-weight: bold;">
                                              <p>N° Transação(uso interno):</p>
                                          </div>
                                          <div class="col-sm-12 col-md-6" style="font-size: 14px;font-weight: bold;">
                                              <p>XXXXXXXXXXXXXXXXXXXXXX</p>
                                          </div>
                                          <div class="col-sm-12 col-md-6" style="font-size: 14px;font-weight: bold;">
                                              <p>Data da falha Contratação:</p>
                                          </div>
                                          <div class="col-sm-12 col-md-6" style="font-size: 14px;font-weight: bold;">
                                              <p>XX/XX/XXXX</p>
                                          </div>
                                          <div class="col-sm-12 col-md-6" style="font-size: 14px;font-weight: bold;">
                                              <p>Plano:</p>
                                          </div>
                                          <div class="col-sm-12 col-md-6" style="font-size: 14px;font-weight: bold;">
                                              <p>XXXXXXXXXX</p>
                                          </div>
                                          <div class="col-sm-12 col-md-6" style="font-size: 14px;font-weight: bold;">
                                              <p>Valor:</p>
                                          </div>
                                          <div class="col-sm-12 col-md-6" style="font-size: 14px;font-weight: bold;">
                                              <p>R$ XXX,XX</p>
                                          </div>
                                          <p style="text-align: right;"><a href="pessoa-jurica-admin.php" class="link-opcoes-usuario"><i class="glyphicon glyphicon-chevron-left"></i>Voltar</a></p>
                                      </div>
                                      
                                      <div class="col-sm-12 col-md-1"></div>
                                  </div>                                  
                              </div>
                        </div>
                        <!--Fim inserir anúncios-->                                   
                    </div>
                </div>
                
            </div>

        <footer class="container-fluid div-footer">
            <?php include "inc/footer.php" ?>
        </footer>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        

        <script>
            jQuery(function($){
   
                $("#campoValidade").mask("99/99");
            });
   
        </script>
        
<!--        <script src="js/jquery-3.2.1.min.js"></script>-->
        <script src="js/jquery.maskedinput.js" type="text/javascript"></script>
    </body>
</html>