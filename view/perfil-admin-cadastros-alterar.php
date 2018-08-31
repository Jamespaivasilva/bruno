<?php
  include "../controlers/foto_empresa.php";
  include '../controlers/dadosEmpresa.php';
  $id = $_GET['id'];
  $id_empresa = isset($_GET['cod_empresa']) ? $_GET['cod_empresa'] : '';
  $cod_empresa = $id_empresa;
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
                        <h1 style="font-size: 27px;margin-bottom: 50px;">Administração de cadastros - Cadastro Pessoa Jurídica</h1>
                        <form class="form-horizontal" method="POST" action=<?php echo '../model/update-pessoa-juridica.php?cod_empresa=9&id='. $cod_empresa ?>> 
                                       <div class="form-group">
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label padding-top-7px">Razão Social</label>
                                                <div class="col-sm-8">
                                                  <input type="text" class="form-control" name="razao_social" value="<?php echo dadosEmpresa(0);?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label padding-top-7px">Nome Fantasia</label>
                                                <div class="col-sm-8">
                                                  <input type="text" class="form-control" name="nome_fantasia" value="<?php echo dadosEmpresa(1);?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label padding-top-7px">Estabelecimento</label>
                                                <div class="col-sm-8">
                                                  <select class="form-control" name="estabelecimento" required>
                                                        <option value="<?php echo dadosEmpresa(2);?>"><?php echo dadosEmpresa(2);?></option>
                                                        <option value="restaurante">Restaurante</option>
                                                        <option value="bar">Bar</option>
                                                  </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label padding-top-7px">Classificação</label>
                                                <div class="col-sm-8">
                                                  <select class="form-control" name="classificacao" required>
                                                        <option value="<?php echo dadosEmpresa(3);?>"><?php echo dadosEmpresa(3);?></option>
                                                        <option value="japones">Japonês</option>
                                                        <option value="italiano">Italiano</option>
                                                        <option value="boteco">Boteco</option>
                                                        <option value="outros">Outros</option>
                                                  </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label padding-top-7px">CEP</label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control " id="cep" name="cep" value="<?php echo dadosEmpresa(4);?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label padding-top-7px">Endereço</label>
                                                <div class="col-sm-9">
                                                  <input type="text" class="form-control " id="logradouro" name="endereco" value="<?php echo dadosEmpresa(5);?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3  control-label padding-top-7px">Complemento</label>
                                                <div class="col-sm-9 ">
                                                  <input type="text" class="form-control " name="complemento" value="<?php echo dadosEmpresa(6);?>" >
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
                                                <label class="col-sm-3  control-label padding-top-7px">Número</label>
                                                <div class="col-sm-9 ">
                                                  <input type="text" class="form-control " name="numero"  value="<?php echo dadosEmpresa(7);?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3  control-label padding-top-7px">Bairro</label>
                                                <div class="col-sm-9 ">
                                                  <input type="text" class="form-control " id="bairro" name="bairro" required disabled>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label padding-top-7px">Data de Abertura</label>
                                                <div class="col-sm-8">
                                                  <input type="date" class="form-control " name="dtAbertura" value="<?php echo dadosEmpresa(9);?>" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                           <div class="form-group">
                                                <label class="col-sm-3  control-label padding-top-7px">CNPJ</label>
                                                <div class="col-sm-9 ">
                                                  <input type="text" class="form-control " id="campoCnpj" name="cnpj" value="<?php echo dadosEmpresa(23);?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3  control-label padding-top-7px">Conta</label>
                                                <div class="col-sm-9 ">
                                                  <input type="text" class="form-control " name="conta" value="<?php echo dadosEmpresa(10);?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3  control-label padding-top-7px">Agência</label>
                                                <div class="col-sm-9 ">
                                                  <input type="text" class="form-control " name="agencia" value="<?php echo dadosEmpresa(11);?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label padding-top-7px">Banco</label>
                                                <div class="col-sm-9">
                                                  <select class="form-control" name="banco" required>
                                                        <option value="<?php echo dadosEmpresa(12);?>"><?php echo dadosEmpresa(12);?></option>
                                                        <option value="Banco do Brasil">Banco do Brasil</option>
                                                        <option value="Bradesco">Bradesco</option>
                                                        <option value="Caixa">Caixa</option>
                                                        <option value="Itau">Itaú</option>
                                                        <option value="Santander">Santander</option>
                                                  </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label padding-top-7px">Bandeira</label>
                                                <div class="col-sm-9">
                                                  <select class="form-control" name="bandeira" required>
                                                        <option value="<?php echo dadosEmpresa(13);?>"><?php echo dadosEmpresa(13);?></option>
                                                        <option value="Visa">Visa</option>
                                                        <option value="Master Card">Master Card</option>
                                                        <option value="American Express">American Express</option>                                                  </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label padding-top-7px">Telefone</label>
                                                <div class="col-sm-9">
                                                  <input type="tel" class="form-control " name="telefone" id="campoTelefone" value="<?php echo dadosEmpresa(14);?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label padding-top-7px">Celular</label>
                                                <div class="col-sm-9">
                                                  <input type="tel" class="form-control " id="campoCelular" name="celular" value="<?php echo dadosEmpresa(15);?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label padding-top-7px">Email</label>
                                                <div class="col-sm-9">
                                                  <input type="email" class="form-control" name="email" value="<?php echo dadosEmpresa(16);?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label padding-top-7px">Senha</label>
                                                <div class="col-sm-9">
                                                  <input type="password" class="form-control " name="senha" value="<?php echo dadosEmpresa(17);?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label padding-top-7px">Pergunta Secreta</label>
                                                <div class="col-sm-9">
                                                  <input type="text" class="form-control " name="pergunta" value="<?php echo dadosEmpresa(18);?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label padding-top-7px">Resposta</label>
                                                <div class="col-sm-9">
                                                  <input type="text" class="form-control " name="resposta" value="<?php echo dadosEmpresa(19);?>" required>
                                                </div>
                                            </div>
                                            <div style="margin-top: 50px;margin-bottom: 57px;padding-bottom: 5px;">
                                                <a href="perfil-admin-cadastros.php"><button type="button" class="pull-right btn btn-cadastro">Cancelar</button></a>
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
