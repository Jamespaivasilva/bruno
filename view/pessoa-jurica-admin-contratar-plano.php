<?php
  include '../controlers/dadosEmpresa.php';

  $id = $_GET['id'];
  $plano = isset($_GET['plano']) ? $_GET['plano'] : NULL;
  $erro = isset($_GET['status']) ? $_GET['status'] : NULL;

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
                <p><a href="pessoa-jurica-admin.php?id=<?php echo $id?>" class="link-opcoes-usuario"><i class="glyphicon glyphicon-chevron-left"></i>Voltar</a></p>
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
                        <!--Inicio inserir anúncios-->
                        <div id="inserirAnuncios">
                              <div class="row text-center borda-ver-admin">
                                  <h1 class="margin-botton-50px">Contratar Novo Plano</h1>
                                  <div class="col-xs-12">
                                      <form class="form-group" method="post" action=<?php echo '../controlers/capturaPlano.php?id='. $id .'&plano='.$plano ?>>
                                          <div class="row" style="margin-bottom: 30px;">
                                               <div>
                                                    <label class="col-sm-5 col-md-3 control-label padding-top-7px">Selecione seu Plano:</label>
                                                    <div class="col-sm-7 col-md-3">
                                                      <select class="form-control" name="plano" required>
                                                            <option value="">Selecione</option>
                                                            <option value="1">Basic</option>
                                                            <option value="2">Standart</option>
                                                            <option value="3">Gold</option>
                                                      </select>
                                                    </div>
                                               </div>
                                              <div class="col-xs-12 col-sm-12 col-md-2 media-992px-mg-top20">
                                                  <button type="submit" name="busca" class="pull-right btn btn-cadastro botao-topo-cadastro">Visualizar</button>
                                              </div>
                                              <div class="col-xs-12 col-sm-12 col-md-4 media-992px-mg-top20">
                                                  <p style="font-weight: bold;font-size: 18px;">Valor:  <?php include "../controlers/valorPlano.php" ?> </p>
                                              </div>
                                          </div>
                                        </form>
                                          <div class="row" style="text-align: left;margin-bottom: 15px;">
                                              <div class="col-sm-12">                                              
                                                    <?php include "../controlers/descricao.php" ?>            
                                              </div>
                                          </div>
                                          <div class="row" style="text-align: left;">
                                              <div class="col-xs-12">
                                                  <p style="font-weight: bold;font-size: 18px;margin-left: 13px;">Insira seus dados para compra:</p>
                                              <form class="form-horizontal" method="POST" action=<?php echo '../controlers/cadastraPlano.php?id='.$id . '&plano='.$plano ?>>
                                                  <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-sm-4 control-label padding-top-7px">Estabelecimento</label>
                                                        <div class="col-sm-8">
                                                          <input type="text" class="form-control" value="<?php echo dadosEmpresa(1);?>" name="nome_fantasia" disabled>                                                       
                                                        </div>
                                                    </div>

                                                    <div class="form-group" >
                                                        <label class="col-sm-5 control-label padding-top-7px">Data Transação</label>
                                                        <div class="col-sm-7">
                                                          <input type="date" class="form-control" name="dt_transicao" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-6 control-label padding-top-7px">Forma de Pagamento</label>
                                                        <div class="col-sm-6">
                                                          <select class="form-control" name="pagamento" required>
                                                                <option value="">Selecione</option>
                                                                <option value="credito">Crédito</option>
                                                                <option value="debito">Débito</option>
                                                          </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-4 control-label padding-top-7px">Pagamento</label>
                                                        <div class="col-sm-8">
                                                          <input type="text" class="form-control" value="Débito ou 1x de <?php include "../controlers/valorPlano.php" ?>" name="nome_fantasia" disabled>                                                       
                                                        </div>
                                                    </div>
                                                  
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label padding-top-7px">Bandeira</label>
                                                        <div class="col-sm-9">
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
                                                  </div>

                                                  <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-sm-4 control-label padding-top-7px">N° do Cartão</label>
                                                        <div class="col-sm-8">
                                                          <input type="text" class="form-control" name="numCartao" required maxlength="16">
                                                        </div>
                                                       <?php
                                                           $status = isset($_GET['status']) ? $_GET['status'] : '';
                                                            if($status === "0")  {                                 
                                                                  echo "<div class='form-group'>
                                                                            <label class='control-label' style='padding-left:30px; color: red'>Número do Cartão Inválido!</label>
                                                                            <div class='col-sm-4'>                                              
                                                                            </div>
                                                                        </div>";
                                                            }
                                                        ?>   
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-4 control-label padding-top-7px">Nome Titular</label>
                                                        <div class="col-sm-8">
                                                          <input type="text" class="form-control" name="nomeTitular" required maxlength="16">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-5 control-label padding-top-7px">Validade Cartão</label>
                                                        <div class="col-sm-7">
                                                          <input type="text" class="form-control " id="campoValidade" name="validade" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-6 control-label padding-top-7px">Cód. de Segurança</label>
                                                        <div class="col-sm-6">
                                                          <input type="text" class="form-control " name="codSeguranca" required maxlength="3">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        
                                                        <div class="col-sm-12">
                                                          <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox1" value="option1" required=""> Declaro que li e aceito todos os termos de compra
                                                          </label>
                                                        </div>
                                                    </div>
                                                    <div style="margin-top: 50px;margin-bottom: 57px;padding-bottom: 5px;">
                                                        <a href="pessoa-jurica-admin.php?id=<?php echo $id?>"><button type="button" class="pull-right btn btn-cadastro">Cancelar</button></a>
                                                        <button type="submit" class="pull-right btn btn-cadastro botao-topo-cadastro" name="compra"> Comprar</button>
                                                    </div>
                                                  </div>
                                              </form>
                                              </div>
                                          </div>
                                          
                                      
                                      
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