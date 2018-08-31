<?php
  include "../controlers/foto_empresa.php";
  $id = $_GET['id'];
  $id_empresa = isset($_GET['idempresa']) ? $_GET['idempresa'] : '';
  $cod_empres = $id_empresa;
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
                             <h1 style="font-size: 30px;">Controle Finaceiro - Gerenciamento de Anunciantes</h1>
                             <div class="row borda-ver-admin">
                                  <div class="margin-bottom-65px">
                                      <form class="form-group" method="POST" action="../controlers/buscaAnuncio.php?id=9">
                                          <div class="col-md-5">
                                             <select name="atributo" class="form-control">
                                              <option>Selecione</option>
                                              <option value="id_anuncio">Id Anúncio</option>
                                              <option value="1">Nome Usuário</option>
                                              <option value="created_at">Data</option>
                                              <option value="1">Nome Estabelecimento</option>
                                             </select> 
                                          </div>
                                          <div class="col-md-5">
                                              <input type="search" name="texto"  class="form-control">
                                          </div>
                                          <div class="col-md-2">
                                              <button type="submit" name="busca" class="pull-right btn btn-cadastro botao-topo-cadastro">Pesquisar</button>
                                          </div>
                                      </form>
                                  </div>  
                                  
                                  <?php include "../controlers/retornaAnunciosCadastrados.php" ?>

                                  <div class="row" style="text-align: right;margin-bottom: 20px;">
                                      <div class="col-md-4"></div>
                                      <div class="col-md-8">
                                          <div class="col-md-4">
                                              <a href=" <?php echo 'perfil-admin-cadastros-anunciantes-alterar.php?id=9&idempresa=' . $cod_empres ?>" class="link-opcoes-usuario">Alterar</a>
                                          </div>
                                          
                                          <div class="col-md-4">
                                              <a href="perfil-admin-cadastros-anunciantes-visualizar.php?id=9&idempresa=<?php echo $cod_empres?>" class="link-opcoes-usuario">Visualizar</a>
                                          </div>
                                          <div class="col-md-4">
                                              <a href="perfil-administrador.php"class="link-opcoes-usuario">Sair</a>
                                          </div>
                                      </div>
                                  </div>
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
