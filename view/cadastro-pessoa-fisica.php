<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/estilo.css">
        <title> Cadastro de Pessoa Fisica - Search Food</title>

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
                <p style="margin-left: 13px;font-size: 20px;">Pessoa Fisíca</p>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                <form class="form-horizontal" method="POST" action="../model/insere-pessoa-fisica.php">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="col-sm-2 control-label padding-top-7px">Nome</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="nome" placeholder="Exemplo da Silva" pattern="[a-z-A-Z\s]+$" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label padding-top-7px">Email</label>
                            <div class="col-sm-10">
                              <input type="email" class="form-control" name="email" placeholder="exemplo@examplo.com" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label padding-top-7px">Senha</label>
                            <div class="col-sm-10">
                              <input type="password" class="form-control" pattern="[a-z-A-Z-0-9\s]+$" name="senha" title="Não pode conter caracteres especiais"required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label padding-top-7px">Data de nascimento</label>
                            <div class="col-sm-8">
                              <input type="date" class="form-control " name="dtNascimento" placeholder="exemplo@examplo.com" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label padding-top-7px">Celular</label>
                            <div class="col-sm-10">
                              <input type="tel" class="form-control " name="telefone" id="campoTelefone" placeholder="(XX)XXXXXXXXX" required>
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
                            <label class="col-sm-2 control-label padding-top-7px">CPF</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control " name="cpf" id="campoCpf" placeholder="XXX.XXX.XXX-XX" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="col-sm-2 control-label padding-top-7px">CEP</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control " id="cep" name="cep" placeholder="00000000" maxlength="9" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label padding-top-7px">Endereço</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control " id="logradouro" name="endereco" placeholder="Endereço" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label padding-top-7px">Número</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control " name="numero" required>
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
                              <input type="text" class="form-control " id="localidade" required disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3  control-label padding-top-7px">Estado</label>
                            <div class="col-sm-9 ">
                              <input type="text" class="form-control " id="uf" required disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label padding-top-7px">Especialidade</label>
                            <div class="col-sm-9">
                              <select class="form-control" name="especialidade" required>
                                    <option value="">Selecione</option>
                                   <?php include '../controlers/listEspecialidadesPessoaJuridica.php'   ?>
                              </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label padding-top-7px">Distância</label>
                            <div class="col-sm-9">
                              <select class="form-control" name="distancia" required>
                                    <option value="">Selecione</option>
                                    <option value="1">1 km</option>
                                    <option value="3">3 km</option>
                                    <option value="5">5 km </option>
                                    <option value="10">10 km</option>
                                    <option value="15">15 km</option>
                              </select>
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
                            <button type="submit" class="pull-right btn btn-cadastro botao-topo-cadastro" name="cadastro" function validarCPF()>Cadastrar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
        <footer class="container-fluid div-footer">
            <?php include "inc/footer.php"?>
        </footer>
        <script>
            var inputsCEP = $('#logradouro, #localidade, #uf');
            var inputsRUA = $('#cep');
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

            $('#campoCpf').on('blur', function(cpf) {

                cpf = cpf.replace(/[^\d]+/g,'');    
                if(cpf == '') return false; 
                // Elimina CPFs invalidos conhecidos    
                if (cpf.length != 11 || 
                    cpf == "00000000000" || 
                    cpf == "11111111111" || 
                    cpf == "22222222222" || 
                    cpf == "33333333333" || 
                    cpf == "44444444444" || 
                    cpf == "55555555555" || 
                    cpf == "66666666666" || 
                    cpf == "77777777777" || 
                    cpf == "88888888888" || 
                    cpf == "99999999999")
                        return false;       
                // Valida 1o digito 
                add = 0;    
                for (i=0; i < 9; i ++)       
                    add += parseInt(cpf.charAt(i)) * (10 - i);  
                    rev = 11 - (add % 11);  
                    if (rev == 10 || rev == 11)     
                        rev = 0;    
                    if (rev != parseInt(cpf.charAt(9)))     
                        return false;       
                // Valida 2o digito 
                add = 0;    
                for (i = 0; i < 10; i ++)        
                    add += parseInt(cpf.charAt(i)) * (11 - i);  
                rev = 11 - (add % 11);  
                if (rev == 10 || rev == 11) 
                    rev = 0;    
                if (rev != parseInt(cpf.charAt(10)))
                    return false;   

                return true;               

            });
  

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
   
                $("#campoTelefone").mask("(99)999999999");
                $("#campoCpf").mask("999.999.999-99");
            });
   
        </script>
<!--        <script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>-->
        <script src="js/jquery.maskedinput.js" type="text/javascript"></script>
        <script src="js/bootstrap.js"></script>
    </body>
</html>