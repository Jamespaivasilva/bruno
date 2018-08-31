<?php
  include "../controlers/foto_empresa.php";
  $id = $_GET['id'];
  $id_user = isset($_GET['iduser']) ? $_GET['iduser'] : '';
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
                             <h1>Controle Finaceiro - Canal de Ajuda</h1>
                             <div class="row borda-ver-admin">
                                  <div class="col-sm-2 col-md-1"></div>
                                    <div class="col-sm-8 col-md-10" style="margin-top: 20px;">
                                        <form class="form-horizontal" method="post" action="">
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label padding-top-7px">Nome</label>
                                                <div class="col-sm-8">
                                                  <input type="text" name="nome" value="<?php echo retornaDados($id_user, 0)?>" class="form-control " disabled>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label padding-top-7px">Email</label>
                                                <div class="col-sm-8">
                                                  <input type="email" name="email" value="<?php echo retornaDados($id_user, 1)?>" class="form-control" disabled>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label padding-top-7px">Motivo do Contato</label>
                                                <div class="col-sm-8">
                                                  <input type="text" name="motivoContato" value="<?php echo retornaDados($id_user, 2)?>" class="form-control " disabled>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label padding-top-7px">Descrição do Assunto</label>
                                                <div class="col-sm-8">
                                                    <textarea type="text" name="descricaoAssunto" class="form-control" rows="5" disabled><?php echo retornaDados($id_user, 3)?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 margin-botton-30px">
                                                  <a href="perfil-administrador.php?id=9"><button type="button" class="pull-right btn btn-cadastro botao-topo-cadastro" style="margin-right: -14px;">Cancelar</button></a>
                                                 
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-sm-2 col-md-1"></div> 
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

        <?php
            function retornaDados($id, $posicao){
                include '../model/conexao.php';

                $select = "SELECT nome, email, motivo, assunto from contatos where id = '$id'";
                $query = mysqli_query($conexao, $select) or die ("Erro ao conectar");

                $tb_cliente =  mysqli_fetch_array($query);

                return $tb_cliente[$posicao];
            }
        ?>
    </body>
</html>
