<?php 
   include "../controlers/retornaDadosAnuncioPj.php";
  $id = $_GET['id'];
  $id_anuncio = $_GET['idanuncio'];
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
                <p><a href="pessoa-jurica-admin.php" class="link-opcoes-usuario"><i class="glyphicon glyphicon-chevron-left"></i>Voltar</a></p>
                <h1 class="titulo-pag-usuario"> Alemão Comércio Ltda</h1>
                <div class="row">
                  
                   <!--Inicio menu lateral-->
                    <div class="col-xs-12 col-sm-4 col-md-4">
                        <img src='empresas/maxresdefault.jpg' width='250' class='img-user img-responsive' style='height: 250px;'>               
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
                        <!--Inicio Editar anúncios-->
                        <div id="editarAnuncios">
                              <div class="row text-center borda-ver-admin">
                                  <h1 class="margin-botton-50px">Editar Anúncio</h1>
                                  <div class="col-xs-12">
                                      <form class="form-horizontal" method="POST" action= <?php echo "../controlers/editaAnuncio.php?id=$id&idanuncio=$id_anuncio" ?> enctype="multipart/form-data">
                                          <div class="form-group">
                                            <label class="col-sm-12 control-label padding-top-7px">Imagem:</label>
                                            <div class="col-sm-6">
                                                <input type="file" name="arquivo">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="col-sm-12 control-label padding-top-7px">Título:</label>
                                            <div class="col-sm-6">
                                              <input type="text" maxlength="10" class="form-control" name="titulo" value="<?php echo retornaDadosAnuncioPj(3) ?>" required>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="col-sm-12 control-label padding-top-7px">Preço:</label>
                                            <div class="col-sm-6">
                                              <input type="text" class="form-control dinheiro" name="preco" value="<?php echo retornaDadosAnuncioPj(0) ?>" required>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="col-sm-12 control-label padding-top-7px">Especialidade</label>
                                            <div class="col-sm-6">
                                              <select class="form-control" name="classificacao" required>
                                                    <option value="">Selecione</option>
                                                    <?php 
                                                      include "../controlers/listEspecialidadesPessoaJuridica.php";
                                                    ?>                                                        
    	                                       </select>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                                <label class="col-sm-12 control-label padding-top-7px">Descrição:</label>
                                                <div class="col-sm-6">
                                                    <textarea type="text" maxlength="1000" name="descricao" class="form-control" rows="5" required> <?php echo retornaDadosAnuncioPj(2) ?></textarea>
                                                </div>
                                          </div>

                                          <input type='hidden' name='hiden' value='$id_anuncio[$i]'>
                                          
                                          <div style="margin-top: 50px;margin-bottom: 57px;padding-bottom: 5px;">
                                            <button class="pull-right btn btn-cadastro">Cancelar</button>
                                            <button type="submit" name="cadastro" class="pull-right btn btn-cadastro botao-topo-cadastro" name="cadastro">Salvar</button>
                                        </div>
                                      </form>
                                  </div>                                  
                              </div>
                        </div>
                        <!--Fim Editar anúncios--> 
                      
                                              
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
