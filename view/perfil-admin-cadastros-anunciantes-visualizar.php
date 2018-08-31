<?php
  include "../controlers/foto_empresa.php";
  include "../controlers/retornaDadosAnuncio.php";
  $id = $_GET['id'];
  $id_anuncio = $_GET['idempresa'];
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
                        <!--Inicio Admnistração de cadastros-->
                        <div class="" id="admin-cadastros">
                             <h1 style="font-size: 27px;">Controle Finaceiro - Gerenciamento de Anunciantes Visualizar</h1>
                             <div class="row borda-ver-admin">
                                  <form class="form-horizontal" method="POST" action="">
                                         <div class="col-sm-2 col-md-1"></div>
                                         <div class="col-sm-8 col-md-10" style="margin-top: 30px;">
                                             <div class="form-group">
                                            <label class="col-sm-3 control-label padding-top-7px">Imagem:</label>
                                            <div class="col-sm-9">
                                                <input type="file" name="arquivo" disabled>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="col-sm-3 control-label padding-top-7px">Preço:</label>
                                            <div class="col-sm-8">
                                              <input type="text" class="form-control dinheiro" name="preco" value="<?php echo retornaDadosAnuncio(0) ?>" disabled>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="col-sm-3 control-label padding-top-7px">Especialidade</label>
                                            <div class="col-sm-8">
                                              <select class="form-control" name="classificacao" disabled>
                                                    <option value="">Selecione</option>
                                                    <?php include '../controlers/listEspecialidadesPessoaJuridica.php'   ?>
                                              </select>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                                <label class="col-sm-3 control-label padding-top-7px">Descrição:</label>
                                                <div class="col-sm-8">
                                                    <textarea type="text" maxlength="1000" name="descricao" class="form-control" rows="5" disabled> <?php echo retornaDadosAnuncio(2) ?> </textarea>
                                                </div>
                                          </div>
                                          <div style="margin-top: 50px;margin-bottom: 57px;padding-bottom: 5px;">
                                            <a href="perfil-admin-cadastros-anunciantes.php"><button type="button" class="pull-right btn btn-cadastro">Cancelar</button></a>
                                            
                                        </div>
                                         </div>
                                          <div class="col-sm-2 col-md-1"></div>
                                      </form>
                             </div>                            
                        </div>
                        <!--Fim Admnistração de cadastros-->                 
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
