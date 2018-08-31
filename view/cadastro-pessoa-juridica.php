<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/estilo.css">
        <title> Cadastro pessoa Juridica - Search Food</title>
    </head>
    <body>
       <?php include "inc/barra-topo.php" ?>
        <div class="container main margin-bottom-170px">
           <div class="row">
            <header>
                <?php include "inc/header.php" ?>
            </header>
            </div>
            
            <div class="row">
               <h1>Cadastro</h1>
                <p style="margin-left: 13px;font-size: 20px;">Pessoa Juridica</p>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                <form class="form-horizontal" method="POST" action="../model/insere-pessoa-juridica.php">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="col-sm-3 control-label padding-top-7px">Razão Social</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="razao_social" placeholder="Exemplo da Silva" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label padding-top-7px">Nome Fantasia</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="nome_fantasia" placeholder="Exemplo da Silva" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label padding-top-7px">Estabelecimento</label>
                            <div class="col-sm-8">
                              <select class="form-control" name="estabelecimento" required>
                                    <option value="">Selecione</option>
                                    <option value="reataurante">Restaurante</option>
                                    <option value="bar">Bar</option>
                              </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label padding-top-7px">Classificação</label>
                            <div class="col-sm-8">
                              <select class="form-control" name="classificacao" required>
                                    <option value="">Selecione</option>
                                    <?php include '../controlers/listEspecialidadesPessoaJuridica.php'?>
                              </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label padding-top-7px">CEP</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control " id="cep" name="cep" placeholder="00000000" maxlength="8" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label padding-top-7px">Endereço</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control " id="logradouro" name="endereco" placeholder="Endereço" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3  control-label padding-top-7px">Complemento</label>
                            <div class="col-sm-9 ">
                              <input type="text" class="form-control " name="complemento" placeholder="Complemento" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3  control-label padding-top-7px">Cidade</label>
                            <div class="col-sm-9 ">
                              <input type="text" class="form-control " name="localidade" id="localidade" required disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3  control-label padding-top-7px">Estado</label>
                            <div class="col-sm-9 ">
                              <input type="text" class="form-control " id="uf" name="uf" required disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3  control-label padding-top-7px">Número</label>
                            <div class="col-sm-9 ">
                              <input type="text" class="form-control " name="numero" required>
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
                              <input type="date" class="form-control " name="dtAbertura" required>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                       <div class="form-group">
                            <label class="col-sm-3  control-label padding-top-7px">CNPJ</label>
                            <div class="col-sm-9 ">
                              <input type="text" class="form-control " id="campoCnpj" name="cnpj" placeholder="XX.XXX.XXX/XXXX-XX" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3  control-label padding-top-7px">Conta</label>
                            <div class="col-sm-9 ">
                              <input type="text" class="form-control " name="conta" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3  control-label padding-top-7px">Agência</label>
                            <div class="col-sm-9 ">
                              <input type="text" class="form-control " name="agencia" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label padding-top-7px">Banco</label>
                            <div class="col-sm-9">
                              <select class="form-control" name="banco" required>
                                    <option value="">Selecione</option>
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
                                    <option value="">Selecione</option>
                                    <option value="Visa">Visa</option>
                                    <option value="Master Card">Master Card</option>
                                    <option value="American Express">American Express</option>
                              </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label padding-top-7px">Telefone</label>
                            <div class="col-sm-9">
                              <input type="tel" class="form-control " name="telefone" id="campoTelefone" placeholder="(XX)XXXXXXXX" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label padding-top-7px">Celular</label>
                            <div class="col-sm-9">
                              <input type="tel" class="form-control " id="campoCelular" name="celular" placeholder="(XX)XXXXXXXXX" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label padding-top-7px">Email</label>
                            <div class="col-sm-9">
                              <input type="email" class="form-control" name="email" placeholder="exemplo@examplo.com" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label padding-top-7px">Senha</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control " name="senha" placeholder="Senha" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label padding-top-7px">Pergunta Secreta</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control " name="pergunta" placeholder="Pergunta Secreta" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label padding-top-7px">Resposta</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control " name="resposta" placeholder="Resposta" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label padding-top-7px"></label>
                            <div class="col-sm-9">
                              <label class="checkbox-inline">
                                    <input type="checkbox" id="inlineCheckbox1" value="option1" required> Aceito os <a href="termos-de-uso.php" target="_blank" style="color: red;">termos de uso</a>
                              </label>
                            </div>
                        </div>
                        <div style="margin-top: 50px;margin-bottom: 57px;padding-bottom: 5px;">
                            <a href="../../index.php"><button type="button" class="pull-right btn btn-cadastro">Cancelar</button></a>
                            <button type="submit" class="pull-right btn btn-cadastro botao-topo-cadastro" name="cadastro">Cadastrar</button>
                        </div>
                    </div>  
                </form>
            </div>
        </div>

        <footer class="container-fluid div-footer">
            <?php include "inc/footer.php"?>
        </footer>
        <script>
            var inputsCEP = $('#logradouro, #bairro, #localidade, #uf, #ibge');
            var inputsRUA = $('#cep, #bairro, #ibge');
            var validacep = /^[0-9]{8}$/;

            function limpa_formulário_cep(alerta) {
              if (alerta !== undefined) {
                alert(alerta);
              }

              inputsCEP.val('');
            }

            function get(url) {

              $.get(url, function(data) {

                if (!("erro" in data)) {

                  if (Object.prototype.toString.call(data) === '[object Array]') {
                    var data = data[0];
                  }

                  $.each(data, function(nome, info) {
                    $('#' + nome).val(nome === 'cep' ? info.replace(/\D/g, '') : info).attr('info', nome === 'cep' ? info.replace(/\D/g, '') : info);
                  });



                } else {
                  limpa_formulário_cep("CEP não encontrado.");
                }

              });
            }

            // Digitando RUA/CIDADE/UF
            $('#logradouro, #localidade, #uf').on('blur', function(e) {

              if ($('#logradouro').val() !== '' && $('#logradouro').val() !== $('#logradouro').attr('info') && $('#localidade').val() !== '' && $('#localidade').val() !== $('#localidade').attr('info') && $('#uf').val() !== '' && $('#uf').val() !== $('#uf').attr('info')) {

                inputsRUA.val('...');
                get('https://viacep.com.br/ws/' + $('#uf').val() + '/' + $('#localidade').val() + '/' + $('#logradouro').val() + '/json/');
              }

            });

            // Digitando CEP
            $('#cep').on('blur', function(e) {

              var cep = $('#cep').val().replace(/\D/g, '');

              if (cep !== "" && validacep.test(cep)) {

                inputsCEP.val('...');
                get('https://viacep.com.br/ws/' + cep + '/json/');

              } else {
                limpa_formulário_cep(cep == "" ? undefined : "Formato de CEP inválido.");
              }
});
        </script>
        <script>
            jQuery(function($){
                $("#campoCnpj").mask("99.999.999/9999-99");
                $("#campoCelular").mask("(99)999999999");
                $("#campoTelefone").mask("(99)99999999");
            });
        </script>
<!--        <script src="js/jquery-3.2.1.min.js"></script>-->
        <script src="js/jquery.maskedinput.js"></script>
        <script src="js/bootstrap.js"></script>
    </body>
</html>