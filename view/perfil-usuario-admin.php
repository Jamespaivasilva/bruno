<?php
    session_start();
    if(isset($_SESSION['mensagem']) && $_SESSION['mensagem'] <> "" ){                                          
        echo "<label class='col-xs-12 col-sm-12 padding-top-7px alert alert-warning'> ";
        echo $_SESSION['mensagem'];
        unset( $_SESSION['mensagem'] );  // irá remover os dados de 'mensagem' 
        echo "</label> ";
                                        //$_SESSION['mensagem'] = ""; // Definindo valor, para não dar mensagem de existencia de sessions
        }else{ 
            echo $_SESSION['mensagem'] = "";
        }  

    if(!isset($_SESSION['email']))
        header("location: login.php");

    $cd = $_GET['cd'];
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">    
        <link rel="stylesheet" href="css/estilo.css">
        <title> </title>
    </head>
    <body>
        <?php include "inc/barra-topo.php" ?>
        <div class="container main margin-bottom-170px">
            <header>
                <?php include "inc/header.php" ?>
            </header>
            <div>
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
                    <div class="col-xs-12 col-sm-4 col-md-4">
                        <img src='
                            <?php
                                include "../controlers/foto_usuario.php";   
                                $foto = fotoUsuario();
                                echo $foto;
                            ?>' max-width="250" class="img-user">
                        <div>
                            <ul class="lista-opcoes-usuario">
                                <li style="margin-bottom: 10px;"><a href=<?php echo 'perfil-usuario-admin-edita-perfil.php?cd='. $_GET['cd'] ?> class="link-opcoes-usuario">Editar Perfil</a></li>
                                <li style="margin-bottom: 10px;"><a href=<?php echo 'perfil-usuario-admin-checkin.php?cd='. $_GET['cd'] ?> class="link-opcoes-usuario">Check-in</a></li>
                                <li style="margin-bottom: 10px;"><a href=<?php echo 'perfil-usuario-admin-reservas.php?cd='. $_GET['cd'] ?> class="link-opcoes-usuario">Histórico de Reservas</a></li>
                                <li style="margin-bottom: 10px;"><a href=<?php echo 'perfil-usuario-admin-ajuda.php?cd='. $_GET['cd'] ?> class="link-opcoes-usuario">Ajuda</a></li>
                                <li style="margin-bottom: 10px;"><a href="../controlers/destroi-sessao.php" class="link-opcoes-usuario">Sair</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-8 col-md-8" style="padding-right: 0px;padding-left: 0px;">
                        <div class="margin-botton-20px">
                            <div class="">
                                <div class="input-group">
                                    <input type="text" class="form-control barra-procura-pag-usuario" placeholder="Pesquisar estabelecimentos...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default barra-procura-pag-usuario" type="button"><span class="glyphicon glyphicon-search"></span></button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane active in fade" id="home">
                              <div class="text-center borda-ver margin-botton-20px" style="float: left;width: 100%;">
                                  <div class="col-md-3 margin-botton-50px" style="margin-top: 50px;">
                                      <a href="perfil-usuario-admin-edita-perfil.php?cd=<?php echo $cd ?>">                           
                                          <div class="div-admin">
                                              <img src="images/edita.png" style="height: 147px;"><br>
                                              <a href="perfil-usuario-admin-edita-perfil.php?cd=<?php echo $cd ?>" class="link-opcoes-usuario"><strong>Editar Perfil</strong></a>
                                          </div>
                                      </a>
                                  </div>
                                  <div class="col-md-3 margin-botton-50px" style="margin-top: 50px;">
                                      <a href=<?php echo 'perfil-usuario-admin-checkin.php?cd='. $_GET['cd'] ?>>
                                          <div class="div-admin">
                                              <img src="images/sucesso.png" style="height: 147px;"><br>
                                              <a href=<?php echo 'perfil-usuario-admin-checkin.php?cd='. $_GET['cd'] ?> class="link-opcoes-usuario"><strong>Check-in</strong></a>
                                          </div>
                                      </a>                                      
                                  </div>
                                  <div class="col-md-3 margin-botton-50px" style="margin-top: 50px;">
                                      <a href= <?php echo 'perfil-usuario-admin-reservas.php?cd='. $_GET['cd'] ?>>
                                          <div class="div-admin">
                                              <img src="images/agenda.png"  style="height: 147px;"><br>
                                              <a href= <?php echo 'perfil-usuario-admin-reservas.php?cd='. $_GET['cd'] ?> aria-controls="anunciosRealizados" role="tab" data-toggle="tab"  class="link-opcoes-usuario"><strong>Histórico de Reservas</strong></a>
                                          </div>
                                      </a>                                      
                                  </div>
                                  <div class="col-md-3 margin-botton-50px" style="margin-top: 50px;">
                                      <a href=<?php echo 'perfil-usuario-admin-ajuda.php?cd='. $_GET['cd'] ?>>
                                          <div class="div-admin">
                                              <img src="images/ajuda.png"  style="height: 147px;"><br>
                                              <a href= <?php echo 'perfil-usuario-admin-ajuda.php?cd='. $_GET['cd'] ?> class="link-opcoes-usuario"><strong>Ajuda</strong></a>
                                          </div>
                                      </a>  
                                  </div>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 borda-ver margin-botton-50px">
                    <div class="row pad-top-bott" style="font-weight: bold;padding-bottom: 63px;">
                       <p style="font-size: 25px;text-align: center;">Status da última Reserva</p>
                       
                        <div class="col-sm-6">
                            <p>Nome do Estabelecimento:</p>
                        </div>
                        <div class="col-sm-6">
                            <p>
                                <?php
                                    include "../controlers/reserva_nome_empresa.php";
                                    echo nomeEmpresaLoginPF($_SESSION['email']);                                                                 
                                ?>
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <p>Status da Reserva:</p>
                        </div>
                        <div class="col-sm-6">
                            <p>
                                <?php
                                    include "../controlers/statusReserva.php";
                                    echo statusReserva($_SESSION['email'])
                                ?>
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <p>Tempo médio de aprovação:</p>
                        </div>
                        <div class="col-sm-6">
                            <p>56 minutos por aprovação</p>
                        </div>
                        <form method="POST" action="../controlers/cancelaSolicitacao.php?cd=<?php echo $cd ?>">
                            <div class="col-sm-6">
                                <button type="submit" name="cancelamento" value="<?php echo $_SESSION['email'] ?>" class="btn btn-cadastro botao-topo-cadastro" >Cancelar Solicitação</button>
                            </div>
                        </form>
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-cadastro botao-topo-cadastro" >Cancelar Reserva</button>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 borda-ver margin-botton-50px">
                    <div class="row pad-top-bott" style="font-weight: bold;">
                       <p style="font-size: 25px;text-align: center;">Reserva Recente</p>
                        <div class="col-sm-6">
                            <p>Estabelecimento:</p>
                        </div>
                        <div class="col-sm-6">
                            <p>
                                <?php
                                    echo nomeEmpresaLoginPF($_SESSION['email']);
                                ?>
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <p>Data:</p>
                        </div>
                        <div class="col-sm-6">
                            <p>
                                <?php
                                    include "../controlers/dtReserva.php";
                                    echo dtReserva($_SESSION['email']);
                                ?>
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <p>Horário:</p>
                        </div>
                        <div class="col-sm-6">
                            <p>
                                <?php
                                    include "../controlers/horaReserva.php";
                                    echo horaReserva($_SESSION['email']);
                                ?>
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <p>Status:</p>
                        </div>
                        <div class="col-sm-6">  
                            <p> <?php echo statusReserva($_SESSION['email']); ?></p>
                        </div>                        
                    </div>
                    <p><strong><a href=<?php echo 'perfil-usuario-admin-reservas.php?cd='. $_GET['cd'] ?> class="link-opcoes-usuario">Histórico completo</a> </strong></p>
                </div>
            </div>
        </div>

        <footer class="container-fluid div-footer">
            <?php include "inc/footer.php"?>
        </footer>
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/bootstrap.js"></script>
    </body>
</html>
