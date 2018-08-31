<?php  

    if(isset($_POST['enviar'])){

        include 'conexao.php';
        include '../controlers/validaPost.php';
        $id = $_GET['id'];

        $nome = validaPost('nome');
        $email = validaPost('email'); 
        $dtNascimento = validaPost('dtNascimento');
        $contato = validaPost('contato');
        $pergunta = validaPost('pergunta');
        $resposta = validaPost('resposta');
        $cep = validaPost('cep');
        $endereco = validaPost('endereco');
        $complemento = validaPost('complemento');
        $uf = validaPost('uf');
        $especialidade = validaPost('especialidade');
    
        if(!empty($_FILES['arquivo']['name'])){
            $imagem = "usuario/" . $_FILES['arquivo']['name'];
        }else{
            $select = "SELECT foto_perfil FROM pessoa_fisica WHERE cod_usuario ='$id'";
            $imagem = mysqli_query($conexao, $select) or die ("erro ao conectar");
            $tb_anuncio = mysqli_fetch_array($imagem);
            $imagem = $tb_anuncio[0];
        }

        $query = "UPDATE pessoa_fisica
                  SET nome = '$nome', email ='$email', dtNascimento = '$dtNascimento', contato = '$contato', pergunta ='$pergunta', resposta = '$resposta', cep = '$cep', endereco = '$endereco', complemento='$complemento', uf ='$uf', especialidade ='$especialidade', foto_perfil = '$imagem'
                  WHERE cod_usuario = '$id' ";
        $sql = mysqli_query($conexao, $query);

        if($sql){
            move_uploaded_file($_FILES['arquivo']['tmp_name'], '../view/usuario/' . $_FILES['arquivo']['name']);
        }
        
        header('Location: ../view/perfil-usuario-admin-edita-perfil.php?cd=' . $id);    
    }
?>