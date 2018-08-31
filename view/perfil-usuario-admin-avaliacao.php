<?php
    session_start();
    include "../controlers/dadosPessoaFisica.php";
    include "../model/conexao.php";

    if(isset($_SESSION['mensagem']) && $_SESSION['mensagem'] <> "" ){                                          
        echo "<label class='col-xs-12 col-sm-12 padding-top-7px alert alert-warning'> ";
        echo $_SESSION['mensagem'];
        unset( $_SESSION['mensagem'] );  // irá remover os dados de 'mensagem' 
        echo "</label> ";
                                        //$_SESSION['mensagem'] = ""; // Definindo valor, para não dar mensagem de existencia de sessions
        } else{ 
            echo $_SESSION['mensagem'] = "";
        }  

    if(!isset($_SESSION['email']))
        header("location: login.php");

    $cd = $_GET['cd'];
    $id_reserva = $_GET['reserva'];

       // retorna razão social
                                                        $select = "SELECT razao_social
                                                                   FROM reserva
                                                                   INNER JOIN pessoa_juridica ON reserva.cod_empresa = pessoa_juridica.cod_empresa
                                                                   WHERE id_reserva = '$id_reserva'";
                                                        $query = mysqli_query($conexao, $select);                                                        
                                                        $nome_empresa = mysqli_fetch_assoc($query);
                                                        $nome_empresa[0] = $nome_empresa['razao_social'];                                                   
                                        

                                                        //retorna cod_empresa
                                                        $select = "SELECT cod_empresa 
                                                                   FROM pessoa_juridica 
                                                                   WHERE razao_social = '$nome_empresa[0]'";
                                                        $query = mysqli_query($conexao, $select); 
                                                        $cod_empresa = mysqli_fetch_assoc($query);
                                                        $cod_empresa[0] = $cod_empresa['cod_empresa']; 
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
                <p><a href=<?php echo 'perfil-usuario-admin.php?cd='. $_GET['cd'] ?> class="link-opcoes-usuario"><i class="glyphicon glyphicon-chevron-left"></i>Voltar</a></p>
                <h1 class="titulo-pag-usuario">Olá 
                                                <?php
                                                    include '../model/conexao.php'; 
                                                    $_SESSION['email'];
                                                    $query = "Select Substring_index(nome,' ' ,1) as primeiro_nome from pessoa_fisica where email = '$_SESSION[email]';";
                                                    $query = mysqli_query($conexao, $query) or die ("erro");


                                                    while ($linha  = mysqli_fetch_array($query)) {
                                                        echo $linha['primeiro_nome'];
                                                    }
                                                ?>
                </h1>
                <div class="row">
                  
                   <!--Inicio menu lateral-->
                    <div class="col-xs-12 col-sm-4 col-md-4">
                        <img src='
                            <?php
                                include "../controlers/foto_usuario.php";   
                                $foto = fotoUsuario();
                                echo $foto;
                            ?>' max-width="250" class="img-user">          
                            <ul class="lista-opcoes-usuario">
                                <li style="margin-bottom: 10px;"><a href=<?php echo 'perfil-usuario-admin-edita-perfil.php?cd='. $_GET['cd'] ?> class="link-opcoes-usuario">Editar Perfil</a></li>
                                <li style="margin-bottom: 10px;"><a href=<?php echo 'perfil-usuario-admin-checkin.php?cd='. $_GET['cd'] ?> class="link-opcoes-usuario">Check-in</a></li>
                                <li style="margin-bottom: 10px;"><a href=<?php echo 'perfil-usuario-admin-reservas.php?cd='. $_GET['cd'] ?> class="link-opcoes-usuario">Histórico de Reservas</a></li>
                                <li style="margin-bottom: 10px;"><a href=<?php echo 'perfil-usuario-admin-ajuda.php?cd='. $_GET['cd'] ?> class="link-opcoes-usuario">Ajuda</a></li>
                                <li style="margin-bottom: 10px;"><a href="../controlers/destroi-sessao.php" class="link-opcoes-usuario">Sair</a></li>
                            </ul>
                    </div>
                    <!--Fim menu lateral-->                     
                    
                    <!--Inicio Intro-->
                    <div class="col-xs-12 col-sm-8 col-md-8 tab-content">
                        <!--Inicio Ajuda-->
                        <div id="ajuda">
                              <div class="row text-center borda-ver-admin">
                                    <h1>Avaliação</h1>
                                    <div class="col-sm-2 col-md-1"></div>
                                    <div class="col-sm-8 col-md-10">
                                        <form class="form-horizontal" method="post" action="../controlers/insereAvaliacao?cd=<?php echo $cd ?>&reserva=<?php echo $id_reserva?>&cod_empresa=<?php echo $cod_empresa[0]?>">
                                            <div class="form-group" style="text-align: left;">
                                                <label class="col-xs-4 col-sm-4 control-label padding-top-7px">Nome Completo:</label>
                                                <label class="col-sm-8 control-label padding-top-7px"><?php echo dadosPessoaFisica(0)?></label>
                                            </div>
                                            <div class="form-group" style="text-align: left;">
                                                <label class="col-xs-4 col-sm-4 control-label padding-top-7px">Email:</label>
                                                <label class="col-sm-8 control-label padding-top-7px"><?php echo dadosPessoaFisica(1)?></label>
                                            </div>
                                            <div class="form-group" style="text-align: left;">
                                                <label class="col-xs-4 col-sm-4 control-label padding-top-7px">Nome Estabelecimento:</label>
                                                <label class="col-sm-8 control-label padding-top-7px">
                                                    <?php
                                                        // retorna razão social
                                                        $select = "SELECT razao_social
                                                                   FROM reserva
                                                                   INNER JOIN pessoa_juridica ON reserva.cod_empresa = pessoa_juridica.cod_empresa
                                                                   WHERE id_reserva = '$id_reserva'";
                                                        $query = mysqli_query($conexao, $select);                                                        
                                                        $nome_empresa = mysqli_fetch_assoc($query);
                                                        $nome_empresa[0] = $nome_empresa['razao_social'];                                                   
                                                        echo $nome_empresa[0];

                           
                                                    ?>
                                                </label>
                                            </div>
                                            <div class="form-group" style="text-align: left;">
                                                <label class="col-sm-4 control-label padding-top-7px">Notas:</label>
                                                <div class="col-sm-3">
                                                  <select name="nota" class="form-control">
                                                      <option value="">Selecione</option>
                                                      <option value="1">1</option>
                                                      <option value="2">2</option>
                                                      <option value="3">3</option>
                                                      <option value="4">4</option>
                                                      <option value="5">5</option>
                                                      <option value="6">6</option>
                                                      <option value="7">7</option>
                                                      <option value="8">8</option>
                                                      <option value="9">9</option>
                                                      <option value="10">10</option>
                                                  </select>
                                                </div>
                                            </div>
                                            <div class="form-group" style="text-align: left;">
                                                <label class="col-sm-4 control-label padding-top-7px" >Comentário:</label>
                                                <div class="col-sm-8">
                                                    <textarea type="text" name="comentario" class="form-control" rows="5" required></textarea>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 margin-botton-30px">
                                                  <a href="index.php"><button type="button" class="pull-right btn btn-cadastro botao-topo-cadastro" style="margin-right: -14px;">Cancelar</button></a>
                                                  <button type="submit" class="pull-right btn btn-cadastro botao-topo-cadastro">Enviar</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-sm-2 col-md-1"></div>                                  
                              </div>
                        </div>
                        <!--Fim Ajuda-->
                                            
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
