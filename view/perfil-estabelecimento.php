<?php
        include "../controlers/foto_empresa.php";
        $id = $_GET['id'];
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/estilo.css">
        <title> Perfil Estabel - Search Food </title>
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
            <div class="row margin-bottom-65px">
                <h1>Perfil do Estabelecimento</h1>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <img src='<?php echo  fotoEmpresa($id);?>' class="img-responsive" style="max-width: 260px;  max-height: 300px">
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <h4>
                        <?php
                            include "../controlers/nome_empresa.php";
                            echo  nome_empresa($id);
                        ?>
                    </h4>
                    <a href="#" class=" btn btn-cadastro">Check-In</a><br>
                    <?php echo "<a href='../controlers/verifica_session.php?id=$id' class=' btn btn-cadastro'>Reservar</a><br><br>"?>
                    <p>
                        <?php
                            include "../controlers/endereco_empresa.php";
                            echo  endereco_empresa($id);
                        ?>
                    </p>
                   <!-- <div style="width: 100%" class="embed-responsive embed-responsive-16by9">
                        <iframe  class="embed-responsive-item" width="100%" height="400" src="https://www.mapsdirections.info/en/custom-google-maps/map.php?width=100%&height=600&hl=ru&q=Rua%20galvao%20bueno+(Search%20Now)&ie=UTF8&t=&z=14&iwloc=A&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="https://www.mapsdirections.info/en/custom-google-maps/">Create a custom Google Map</a> by <a href="https://www.mapsdirections.info/en/">UK Maps</a></iframe>
                    </div> -->
                        <div id="map"></div>
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

                        <div class="col-xs-12 col-sm-12 col-md-4 barra-procura-pag-usuario col-md-offset-1">
                        <?php 
                            include "../controlers/avaliacao_dado.php";
                            avalicaoDado();
                        ?>                    
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-md-push-6">
                    <h3>Galeria</h3>
                    <div class="row">

                        <?php   
                            include "inc/galeria.php";
                        ?>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-md-pull-6">
                    <h3>Comentários</h3>
                            <?php include "../controlers/nome_usuario.php"?>
                </div>
            </div>
        </div>
            
        <footer class="container-fluid div-footer">
            <?php include "inc/footer.php"?>
        </footer>
        <script src="js/highslide.js"></script>
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/bootstrap.js"></script>
    </body>
</html>