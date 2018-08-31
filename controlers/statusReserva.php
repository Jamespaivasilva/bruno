<?php

     function statusReserva ($id) {
          include "../model/conexao.php";
          

          $status = "SELECT status FROM pessoa_juridica 
                         INNER JOIN reserva ON reserva.cod_empresa = pessoa_juridica.cod_empresa
                         INNER JOIN pessoa_fisica ON pessoa_fisica.cod_usuario = reserva.cod_usuario
                         WHERE pessoa_fisica.email = '$_SESSION[email]' AND reserva.cancelamento = '0' ORDER BY reserva.dt_reserva DESC limit 1";

          $status = mysqli_query($conexao, $status) or die ("Erro ao conectar &raquo; " . mysql_error());
          $qtd_linha = $status->num_rows;
          $status_reserva = [];    
          $i = 0;
          while($tb_status = mysqli_fetch_array($status)) {
               $status_reserva[$i] = $tb_status['status'];
               $i++;
          }

          if($qtd_linha === 0){
               echo "Não possui reserva!";
          }else{

               $reserva = $status_reserva[0];

               if ($reserva === "0") {
                    return "Aguardando aprovação";
               }elseif($reserva === "1"){
                    return "Aprovada";
               }elseif ($reserva === "2") {
                    return "Reprovada";
               }elseif($reserva === "3"){
                    return "Cancelado";
               }else{
                    return "";
               }

          }

     } 
?> 