<?php  

    include 'conexao.php';
    include '../controlers/validaPost.php';

    $razao_social = validaPost('razao_social');
    $nome_fantasia = validaPost('nome_fantasia');
    $estabelecimento = validaPost('estabelecimento');
    $classificacao = validaPost('classificacao');
    $cep = validaPost('cep');
    $endereco = validaPost('endereco');
    $complemento = validaPost('complemento');
    $cidade = validaPost('localidade');
    $uf = validaPost('uf');
    $numero = validaPost('numero');
    $bairro = validaPost('bairro');
    $dtAbertura = validaPost('dtAbertura');
    $cnpj = validaPost('cnpj');
    $conta = validaPost('conta');
    $agencia = validaPost('agencia');
    $banco = validaPost('banco');
    $bandeira = validaPost('bandeira');
    $telefone = validaPost('telefone');
    $celular = validaPost('celular');   
    $email = validaPost('email');
    $senha = validaPost('senha');
    $pergunta = validaPost('pergunta');
    $resposta = validaPost('resposta');
    $foto_empresa = "empresas/default-user-image.png";

    $ultimo_id = "SELECT cod_empresa FROM pessoa_juridica ORDER BY id DESC";
    $result = mysqli_query($conexao, $ultimo_id) or die ("Erro ao conectar &raquo; " . mysql_error());
    $tb_pessoaJuridica = mysqli_fetch_array($result);    
    $cod_empresa = $tb_pessoaJuridica[0] + 1;

    $query =  "INSERT INTO pessoa_juridica(razao_social, nome_fantasia, estabelecimento, classificacao, cep, endereco, complemento, cidade, uf, numero, bairro, dtAbertura, cnpj, conta, agencia, banco, bandeira, telefone, celular, email, senha, pergunta, resposta, foto_empresa, cod_empresa) 
                    VALUES ('$razao_social','$nome_fantasia','$estabelecimento','$classificacao','$cep','$endereco','$complemento','$cidade','$uf','$numero','$bairro','$dtAbertura','$cnpj','$conta','$agencia','$banco','$bandeira','$telefone','$celular','$email','$senha','$pergunta','$resposta','$foto_empresa', '$cod_empresa');";

    mysqli_query($conexao, $query);
    mysqli_close($conexao);

    header('Location: ../view/login.php');
?>