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
                        <!--Inicio Ajuda-->
                        <div id="ajuda">
                              <div class="row text-center borda-ver-admin">
                                    <h1>Ajuda</h1>
                                    <h4 class="margin-botton-50px">Contate nos</h4>
                                    <div class="col-sm-2 col-md-1"></div>
                                    <div class="col-sm-8 col-md-10">
                                        <form class="form-horizontal" method="post" action=<?php echo "../controlers/ajuda-pessoa-juridica.php?id=". $id?>>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label padding-top-7px">Nome</label>
                                                <div class="col-sm-8">
                                                  <input type="text" name="nome" value="<?php echo dadosEmpresa(0);?>" class="form-control " required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label padding-top-7px">Email</label>
                                                <div class="col-sm-8">
                                                  <input type="email" name="email" value="<?php echo dadosEmpresa(16);?>" class="form-control" required>
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
                                            <div class="col-xs-12 col-sm-12 margin-botton-30px">
                                                  <a href="pessoa-jurica-admin.php?id=<?php echo $id ?>"><button type="button" class="pull-right btn btn-cadastro botao-topo-cadastro" style="margin-right: -14px;">Cancelar</button></a>
                                                  <button type="submit" class="pull-right btn btn-cadastro botao-topo-cadastro">Enviar</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-sm-2 col-md-1"></div>                                  
                              </div>
                        </div>
                        <!--Fim Ajuda-->
                                            
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
