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
                            <?php include "inc/links-admin.php" ?>
                        </div>
                    </div>
                    <!--Fim menu lateral-->                     
                    
                    <!--Inicio Intro-->
                    <div class="col-xs-12 col-sm-8 col-md-8 tab-content">
                        <div class="row tab-pane active in fade" id="home">
                              <div class="text-center">
                                  <div class="col-md-4 margin-botton-50px">
                                      <a href="perfil-admin-cadastros.php?id=9">                           
                                          <div class="div-admin">
                                              <img src="images/edita.png" style="height: 147px;"><br>
                                              <a href="perfil-admin-cadastros.php" class="link-opcoes-usuario"><strong>Administração de Cadastros</strong></a>
                                          </div>
                                      </a>
                                  </div>
                                  <div class="col-md-4 margin-botton-50px">
                                      <a href="perfil-admin-canal-de-ajuda.php?id=9">
                                          <div class="div-admin">
                                              <img src="images/ajuda.png" style="height: 147px;"><br>
                                              <a href="perfil-admin-canal-de-ajuda.php?id=9" class="link-opcoes-usuario"><strong>Canal ajuda ao cliente</strong></a>
                                          </div>
                                      </a>                                      
                                  </div>
                                  <div class="col-md-4 margin-botton-50px">
                                      <a href="#controle-financeiro" aria-controls="controle-financeiro" role="tab" data-toggle="tab">
                                          <div class="div-admin">
                                              <img src="images/relatorio.png" style="height: 147px;"><br>
                                              <a href="#anunciosRealizados" aria-controls="anunciosRealizados" role="tab" data-toggle="tab"  class="link-opcoes-usuario"><strong>Controle Financeiro</strong></a>
                                          </div>
                                      </a>                                      
                                  </div>
                                  <div class="col-md-4 margin-botton-50px">
                                      <a href="perfil-admin-checkin.php?id=9">
                                          <div class="div-admin">
                                              <img src="images/bandeira.png" style="height: 147px;"><br>
                                              <a href="perfil-admin-checkin.php?id=9" class="link-opcoes-usuario"><strong>Controle de Check in</strong></a>
                                          </div>
                                      </a>
                                  </div>
                                  <div class="col-md-4 margin-botton-50px">
                                      <a href="perfil-admin-cadastros-anunciantes.php?id=9">
                                          <div class="div-admin">
                                              <img src="images/sucesso.png" style="height: 147px;"><br>
                                              <a href="perfil-admin-cadastros-anunciantes.php?id=9" class="link-opcoes-usuario"><strong>Gerenciamento de anunciantes</strong></a>
                                          </div>
                                      </a>
                                  </div>
                                  <div class="col-md-4 margin-botton-50px">
                                      <a href="perfil-admin-reservas.php?id=9">
                                          <div class="div-admin">
                                              <img src="images/agenda.png" style="height: 147px;"><br>
                                              <a href="perfil-admin-reservas.php?id=9" class="link-opcoes-usuario"><strong>Gerenciamento de reservas</strong></a>
                                          </div>
                                      </a>
                                  </div>
                              </div>
                        </div>
                        <!--Fim Intro-->                        
                        
                        
                        
                        <!--Inicio controle finaceiro-->
                        <div class="tab-pane fade" id="controle-financeiro">
                              <div class="row text-center borda-ver-admin">
                                  <div class="col-md-3 margin-botton-50px" style="margin-top: 40px;">
                                      <a href="perfil-admin-contas-a-receber.php?id=9">
                                          <div class="div-admin">
                                              <img src="images/papel.png" style="height: 147px;" ><br>
                                              <a href="perfil-admin-contas-a-receber.php" class="link-opcoes-usuario"><strong>Controle de Contas a Receber</strong></a>
                                          </div>
                                      </a>
                                  </div>
                                  <div class="col-md-3 margin-botton-50px" style="margin-top: 40px;">
                                      <a href="perfil-admin-pagamentos-pendentes.php?id=9">
                                          <div class="div-admin">
                                              <img src="images/relogio.png" style="height: 147px;" ><br>
                                              <a href="perfil-admin-pagamentos-pendentes.php?id=9" class="link-opcoes-usuario"><strong>Pagamentos Pendentes</strong></a>
                                          </div>
                                      </a>
                                  </div>
                                  <div class="col-md-3 margin-botton-50px" style="margin-top: 40px;">
                                      <a href="perfil-admin-pagamentos-negados.php?id=9">
                                          <div class="div-admin">
                                              <img src="images/close.png" style="height: 147px;" ><br>
                                              <a href="perfil-admin-pagamentos-negados.php?id=9" class="link-opcoes-usuario"><strong>Pagamentos Negados</strong></a>
                                          </div>
                                      </a>
                                  </div>
                                  <div class="col-md-3 margin-botton-50px" style="margin-top: 40px;">
                                      <a href="perfil-admin-receita.php?id=9">
                                          <div class="div-admin">
                                              <img src="images/cifrao.png" style="height: 147px;" ><br>
                                              <a href="perfil-admin-receita.php?id=9" class="link-opcoes-usuario"><strong>Receita</strong></a>
                                          </div>
                                      </a>
                                  </div>
                              </div>
                        </div>
                        <!--Fim controle finaceiro-->
                        
                        <!--Inicio Contas a receber-->
                        <div class="tab-pane fade" id="contas-receber">
                             <h1>Controle Financeiro - Contas à Receber</h1>
                             <div class="row borda-ver-admin">
                                  <div class="margin-bottom-65px">
                                      <form class="form-group">
                                          <div class="col-md-5">
                                             <select class="form-control">
                                              <option>Selecione</option>
                                              <option>Data Inclusão</option>
                                              <option>ID Estabelecimento</option>
                                              <option>Valor</option>
                                              <option>Bandeira</option>
                                             </select> 
                                          </div>
                                          <div class="col-md-5">
                                              <input type="search" class="form-control">
                                          </div>
                                          <div class="col-md-2">
                                              <button type="submit" class="pull-right btn btn-cadastro botao-topo-cadastro">Pesquisar</button>
                                          </div>
                                      </form>
                                  </div>  
                                  <table class="table table-bordered">
                                     <thead>
                                         <tr>
                                           <td>Dt. Doc</td>
                                           <td>Id Estab.</td>
                                           <td>Nome Estab.</td>
                                           <td>Valor</td>
                                           <td>Plano</td>
                                           <td>Bandeira</td>
                                           <td>Cod. Autorização</td>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         <tr>
                                           <td></td>
                                           <td></td>
                                           <td></td>
                                           <td></td>
                                           <td></td>
                                           <td></td>
                                           <td></td>
                                         </tr>
                                         <tr>
                                           <td></td>
                                           <td></td>
                                           <td></td>
                                           <td></td>
                                           <td></td>
                                           <td></td>
                                           <td></td>
                                         </tr>
                                         <tr>
                                           <td></td>
                                           <td></td>
                                           <td></td>
                                           <td></td>
                                           <td></td>
                                           <td></td>
                                           <td></td>
                                         </tr>
                                         <tr>
                                           <td></td>
                                           <td></td>
                                           <td></td>
                                           <td></td>
                                           <td></td>
                                           <td></td>
                                           <td></td>
                                         </tr>
                                     </tbody>
                                  </table>
                                  <div class="row" style="text-align: right;margin-bottom: 20px;">
                                      <div class="col-md-4"></div>
                                      <div class="col-md-8">
                                          <div class="col-md-3">
                                              <a href="#alterar-doc" aria-controls="alterar-doc" role="tab" data-toggle="tab" class="link-opcoes-usuario">Alterar</a>
                                          </div>
                                          <div class="col-md-3">
                                              <a href="#incluir-doc" aria-controls="incluir-doc" role="tab" data-toggle="tab" class="link-opcoes-usuario">Incluir</a>
                                          </div>
                                          <div class="col-md-3">
                                              <a href="#visualizar-doc" aria-controls="visualizar-doc" role="tab" data-toggle="tab" class="link-opcoes-usuario">Visualizar</a>
                                          </div>
                                          <div class="col-md-3">
                                              <a href="#"class="link-opcoes-usuario">Sair</a>
                                          </div>
                                      </div>
                                  </div>
                             </div>                              
                        </div>
                        <!--Fim Contas a receber--> 
                        
                        
                        <!--Inicio Incluir Documento-->
                        <div class="tab-pane fade" id="incluir-doc">
                             <h1>Contas à Receber - Incluir Documento</h1>
                             <div class="row borda-ver-admin">
                                  <div class="col-xs-12">
                                      <form class="form-horizontal" method="POST" action="">
                                          <div class="form-group">
                                            <label class="col-sm-12 control-label padding-top-7px">Data Documento</label>
                                            <div class="col-sm-6">
                                              <input type="date" class="form-control" name="dt-Doc" required>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="col-sm-12 control-label padding-top-7px">ID Estabelecimento</label>
                                            <div class="col-sm-6">
                                              <input type="text" maxlength="10" class="form-control" name="id-estab" required>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="col-sm-12 control-label padding-top-7px">Nome Estabelecimento</label>
                                            <div class="col-sm-6">
                                              <input type="text" maxlength="10" class="form-control" name="nome-estab" required>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="col-sm-12 control-label padding-top-7px">Valor</label>
                                            <div class="col-sm-6">
                                              <input type="text" class="form-control dinheiro" name="valor" required>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="col-sm-12 control-label padding-top-7px">Plano</label>
                                            <div class="col-sm-6">
                                              <input type="text" class="form-control dinheiro" name="plano" required>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="col-sm-12 control-label padding-top-7px">Bandeira Cartão</label>
                                            <div class="col-sm-6">
                                              <input type="text" class="form-control dinheiro" name="bandeira" required>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="col-sm-12 control-label padding-top-7px">Código Autorização</label>
                                            <div class="col-sm-6">
                                              <input type="text" class="form-control dinheiro" name="cod" required>
                                            </div>
                                          </div>
                                          <div style="margin-top: 50px;margin-bottom: 57px;padding-bottom: 5px;">
                                            <button class="pull-right btn btn-cadastro">Cancelar</button>
                                            <button type="submit" class="pull-right btn btn-cadastro botao-topo-cadastro" name="cadastro">Incluir</button>
                                        </div>
                                      </form>
                                  </div>  
                             </div>                              
                        </div>
                        <!--Fim Incluir Documento--> 
                        
                                           
                        <!--Inicio Alterar Documento-->
                        <div class="tab-pane fade" id="alterar-doc">
                             <h1>Contas à Receber - Alterar Documento</h1>
                             <div class="row borda-ver-admin">
                                  <div class="col-xs-12">
                                      <form class="form-horizontal" method="POST" action="">
                                          <div class="form-group">
                                            <label class="col-sm-12 control-label padding-top-7px">Data Documento</label>
                                            <div class="col-sm-6">
                                              <input type="date" class="form-control" name="dt-Doc" required>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="col-sm-12 control-label padding-top-7px">ID Estabelecimento</label>
                                            <div class="col-sm-6">
                                              <input type="text" maxlength="10" class="form-control" name="id-estab" required>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="col-sm-12 control-label padding-top-7px">Nome Estabelecimento</label>
                                            <div class="col-sm-6">
                                              <input type="text" maxlength="10" class="form-control" name="nome-estab" required>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="col-sm-12 control-label padding-top-7px">Valor</label>
                                            <div class="col-sm-6">
                                              <input type="text" class="form-control dinheiro" name="valor" required>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="col-sm-12 control-label padding-top-7px">Plano</label>
                                            <div class="col-sm-6">
                                              <input type="text" class="form-control dinheiro" name="plano" required>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="col-sm-12 control-label padding-top-7px">Bandeira Cartão</label>
                                            <div class="col-sm-6">
                                              <input type="text" class="form-control dinheiro" name="bandeira" required>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="col-sm-12 control-label padding-top-7px">Código Autorização</label>
                                            <div class="col-sm-6">
                                              <input type="text" class="form-control dinheiro" name="cod" required>
                                            </div>
                                          </div>
                                          <div style="margin-top: 50px;margin-bottom: 57px;padding-bottom: 5px;">
                                            <button class="pull-right btn btn-cadastro">Cancelar</button>
                                            <button type="submit" class="pull-right btn btn-cadastro botao-topo-cadastro" name="cadastro">Alterar</button>
                                        </div>
                                      </form>
                                  </div>  
                             </div>                              
                        </div>
                        <!--Fim Alterar Documento-->
                        
                                            
                        <!--Inicio Visualizar Documento-->
                        <div class="tab-pane fade" id="visualizar-doc">
                             <h1>Contas à Receber - Visualizar Documento</h1>
                             <div class="row borda-ver-admin">
                                  <div class="col-xs-12">
                                      <form class="form-horizontal" method="POST" action="">
                                          <div class="form-group">
                                            <label class="col-sm-12 control-label padding-top-7px">Data Documento</label>
                                            <div class="col-sm-6">
                                              <input type="date" class="form-control" name="dt-Doc" disabled>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="col-sm-12 control-label padding-top-7px">ID Estabelecimento</label>
                                            <div class="col-sm-6">
                                              <input type="text" maxlength="10" class="form-control" name="id-estab" disabled>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="col-sm-12 control-label padding-top-7px">Nome Estabelecimento</label>
                                            <div class="col-sm-6">
                                              <input type="text" maxlength="10" class="form-control" name="nome-estab" disabled disabled>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="col-sm-12 control-label padding-top-7px">Valor</label>
                                            <div class="col-sm-6">
                                              <input type="text" class="form-control dinheiro" name="valor" disabled>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="col-sm-12 control-label padding-top-7px">Plano</label>
                                            <div class="col-sm-6">
                                              <input type="text" class="form-control dinheiro" name="plano" disabled>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="col-sm-12 control-label padding-top-7px">Bandeira Cartão</label>
                                            <div class="col-sm-6">
                                              <input type="text" class="form-control dinheiro" name="bandeira" disabled>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="col-sm-12 control-label padding-top-7px">Código Autorização</label>
                                            <div class="col-sm-6">
                                              <input type="text" class="form-control dinheiro" name="cod" disabled>
                                            </div>
                                          </div>
                                          <div style="margin-top: 50px;margin-bottom: 57px;padding-bottom: 5px;">
                                            <button class="pull-right btn btn-cadastro">Cancelar</button>
                                            
                                        </div>
                                      </form>
                                  </div>  
                             </div>                              
                        </div>
                        <!--Fim Visualizar Documento--> 
                        
                                        
                         <!--Inicio Admin Cadastros-->
<!--
                        <div class="tab-pane fade" id="admin-cadastro">
                              <div class="row text-center borda-ver-admin">
                                  <div class="col-md-6 margin-botton-50px" style="margin-top: 40px;">
                                      <a href="#contas-receber" aria-controls="contas-receber" role="tab" data-toggle="tab">
                                          <div class="div-admin">
                                              <img src="images/editar-perfil.jpeg" style="width: 182px;height: 147px;"><br>
                                              <a href="#contas-receber" aria-controls="contas-receber" role="tab" data-toggle="tab" class="link-opcoes-usuario"><strong>Pessoa Fisica</strong></a>
                                          </div>
                                      </a>
                                  </div>
                                  <div class="col-md-6 margin-botton-50px" style="margin-top: 40px;">
                                      <a href="http://localhost/searchFood/view/perfil-admin-cadastros.php">
                                          <div class="div-admin">
                                              <img src="images/editar-perfil.jpeg" style="width: 182px;height: 147px;"><br>
                                              <a href="http://localhost/searchFood/view/perfil-admin-cadastros.php" class="link-opcoes-usuario"><strong>Pessoa Juridica</strong></a>
                                          </div>
                                      </a>
                                  </div>
                              </div>
                        </div>
-->
                        <!--Fim Admin Cadastros-->               
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
