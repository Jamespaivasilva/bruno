<?php
    session_start();

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
                                  <h1 class="margin-bottom-65px" style="text-align: center;">Check-in</h1>
                                   <?php
                                        include "../controlers/retornaCheckin.php";
                                    ?>      
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
