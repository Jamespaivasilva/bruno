<?php
        include "../model/conexao.php";
        include '../controlers/validaPost.php';

        $id = $_GET['id'];
        $id_reserva = $_GET['res'];
        
        $cpf = "SELECT nome, cpf, reserva.id_reserva, dt_reserva, qtd_pessoa, foto_perfil from pessoa_fisica 
                    INNER JOIN reserva ON reserva.cod_usuario= pessoa_fisica.cod_usuario
                    INNER JOIN pessoa_juridica ON pessoa_juridica.cod_empresa= reserva.cod_empresa
                    where reserva.id_reserva = '$id_reserva' order by id_reserva";

        $result_cpf = mysqli_query($conexao, $cpf) or die ("Erro ao conectar");
        $a_nome = [];
        $a_cpf = [];
        $a_reserva = [];
        $a_dtreserva = [];
        $a_qtdpessoa = [];
        $a_fotoperfil = [];  
        $i = 0;

        while($tb_cpf = mysqli_fetch_array($result_cpf)) {
            $a_nome[$i] = $tb_cpf['nome'];
            $a_cpf[$i] = $tb_cpf['cpf'];
            $a_reserva[$i] = $tb_cpf['id_reserva'];
            $a_dtreserva[$i] = $tb_cpf['dt_reserva'];
            $a_qtdpessoa[$i] = $tb_cpf['qtd_pessoa'];
            $a_fotoperfil[$i] = $tb_cpf['foto_perfil'];
            $i++;
        }

        $i = 0;
        while($i <  count($a_reserva, COUNT_RECURSIVE)){
            echo "
                    <div class='row margin-botton-50px borda-ver pad-top-bott'>
                        <div class='col-sm-offset-2 col-md-offset-2 col-sm-2  col-md-2'>
                            <img src='$a_fotoperfil[$i]' class='img-responsive' style='width: 150px;'> 
                        </div>
                        <div class='col-sm-8 col-md-6'>
                             <div class='row'>
                                 <div class='col-sm-4 col-md-4'>
                                     <p>Nome do Cliente:</p>
                                 </div>
                                 <div class='col-sm-8 col-md-6'>
                                     <p><strong>$a_nome[$i]</strong></p>
                                 </div>
                             </div>
                             <div class='row'>
                                 <div class='col-sm-4 col-md-4'>
                                     <p>Data</p>
                                 </div>
                                 <div class='col-sm-8 col-md-6'>
                                     <p><strong>$a_dtreserva[$i]</strong></p>
                                 </div>
                             </div>
                             <div class='row'>
                                 <div class='col-sm-4 col-md-4'>
                                     <p>Qtde. de Pessoas</p>
                                 </div>
                                 <div class='col-sm-6 col-md-6'>
                                     <p><strong>$a_qtdpessoa[$i]</strong></p>
                                 </div>
                             </div>
                             <div class='row'>
                                <form method='post' action='../controlers/aceitaReserva_estabelecimento.php?id=$id'>
                                    <div class='col-sm-6 col-md-6'>                                 
                                        <button type='submit' class='btn btn-cadastro botao-topo-cadastro' name='confirmar' value='$id_reserva' >Confirmar</button>
                                    </div>
                                </form>
                                 <form method='post' action='../controlers/rejeitaReserva_estabelecimento.php?id=$id'>
                                     <div class='col-sm-6 col-md-6'>
                                         <button type='submit' class='btn btn-cadastro botao-topo-cadastro' name='recusar' value='$id_reserva' >Recusar</button>
                                     </div>
                                 </form>
                             </div>
                        </div>
                    </div>";
            $i++;
        }  
        mysqli_close($conexao); 
?>