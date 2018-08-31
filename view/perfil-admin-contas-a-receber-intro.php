<?php
  include "../controlers/foto_empresa.php";
  $id = $_GET['id'];
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
                <p><a href="perfil-administrador.php?id=9" class="link-opcoes-usuario"><i class="glyphicon glyphicon-chevron-left"></i>Voltar</a></p>
                <h1 class="titulo-pag-usuario"> Olá  <?php
                            include "../controlers/nome_empresa.php";
                            echo nome_empresa($id);
                        ?></h1>
                <div class="row">
                  
                   <!--Inicio menu lateral-->
                    <div class="col-xs-12 col-sm-4 col-md-4">
                        <img src='<?php echo  fotoEmpresa($id);?>' width='250' class='img-user img-responsive' style='height: 250px;'>               
                        <div>
                            <ul class="lista-opcoes-usuario" role="tablist">

                                    <li style="margin-bottom: 10px;"><a href="" class="link-opcoes-usuario">Contas a Receber</a></li>

                                    <li style="margin-bottom: 10px;"><a href="" class="link-opcoes-usuario">Pagamentos Pendentes</a></li>

                                    <li style="margin-bottom: 10px;"><a href="" class="link-opcoes-usuario">Pagamentos Negados</a></li>

                                    <li style="margin-bottom: 10px;"><a href="" class="link-opcoes-usuario">Receita</a></li>

                                    <li style="margin-bottom: 10px;"><a href="#" class="link-opcoes-usuario">Sair</a></li>
                            </ul>
                        </div>
                    </div>
                    <!--Fim menu lateral-->                     
                    
                    <!--Inicio Intro-->
                    <div class="col-xs-12 col-sm-8 col-md-8 tab-content">
                        
                        <!--Fim Intro-->                        
                        
                        
                        
                        <!--Inicio Intro contas a receber-->
                        <div id="controle-financeiro">
                              <div class="row text-center borda-ver-admin">
                                  <div class="col-md-3 margin-botton-50px" style="margin-top: 40px;">
                                      <a href="perfil-admin-contas-a-receber.php?id=9">
                                          <div class="div-admin">
                                              <img src="images/inserir-anucios.jpeg" style="width: 182px;height: 147px;" class="img-responsive"><br>
                                              <a href="perfil-admin-contas-a-receber.php" class="link-opcoes-usuario"><strong>Controle de Contas a Receber</strong></a>
                                          </div>
                                      </a>
                                  </div>
                                  <div class="col-md-3 margin-botton-50px" style="margin-top: 40px;">
                                      <a href="perfil-admin-contas-a-receber.php?id=9">
                                          <div class="div-admin">
                                              <img src="images/inserir-anucios.jpeg" style="width: 182px;height: 147px;" class="img-responsive"><br>
                                              <a href="perfil-admin-contas-a-receber.php" class="link-opcoes-usuario"><strong>Pagamentos Pendentes</strong></a>
                                          </div>
                                      </a>
                                  </div>
                                  <div class="col-md-3 margin-botton-50px" style="margin-top: 40px;">
                                      <a href="perfil-admin-contas-a-receber.php?id=9">
                                          <div class="div-admin">
                                              <img src="images/inserir-anucios.jpeg" style="width: 182px;height: 147px;" class="img-responsive"><br>
                                              <a href="perfil-admin-contas-a-receber.php" class="link-opcoes-usuario"><strong>Pagamentos Negados</strong></a>
                                          </div>
                                      </a>
                                  </div>
                                  <div class="col-md-3 margin-botton-50px" style="margin-top: 40px;">
                                      <a href="perfil-admin-contas-a-receber.php?id=9">
                                          <div class="div-admin">
                                              <img src="images/inserir-anucios.jpeg" style="width: 182px;height: 147px;" class="img-responsive"><br>
                                              <a href="perfil-admin-contas-a-receber.php" class="link-opcoes-usuario"><strong>Receita</strong></a>
                                          </div>
                                      </a>
                                  </div>
                              </div>
                        </div>
                        <!--Fim Intro contas a receber-->
                        
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
