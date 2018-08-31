<?php
    session_start();

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="view/css/bootstrap.min.css">
        <link rel="stylesheet" href="view/css/estilo.css">
        <title> Index - Search Food </title>  

    </head>
    <body>
    
      <?php include "view/inc/barra-topo.php" ?>
        <div class="container main margin-bottom-170px">
           <div class="row">
            <header>
                <?php include "view/inc/header.php" ?>
            </header>
            </div>
                                              
            <div class="row margin-botton-50px">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                      <!-- Indicators -->
                      <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                      </ol>

                      <!-- Wrapper for slides -->
                      <div class="carousel-inner">
                        <div class="item active">
                          <a href="view/cadastro-pessoa-fisica.php"> <img src="view/images/banner-cadastro.jpeg" alt="Banner"> </a>
                        </div>

                        <div class="item">
                          <img src="view/images/banner-ununcie.jpeg" alt="Banner">
                        </div>

                        <div class="item">
                          <img src="view/images/banner-italiano.jpeg" alt="Banner">
                        </div>
                      </div>

                      <!-- Left and right controls -->
                      <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="right carousel-control" href="#myCarousel" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Next</span>
                      </a>
                </div>
            </div>
            <div class="row margin-botton-50px">
                <div class="col-xs-12 col-sm-6 col-md-6 margin-botton-20px">
                    <form>
                          <div class="input-group">
                            
                            <div class="input-group-btn">
                              <button class="btn btn-default barra-procura-pag-usuario" type="submit">
                                <i class="glyphicon glyphicon-search"></i>
                              </button>
                            </div>
                            <input type="text" class="form-control barra-procura-pag-usuario" placeholder="Bares, restaurantes, especialidades..." value="">
                          </div>
                    </form>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <form>
                          <div class="input-group">                            
                            <div class="input-group-btn">
                              <button class="btn btn-default barra-procura-pag-usuario" type="submit">
                                <i class="glyphicon glyphicon-map-marker"></i>
                              </button>
                            </div>
                            <input type="text" class="form-control barra-procura-pag-usuario" placeholder="Localidade" value="">
                          </div>
                    </form>
                </div>
            </div>
            <!-- Chama os 4 anúncios mais clicados. -->

            <?php include "view/promocoes-hot.php" ?> 
            
            <hr class="margin-botton-50px">
            <div class="row">               
                <div class="col-xs-12 col-sm-4 col-md-3 margin-botton-20px alinha-centro ">
                    <div class="div-lat-index busca-especifica-index">
                        <form class="form-horizontal" method="post" action="model/filtro.php">
                            <div class="form-group margin-left-5px">
                                <label class="col-sm-10 control-label padding-top-7px">Estado:</label>
                                <div class="col-xs-10 col-sm-10">
                                  <select id="uf" name="estado" class="form-control">
                                        <option value="">-- Selecione --</option>
                                        <option value="AC" >Acre</option>
                                        <option value="AL" >Alagoas</option>
                                        <option value="AP" >Amapá</option>
                                        <option value="AM" >Amazonas</option>
                                        <option value="BA" >Bahia</option>
                                        <option value="CE" >Ceará</option>
                                        <option value="DF" >Distrito Federal</option>
                                        <option value="ES" >Espírito Santo</option>
                                        <option value="GO" >Goiás</option>
                                        <option value="MA" >Maranhão</option>
                                        <option value="MT" >Mato Grosso</option>
                                        <option value="MS" >Mato Grosso do Sul</option>
                                        <option value="MG" >Minas Gerais</option>
                                        <option value="PA" >Pará</option>
                                        <option value="PB" >Paraíba</option>
                                        <option value="PR" >Paraná</option>
                                        <option value="PE" >Pernambuco</option>
                                        <option value="PI" >Piauí</option>
                                        <option value="RJ" >Rio de Janeiro</option>
                                        <option value="RN" >Rio Grande do Norte</option>
                                        <option value="RS" >Rio Grande do Sul</option>
                                        <option value="RO" >Rondônia</option>
                                        <option value="RR" >Rorâima</option>
                                        <option value="SC" >Santa Catarina</option>
                                        <option value="SP" >São Paulo</option>
                                        <option value="SE" >Sergipe</option>
                                        <option value="TO" >Tocantins</option>
                                    </select>
                                </div>
                            </div>                        
                       </div>
                    <div class="div-lat-index ">
                        <p class="margin-left-20px"><strong>Especialidades</strong></p>
                          <?php  include "view/inc/especialidade.php"?>                           
                    </div>

                    <div class="div-lat-index">
                        <p class="margin-left-20px"><strong>Faixa de preço</strong></p>
                        <div class="checkbox margin-left-20px">
                          <label>
                            <input type="checkbox" value="1" name="dolar1">
                            $
                          </label>
                        </div>  
                        <div class="checkbox margin-left-20px">
                          <label>
                            <input type="checkbox" value="2" name="dolar2">
                           $$
                          </label>
                        </div>
                        <div class="checkbox margin-left-20px">
                          <label>
                            <input type="checkbox" value="3" name="dolar3">
                           $$$
                          </label>
                        </div>
                        <div class="checkbox margin-left-20px">
                          <label>
                            <input type="checkbox" value="4" name="dolar4">
                           $$$$
                          </label>
                        </div>
                        <input type="submit" class=" btn btn-cadastro" value="Pesquisar" style="margin-left: 19px;margin-top: 10px;">
                    </div>
                    
                    </form>
                    
                </div>                      
                      
                      <?php include "view/inc/anuncio.php"  ?>
            </div>              
        </div>   
        <footer class="container-fluid div-footer">
            <?php include "view/inc/footer.php"?>
        </footer>
        <script src="view/js/jquery-3.2.1.min.js"></script>
        <script src="view/js/bootstrap.js"></script>
    </body>
</html>