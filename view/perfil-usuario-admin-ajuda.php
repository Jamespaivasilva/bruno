<?php
    session_start();
    include "../controlers/dadosPessoaFisica.php";

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
                    <div class="col-xs-12 col-sm-8 col-md-8">
                        <div class="row borda-ver-admin">  
                                  <h1 class="margin-bottom-30px" style="text-align: center;">Ajuda</h1>
                                  <h4 class="margin-botton-50px" style="text-align: center;">Contate nos</h4>
                                    <div class="col-sm-2 col-md-1"></div>
                                    <div class="col-sm-8 col-md-10">
                                        <form class="form-horizontal" method="post" action="../controlers/ajuda-contato-PF.php?cd=<?php echo $cd ?>" >
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label padding-top-7px">Nome</label>
                                                <div class="col-sm-8">
                                                  <input type="text" name="nome" value="<?php echo dadosPessoaFisica(0)?>" class="form-control " required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label padding-top-7px">Email</label>
                                                <div class="col-sm-8">
                                                  <input type="email" name="email" value="<?php echo dadosPessoaFisica(1)?>" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label padding-top-7px">Motivo do Contato</label>
                                                <div class="col-sm-8">
                                                  <input type="text" name="motivoContato" class="form-control "required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label padding-top-7px">Descrição do Assunto</label>
                                                <div class="col-sm-8">
                                                    <textarea type="text" name="descricaoAssunto" class="form-control" rows="5" required></textarea>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 margin-botton-30px">
                                                  <a href="../index.php"><button type="button" class="pull-right btn btn-cadastro botao-topo-cadastro" style="margin-right: -14px;">Cancelar</button></a>
                                                  <button type="submit" class="pull-right btn btn-cadastro botao-topo-cadastro">Enviar</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-sm-2 col-md-1"></div>    
                                  
                             </div>  
                    </div>
                </div>
            </div>
            
        </div>

        <footer class="container-fluid div-footer">
            <?php include "inc/footer.php" ?>
        </footer>
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/bootstrap.js"></script>
    </body>
</html>
