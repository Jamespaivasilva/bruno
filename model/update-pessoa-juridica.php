<?php  

    if(isset($_POST['enviar'])){

        include 'conexao.php';
        include '../controlers/validaPost.php';
        $id = $_GET['id'];
        $cod_empresa = isset($_GET['cod_empresa']) ? $_GET['cod_empresa'] : '' ;

        $razao_social = validaPost('razao_social');
        $nome_fantasia = validaPost('nome_fantasia');
        $estabelecimento = validaPost('estabelecimento');
        $classificacao = validaPost('classificacao');
        $cep = validaPost('cep');
        $endereco = validaPost('endereco');
        $complemento = validaPost('complemento');
        $cidade = validaPost('cidade');
        $estado = validaPost('estado');
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

        if($cod_empresa <> "9"){
            if(!empty($_FILES['arquivo']['name'])){
                $imagem = "empresas/" . $_FILES['arquivo']['name'];
            }else{
                $select = "SELECT foto_empresa FROM pessoa_juridica WHERE cod_empresa ='$id'";
                $imagem = mysqli_query($conexao, $select) or die ("erro ao conectar");
                $tb_anuncio = mysqli_fetch_array($imagem);
                $imagem = $tb_anuncio[0];
            }

        $query =  " UPDATE pessoa_juridica
                    SET razao_social = '$razao_social', nome_fantasia ='$nome_fantasia', estabelecimento = '$estabelecimento', classificacao = '$classificacao', cep ='$cep', endereco = '$endereco', complemento = '$complemento', numero = '$numero', bairro='$bairro', dtAbertura ='$dtAbertura', conta ='$conta', agencia = '$agencia', banco ='$banco', bandeira = '$bandeira', telefone = '$telefone', celular = '$celular', email = '$email', senha='$senha', pergunta = '$pergunta', resposta = '$resposta', estado = '$estado', cnpj ='$cnpj', foto_empresa = '$imagem' 
                    WHERE cod_empresa ='$id'";
        }else{
            $select = "SELECT foto_empresa FROM pessoa_juridica WHERE cod_empresa ='$id'";
            $imagem = mysqli_query($conexao, $select) or die ("erro ao conectar");
            $tb_anuncio = mysqli_fetch_array($imagem);
            $imagem = $tb_anuncio[0];
            $query =  " UPDATE pessoa_juridica
                    SET razao_social = '$razao_social', nome_fantasia ='$nome_fantasia', estabelecimento = '$estabelecimento', classificacao = '$classificacao', cep ='$cep', endereco = '$endereco', complemento = '$complemento', numero = '$numero', bairro='$bairro', dtAbertura ='$dtAbertura', conta ='$conta', agencia = '$agencia', banco ='$banco', bandeira = '$bandeira', telefone = '$telefone', celular = '$celular', email = '$email', senha='$senha', pergunta = '$pergunta', resposta = '$resposta', estado = '$estado', cnpj ='$cnpj', foto_empresa = '$imagem' 
                    WHERE cod_empresa ='$id'";
        }

        $sql = mysqli_query($conexao, $query);

        if($sql && $cod_empresa != "9"){
            move_uploaded_file($_FILES['arquivo']['tmp_name'], '../view/empresas/' . $_FILES['arquivo']['name']);
        }

        mysqli_close($conexao);

        if($cod_empresa === "9"){
            header('Location: ../view/perfil-admin-cadastros-alterar.php?id=9&cod_empresa=' . $id);
        }else{
            header('Location: ../view/pessoa-jurica-admin.php?id=' . $id);    
        }
        
    }

?>