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

                                    <li style="margin-bottom: 10px;"><a href="perfil-admin-contas-a-receber.php" class="link-opcoes-usuario">Contas a Receber</a></li>

                                    <li style="margin-bottom: 10px;"><a href="perfil-admin-pagamentos-pendentes.php" class="link-opcoes-usuario">Pagamentos Pendentes</a></li>

                                    <li style="margin-bottom: 10px;"><a href="perfil-admin-pagamentos-negados.php" class="link-opcoes-usuario">Pagamentos Negados</a></li>

                                    <li style="margin-bottom: 10px;"><a href="perfil-admin-receita.php" class="link-opcoes-usuario">Receita</a></li>

                                    <li style="margin-bottom: 10px;"><a href="#" class="link-opcoes-usuario">Sair</a></li>
                            </ul>
                        </div>
                        </div>
                    </div>
                    <!--Fim menu lateral-->                     
                    
                    <!--Inicio Intro-->
                    <div class="col-xs-12 col-sm-8 col-md-8 tab-content">
                        <!--Inicio Contas a receber-->
                        <div id="contas-receber">
                             <h1>Pagamentos Negados</h1>
                             <div class="row borda-ver-admin">
                                  <div class="margin-bottom-65px">
                                      <form class="form-group">
                                          <div class="col-md-5">
                                             <select class="form-control">
                                              <option>Selecione</option>
                                              <option>Data Inclusão</option>
                                              <option>N° Transação</option>
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
                                           <td>N° Transação</td>
                                           <td>Nome Estab.</td>
                                           <td>Valor</td>
                                           <td>Plano</td>
                                           <td>Bandeira</td>
                                           <td>Cod. Rejeição</td>
                                           <td>Motivo </td>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         <tr>
                                           <td>26/11/2017</td>
                                           <td>00001132891</td>
                                           <td>Alemão Comércio Ltda</td>
                                           <td>R$ 55,90</td>
                                           <td>Gold</td>
                                           <td>Master</td>
                                           <td>0XZD0X86212</td>
                                           <td>#Saldo insuficiente</td>
                                         </tr>
                                         <tr>
                                           <td>25/11/2017</td>
                                           <td>00003211891</td>
                                           <td>Sushi Isaio LTDA</td>
                                           <td>R$ 19,90</td>
                                           <td>Basic</td>
                                           <td>VISA</td>
                                           <td>0XZD0X92469</td>
                                           <td>#Negado</td>
                                         </tr>
                                         <tr>
                                           <td></td>
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
                                           <td></td>
                                         </tr>
                                     </tbody>
                                  </table>
                                  <div class="row" style="text-align: right;margin-bottom: 20px;">
                                      <div class="col-md-4"></div>
                                      <div class="col-md-8">
                                          <div class="col-md-3">
                                              
                                          </div>
                                          <div class="col-md-3">
                                              
                                          </div>
                                          <div class="col-md-3">
                                              <a href="perfil-admin-pagamentos-negados-visualizar.php"class="link-opcoes-usuario">Visualizar</a>
                                          </div>
                                          <div class="col-md-3">
                                              <a href="perfil-administrador.php?id=9"class="link-opcoes-usuario">Sair</a>
                                          </div>
                                      </div>
                                  </div>
                             </div>                              
                        </div>
                        <!--Fim Contas a receber--> 
      
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
