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
                    </div>
                    <!--Fim menu lateral-->                     
                    
                    <!--Inicio Intro-->
                    <div class="col-xs-12 col-sm-8 col-md-8 tab-content">
                        <!--Inicio Incluir Documento-->
                        <div id="incluir-doc">
                             <h1>Contas à Receber - Incluir Documento</h1>
                             <div class="row borda-ver-admin">
                                  <div class="col-xs-12">
                                      <form class="form-horizontal" method="POST" action="../controlers/insereTransacao.php?id=9">
                                          <div class="form-group">
                                            <label class="col-sm-12 control-label padding-top-7px">Data Documento</label>
                                            <div class="col-sm-6">
                                              <input type="date" class="form-control" name="dt-Doc" required>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="col-sm-12 control-label padding-top-7px">N° Transação</label>
                                            <div class="col-sm-6">
                                              <input type="text" maxlength="10" class="form-control" value="<?php echo $transacao = str_pad(mt_rand(1,100000), 11, "0", STR_PAD_LEFT);?>" name="numTransacao" required>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="col-sm-12 control-label padding-top-7px">Nome Estabelecimento</label>
                                            <div class="col-sm-6">
                                              <select class="form-control" name="estabelecimento" required>
                                                            <option value="">Selecione</option>
                                                            <?php include '../controlers/retornaListaEstabelecimento.php' ?>
                                              </select>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="col-sm-12 control-label padding-top-7px">Valor</label>
                                            <div class="col-sm-6">
                                              <select class="form-control" name="valor" required>
                                                            <option value="">Selecione</option>
                                                            <option value="19.0">R$ 19,90</option>
                                                            <option value="39.9">R$ 39,90</option>
                                                            <option value="55.9">R$ 55,90</option>
                                              </select>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="col-sm-12 control-label padding-top-7px">Plano</label>
                                            <div class="col-sm-6">
                                              <select class="form-control" name="plano" required>
                                                            <option value="">Selecione</option>
                                                            <option value="1">Basic</option>
                                                            <option value="2">Standart</option>
                                                            <option value="3">Gold</option>
                                              </select>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="col-sm-12 control-label padding-top-7px">Bandeira Cartão</label>
                                            <div class="col-sm-6">
                                              <select class="form-control" name="bandeira" required>
                                                    <option value="">Selecione</option>
                                                    <option value="Master">Master Card</option>
                                                    <option value="Visa">Visa</option>
                                                    <option value="Dinners">Diner's Club</option>
                                                    <option value="American">American Express</option>
                                                    <option value="Discover">Discover</option>                                
                                              </select>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="col-sm-12 control-label padding-top-7px">Código Autorização</label>
                                            <div class="col-sm-6">
                                              <input type="text" class="form-control dinheiro" name="cod" disabled>
                                            </div>
                                          </div>
                                          <div style="margin-top: 50px;margin-bottom: 57px;padding-bottom: 5px;">
                                            <a href="perfil-admin-contas-a-receber.php?id=9"><button type="button" class="pull-right btn btn-cadastro">Cancelar</button></a>
                                            <button type="submit" class="pull-right btn btn-cadastro botao-topo-cadastro" name="incluir">Incluir</button>
                                        </div>
                                      </form>
                                  </div>  
                             </div>                              
                        </div>
                        <!--Fim Incluir Documento-->             
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
