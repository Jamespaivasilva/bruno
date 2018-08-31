<?php  

    include 'conexao.php';
    include '../controlers/validaPost.php';

    $nome = validaPost('nome');
    $email = validaPost('email');
    $senha = validaPost('senha');
    $dtNascimento = validaPost('dtNascimento');
    $contato = validaPost('telefone');
    $pergunta = validaPost('pergunta');
    $resposta = validaPost('resposta');
    $cpf = validaPost('cpf');
    $cep = validaPost('cep');
    $endereco = validaPost('endereco');
    $numero = validaPost('numero');
    $complemento = validaPost('complemento');
    $cidade = validaPost('localidade');
    $uf = validaPost('uf');
    $especialidade = validaPost('especialidade');
    $distancia = validaPost('distancia');

    $ultimo_id = "SELECT cod_usuario FROM pessoa_fisica ORDER BY id DESC";
    $result = mysqli_query($conexao, $ultimo_id) or die ("Erro ao conectar &raquo; " . mysql_error());
    $tb_pessoaFisica = mysqli_fetch_array($result);    
    $cod_user = $tb_pessoaFisica[0] + 1;

    $query =  "INSERT INTO pessoa_fisica(nome, email, senha, dtNascimento, contato, pergunta, resposta, cpf, cep, endereco, numero, complemento, cidade, uf, especialidade, distancia, cod_usuario, foto_perfil ) 
                    VALUES ('$nome', '$email','$senha','$dtNascimento','$contato','$pergunta','$resposta','$cpf','$cep','$endereco','$numero','$complemento','$cidade','$uf','$especialidade','$distancia','$cod_user' ,'usuario/default-user-image.png');";                

     mysqli_query($conexao, $query);
     mysqli_close($conexao);   

     header('Location: ../view/login.php?');    
?>