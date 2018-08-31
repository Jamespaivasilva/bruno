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
                                  <h1 class="margin-bottom-65px" style="text-align: center;">Editar Perfil</h1>
                                  <form class="form-horizontal" method="POST" action=<?php echo '../model/update-pessoa-fisica.php?id='. $_GET['cd'] ?> enctype="multipart/form-data"> 
                                       <div class="form-group">
                                            <label class="col-sm-2 control-label padding-top-7px" style="margin-left: 15px">Foto de Perfil</label>
                                            <div class="col-sm-6">
                                                <input type="file" name="arquivo">
                                            </div>
                                        </div>                                       

                                        <hr class="margin-bottom-65px">

                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label padding-top-7px">Nome Completo</label>
                                                <div class="col-sm-9">
                                                  <input type="text" class="form-control" name="nome" value="<?php echo dadosPessoaFisica(0)?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label padding-top-7px">Email</label>
                                                <div class="col-sm-9">
                                                  <input type="text" class="form-control" name="email" value="<?php echo dadosPessoaFisica(1)?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-5 control-label padding-top-7px">Data de Nascimento</label>
                                                <div class="col-sm-7">
                                                  <input type="date" class="form-control" name="dtNascimento" value="<?php echo dadosPessoaFisica(2)?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label padding-top-7px">Celular</label>
                                                <div class="col-sm-9">
                                                  <input type="text" class="form-control" name="contato" value="<?php echo dadosPessoaFisica(3)?>"  placeholder="(XX)XXXXXXXXX" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label padding-top-7px">Pergunta Secreta</label>
                                                <div class="col-sm-9">
                                                  <input type="text" class="form-control" name="pergunta" value="<?php echo dadosPessoaFisica(4)?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label padding-top-7px">Resposta Secreta</label>
                                                <div class="col-sm-9">
                                                  <input type="text" class="form-control" name="resposta" value="<?php echo dadosPessoaFisica(5)?>" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                           <div class="form-group">
                                                <label class="col-sm-2 control-label padding-top-7px">CEP</label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control " id="cep" name="cep" value="<?php echo dadosPessoaFisica(6)?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label padding-top-7px">Endereço</label>
                                                <div class="col-sm-9">
                                                  <input type="text" class="form-control " id="logradouro" name="endereco" value="<?php echo dadosPessoaFisica(7)?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3  control-label padding-top-7px">Complemento</label>
                                                <div class="col-sm-9 ">
                                                  <input type="text" class="form-control " name="complemento" value="<?php echo dadosPessoaFisica(8)?>" >
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="col-sm-3  control-label padding-top-7px">Estado</label>
                                                <div class="col-sm-9 ">
                                                  <input type="text" class="form-control " id="uf" name="uf" value="<?php echo dadosPessoaFisica(9)?>" required disabled>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label padding-top-7px">Especialidade</label>
                                                <div class="col-sm-9">
                                                  <select class="form-control" name="especialidade" value="<?php echo dadosPessoaFisica(10)?>" required>
                                                        <option value="">Selecione</option>
                                                        <?php include '../controlers/listEspecialidadesPessoaJuridica.php' ?>
                                                  </select>
                                                </div>
                                            </div>
                                            <div style="margin-top: 50px;margin-bottom: 57px;padding-bottom: 5px;">
                                                <a href="<?php echo 'perfil-usuario-admin.php?cd='. $_GET['cd'] ?>"><button type="button" class="pull-right btn btn-cadastro">Cancelar</button></a>
                                                <button type="submit" class="pull-right btn btn-cadastro botao-topo-cadastro" name="enviar">Salvar Alterações</button>
                                            </div>
                                        </div>  
                                    </form>
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
