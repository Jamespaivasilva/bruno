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
                <p><a href="perfil-administrador.php" class="link-opcoes-usuario"><i class="glyphicon glyphicon-chevron-left"></i>Voltar</a></p>
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
                        <h1 style="font-size: 27px;margin-bottom: 50px;">Admnistração de cadastros - Cadastro Pessoa Fisica Alterar</h1>
                        <form class="form-horizontal" method="POST" action=""> 
                                       <div class="form-group">
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label padding-top-7px">Nome Completo</label>
                                                <div class="col-sm-8">
                                                  <input type="text" class="form-control" name="nome" value="" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label padding-top-7px">Email</label>
                                                <div class="col-sm-9">
                                                  <input type="email" class="form-control" name="email" value="" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label padding-top-7px">Data de Nascimento</label>
                                                <div class="col-sm-8">
                                                  <input type="date" class="form-control " name="dtNascimento" value="" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label padding-top-7px">Pergunta Secreta</label>
                                                <div class="col-sm-9">
                                                  <input type="text" class="form-control " name="pergunta" value="" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label padding-top-7px">Resposta</label>
                                                <div class="col-sm-9">
                                                  <input type="text" class="form-control " name="resposta" value="" required>
                                                </div>
                                            </div>
                                            
                                            
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                           <div class="form-group">
                                                <label class="col-sm-2 control-label padding-top-7px">CEP</label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control " id="cep" name="cep" value="" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label padding-top-7px">Endereço</label>
                                                <div class="col-sm-9">
                                                  <input type="text" class="form-control " id="logradouro" name="endereco" value="" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3  control-label padding-top-7px">Complemento</label>
                                                <div class="col-sm-9 ">
                                                  <input type="text" class="form-control " name="complemento" value="" >
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3  control-label padding-top-7px">Cidade</label>
                                                <div class="col-sm-9 ">
                                                  <input type="text" class="form-control " name="cidade" id="localidade" required disabled>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3  control-label padding-top-7px">Estado</label>
                                                <div class="col-sm-9 ">
                                                  <input type="text" class="form-control " id="uf" name="estado" required disabled>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label padding-top-7px">Especialidade</label>
                                                <div class="col-sm-9">
                                                  <select class="form-control" name="especialidade" required>
                                                        <option value="">Selecione</option>
                                                       <?php include '../controlers/listEspecialidadesPessoaJuridica.php'   ?>
                                                  </select>
                                                </div>
                                            </div>
                                            <div style="margin-top: 50px;margin-bottom: 57px;padding-bottom: 5px;">
                                                <button class="pull-right btn btn-cadastro">Cancelar</button>
                                                <button type="submit" class="pull-right btn btn-cadastro botao-topo-cadastro" name="enviar">Salvar Alterações</button>
                                            </div>
                                        </div>  
                            </div>
                        </form>               
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
