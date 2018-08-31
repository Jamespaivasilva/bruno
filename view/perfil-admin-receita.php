<?php
  include "../controlers/foto_empresa.php";
  $id = $_GET['id'];
  $valor = isset($_GET['val']) ? $_GET['val'] : NULL;
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

                                    <li style="margin-bottom: 10px;"><a href="perfil-admin-contas-a-receber.php?id=9" class="link-opcoes-usuario">Contas a Receber</a></li>

                                    <li style="margin-bottom: 10px;"><a href="perfil-admin-pagamentos-pendentes.php?id=9" class="link-opcoes-usuario">Pagamentos Pendentes</a></li>

                                    <li style="margin-bottom: 10px;"><a href="perfil-admin-pagamentos-negados.php?id=9" class="link-opcoes-usuario">Pagamentos Negados</a></li>

                                    <li style="margin-bottom: 10px;"><a href="perfil-admin-receita.php?id=9" class="link-opcoes-usuario">Receita</a></li>

                                    <li style="margin-bottom: 10px;"><a href="#" class="link-opcoes-usuario">Sair</a></li>
                            </ul>
                        </div>
                    </div>
                    <!--Fim menu lateral-->                     
                    
                    <!--Inicio Intro-->
                    <div class="col-xs-12 col-sm-8 col-md-8 tab-content">
                        <!--Inicio Visualizar Documento-->
                        <div id="visualizar-doc">
                             <h1> Receita</h1>
                             <div class="row borda-ver-admin">
                                  <div class="col-xs-12">
                                      <form class="form-horizontal" method="POST" action="../controlers/retornaFaturamento.php?id=9">
                                          <p style="font-size: 18px;margin-top: 20px;">Quais informações deseja visualizar?</p>
                                          <div >
                                            
                                            <label class="radio-inline">
                                              <input type="radio" name="radio" id="inlineRadio1" value="r1"> Receita
                                            </label>
                                            <label class="radio-inline">
                                              <input type="radio" name="radio" id="inlineRadio2" value="r2"> Projeção
                                            </label>
                                            <label class="radio-inline">
                                              <input type="radio" name="radio" id="inlineRadio3" value="r3"> Pagamentos Pendentes
                                            </label>
                                            <label class="radio-inline">
                                              <input type="radio" name="radio" id="inlineRadio3" value="r4"> Pagamentos Negados
                                            </label>
                                            
                                            <p style="font-size: 18px;margin-top: 20px;margin-bottom: 25px;">Selecione o Período:</p>
                                            <div class="form-group">
                                              <label class="col-sm-1 control-label padding-top-7px">de</label>
                                              <div class="col-sm-3">
                                                <input type="date" maxlength="10" class="form-control" name="nome-estab-de"  >
                                              </div>
                                              <label class="col-sm-1 control-label padding-top-7px">até</label>
                                              <div class="col-sm-3">
                                                <input type="date" maxlength="10" class="form-control" name="nome-estab-ate" >
                                              </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                          <button type="submit" name="calculo" class="pull-left btn btn-cadastro" style="margin-top: 30px;">Calcular</button>
                                        </div>
                                        
                                      </form>
                                      <p style="position: relative;float: left;margin-top: 55px;font-size: 20px;">Resultado: 
                                        <?php if($valor != NULL){
                                          echo "R$ ".$valor;
                                        }else{
                                          echo "R$ XX.XXX,XX";
                                        }

                                      ?></p>
                                  </div>  
                             </div>                              
                        </div>
                        <!--Fim Visualizar Documento--> 
                                                                
             
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
