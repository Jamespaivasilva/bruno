<!DOCTYPE html>
<?php
    include "../controlers/foto_empresa.php";
    $id = $_GET['id'];   
?>

<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/estilo.css">
        <title> </title>
        <style>
            #map {
                height: 250px;
                width: 400px;
            }
        </style>
    </head>
    <body>
       <?php include "inc/barra-topo.php" ?>
        <div class="container main margin-bottom-170px">
           <div class="row">
            <header>
                <?php include "inc/header.php" ?>
            </header>
            </div>
            <div class="row margin-botton-100px">
                <h1>Solicitação de Reserva (Reserve já)</h1>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <img src="<?php echo  fotoEmpresa($id);?>" class="img-responsive" style="width: 260px;">
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <h4> 
                        <?php
                            include "../controlers/nome_empresa.php";
                            echo  nome_empresa($id);
                        ?>
                    </h4>
                    <p>
                        <?php
                            include "../controlers/endereco_empresa.php";
                            echo  endereco_empresa($id);
                        ?>
                    </p>
                 <div id="map">
                            <script>
                              var customLabel = {
                                restaurant: {
                                  label: 'R'
                                },
                                bar: {
                                  label: 'B'
                                }
                              };

                                function initMap() {
                                var map = new google.maps.Map(document.getElementById('map'), {
                                  center: new google.maps.LatLng(-23.555980, -46.633085),
                                  zoom: 12
                                });
                                var infoWindow = new google.maps.InfoWindow;

                                  // Change this depending on the name of your PHP or XML file
                                  downloadUrl('resultado.php', function(data) {
                                    var xml = data.responseXML;
                                    var markers = xml.documentElement.getElementsByTagName('marker');
                                    Array.prototype.forEach.call(markers, function(markerElem) {
                                      var name = markerElem.getAttribute('name');
                                      var address = markerElem.getAttribute('address');
                                      var type = markerElem.getAttribute('type');
                                      var point = new google.maps.LatLng(
                                          parseFloat(markerElem.getAttribute('lat')),
                                          parseFloat(markerElem.getAttribute('lng')));

                                      var infowincontent = document.createElement('div');
                                      var strong = document.createElement('strong');
                                      strong.textContent = name
                                      infowincontent.appendChild(strong);
                                      infowincontent.appendChild(document.createElement('br'));

                                      var text = document.createElement('text');
                                      text.textContent = address
                                      infowincontent.appendChild(text);
                                      var icon = customLabel[type] || {};
                                      var marker = new google.maps.Marker({
                                        map: map,
                                        position: point,
                                        label: icon.label
                                      });
                                      marker.addListener('click', function() {
                                        infoWindow.setContent(infowincontent);
                                        infoWindow.open(map, marker);
                                      });
                                    });
                                  });
                                }
                              function downloadUrl(url, callback) {
                                var request = window.ActiveXObject ?
                                    new ActiveXObject('Microsoft.XMLHTTP') :
                                    new XMLHttpRequest;

                                request.onreadystatechange = function() {
                                  if (request.readyState == 4) {
                                    request.onreadystatechange = doNothing;
                                    callback(request, request.status);
                                  }
                                };

                                request.open('GET', url, true);
                                request.send(null);
                              }

                              function doNothing() {}
                            </script>
                            <script async defer
                            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVxAlqoAv-JgRjv1CkIH5C060JpmmA5JY&callback=initMap">
                            </script>
                        </div>
                </div>
            </div>

            <div class="row">
               <form class="form-horizontal" method="post" action= <?php echo '../controlers/registra_reserva.php?id='. $id ?>>
                   <div class="col-md-7">
                       <div class="form-group">
                            <label class="col-sm-3 control-label padding-top-7px">Data</label>
                            <div class="col-sm-5">
                              <input type="date" class="form-control " name="dtReserva" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label padding-top-7px">Hora</label>
                            <div class="col-sm-5">
                              <select class="form-control" name="especialidade" required>
                                    <option value="">Selecione</option>
                                    <option value="10:30">10:30</option>
                                    <option value="11:00">11:00</option>
                                    <option value="11:30">11:30</option>
                                    <option value="12:00">12:00</option>
                                    <option value="12:30">12:30</option>
                                    <option value="13:00">13:00</option>
                                    <option value="13:30">13:30</option>
                                    <option value="14:00">14:00</option>
                                    <option value="14:30">14:30</option>
                                    <option value="15:00">15:00</option>
                                    <option value="15:30">15:30</option>
                                    <option value="16:00">16:00</option>
                                    <option value="16:30">16:30</option>
                                    <option value="17:00">17:00</option>
                                    <option value="17:30">17:30</option>
                                    <option value="18:00">18:00</option>
                                    <option value="18:30">18:30</option>
                                    <option value="19:00">19:00</option>
                                    <option value="19:30">19:30</option>
                                    <option value="20:00">20:00</option>
                                    <option value="20:30">20:30</option>
                                    <option value="21:00">21:00</option>
                                    <option value="21:30">21:30</option>
                                    <option value="22:00">22:00</option>
                                    <option value="22:30">22:30</option>
                                    <option value="23:00">23:00</option>
                                    <option value="23:30">23:30</option>
                              </select>
                            </div>
                        </div>
                        <div class="form-group margin-botton-50px">
                            <label class="col-sm-3 control-label padding-top-7px">Qtde de Pessoas</label>
                            <div class="col-sm-3">
                              <input type="text" class="form-control " name="qtdePessoas" required>
                            </div>
                        </div>
                        <h4>Dados do Cartão <i class='glyphicon glyphicon-credit-card' title="Reserva só poderá ser concluida com cartão de crédito"></i></h4>
                        <div class="form-group">
                            <label class="col-sm-3 control-label padding-top-7px">Bandeira:</label>
                            <div class="col-sm-5">
                              <select class="form-control" name="bandeira" required>
                                    <option value="">Selecione</option>
                                    <option value="Master">Master Card</option>
                                    <option value="Visa">Visa</option>
                                    <option value="Dinners">Diner's Club</option>
                                    <option value="American">American Express</option>
                                    <option value="Discover">Discover</option>                                
                              </select>
                            </div>

                        </div>
                        <?php
                           $status = isset($_GET['status']) ? $_GET['status'] : '';
                            if($status === "0")  {                                 
                                  echo "<div class='form-group'>
                                            <label class='control-label padding-top-7px' style='padding-left:30px; color: red'>Número do Cartão Inválido!</label>
                                            <div class='col-sm-4'>                                              
                                            </div>
                                        </div>
                                ";
                            }
                        ?>   

                        <div class="form-group">
                            <label class="col-sm-4 control-label padding-top-7px">Número do Cartão</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control " name="numCartao" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label padding-top-7px">Nome do Titular</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control " name="nomeTitular" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label padding-top-7px">Validade</label>
                            <div class="col-sm-3">
                              <input type="text" class="form-control " id="campoValidade" name="validade" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label padding-top-7px">Cód. de Segurança</label>
                            <div class="col-sm-3">
                              <input type="text" class="form-control " name="codSeguranca" required maxlength="3">
                            </div>
                        </div>
                        <div style="margin-top: 50px;margin-bottom: 57px;padding-bottom: 5px;">
                            <button class="btn btn-cadastro">Reserva já</button>
                            <button type="submit" class="btn btn-cadastro botao-topo-cadastro" name="cadastro">Voltar</button>
                        </div>
                   </div>
                </form>
            </div>
        </div>
            
        <footer class="container-fluid div-footer">
            <?php include "inc/footer.php"?>
        </footer>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        

        <script>
            jQuery(function($){
   
                $("#campoValidade").mask("99/99");
            });
   
        </script>
        
<!--        <script src="js/jquery-3.2.1.min.js"></script>-->
        <script src="js/jquery.maskedinput.js" type="text/javascript"></script>
        <script src="js/bootstrap.js"></script>
    </body>
</html>
