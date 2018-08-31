<?php
    include "model/conexao.php";
    include "controlers/getMoeda.php";
    
    $query = "SELECT imagem, id_anuncio, cod_empresa, valor, titulo FROM anuncio order by clique desc limit 4";
    $sql_query = mysqli_query($conexao, $query) or die ("erro");
    
    $imagem=[];
    $id=[];
    $i = 0;
    while($tb_clientes = mysqli_fetch_array($sql_query)) {
        $imagem[$i] = $tb_clientes['imagem'];
        $id[$i] = $tb_clientes['id_anuncio'];
        $cod_empresa[$i] = $tb_clientes['cod_empresa'];
        $valor[$i] = $tb_clientes['valor'];
        $titulo[$i] = $tb_clientes['titulo'];
        $i++;
    }
        $valor = getMoeda($valor);

        $i = 0;
        $j = 0;
        while($i < count($cod_empresa, COUNT_RECURSIVE)){
            $nome_empresa = "SELECT nome_fantasia from pessoa_juridica where cod_empresa = '$cod_empresa[$i]'";
            $query = mysqli_query($conexao, $nome_empresa) or die ("Erro ao conectar");

            while($tb_nome = mysqli_fetch_array($query)){
                    $name_empresa[$i] = $tb_nome['nome_fantasia'];
                $j++;
            }
            $i++;
        }


echo "<div class='row margin-botton-50px' style='text-align: -webkit-center; text-align: -moz-center;'>  
            <h3 class='text-center' style='color: #bc2026;'> Promoções HOT <i class='glyphicon glyphicon-fire'> </i> </h3>

            <div class='col-xs-12 col-sm-6 col-md-3 alinha-centro'>
                    <div class='div-promocoes-hot margin-botton-20px'>
                        <div>
                          <p class='oferta-hot'>  <i class='glyphicon glyphicon-fire'></i>  Oferta HOT </p>
                          <div class='div-nome-preco-hot'>
                                <p class='nome-hot'>$name_empresa[0]</p>
                                <p class='preco-hot'>$valor[0]</p>
                            </div>
                            <img src='$imagem[0]' class='img-promo img-responsive'>                            
                        </div>
                        <div class='link-promo'>
                            <a href='perfil-estabelecimento.php?id=$cod_empresa[0]&idanuncio=$id[0]'><i class='glyphicon glyphicon-chevron-left'></i>Reserve</a>
                        </div>
                    </div>
                </div>

            <div class='col-xs-12 col-sm-6 col-md-3 alinha-centro'>
                    <div class='div-promocoes-hot margin-botton-20px'>
                        <div>
                          <p class='oferta-hot'>  <i class='glyphicon glyphicon-fire'></i>  Oferta HOT </p>
                          <div class='div-nome-preco-hot'>
                                <p class='nome-hot'>$name_empresa[1]</p>
                                <p class='preco-hot'>$valor[1]</p>
                            </div>
                            <img src='$imagem[1]' class='img-promo img-responsive'>                            
                        </div>
                        <div  class='link-promo'>
                            <a href='perfil-estabelecimento.php?id=$cod_empresa[1]&idanuncio=$id[1]'><i class='glyphicon glyphicon-chevron-left'></i>Reserve</a>
                        </div>
                    </div>
                </div>

            <div class='col-xs-12 col-sm-6 col-md-3 alinha-centro'>
                    <div class='div-promocoes-hot margin-botton-20px'>
                        <div>
                          <p class='oferta-hot'>  <i class='glyphicon glyphicon-fire'></i>  Oferta HOT </p>
                          <div class='div-nome-preco-hot'>
                                <p class='nome-hot'>$name_empresa[2]</p>
                                <p class='preco-hot'>$valor[2]</p>
                            </div>
                            <img src='$imagem[2]' class='img-promo img-responsive'>                            
                        </div>
                        <div  class='link-promo'>
                            <a href='perfil-estabelecimento.php?id=$cod_empresa[2]&idanuncio=$id[2]'><i class='glyphicon glyphicon-chevron-left'></i>Reserve</a>
                        </div>
                    </div>
                </div>    

            <div class='col-xs-12 col-sm-6 col-md-3 alinha-centro'>
                    <div class='div-promocoes-hot margin-botton-20px'>
                        <div>
                          <p class='oferta-hot'>  <i class='glyphicon glyphicon-fire'></i>  Oferta HOT </p>
                          <div class='div-nome-preco-hot'>
                                <p class='nome-hot'>$name_empresa[3]</p>
                                <p class='preco-hot'>$valor[3]</p>
                            </div>
                            <img src='$imagem[3]' class='img-promo img-responsive'>                            
                        </div>
                        <div  class='link-promo'>
                            <a href='perfil-estabelecimento.php?id=$cod_empresa[3]&idanuncio=$id[3]'><i class='glyphicon glyphicon-chevron-left'></i>Reserve</a>
                        </div>
                    </div>
                </div>        
    </div>";                     

?> 