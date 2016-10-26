var map;
var myLatLng = {lat: -12.579738, lng: -41.7007272};
var infowindow = null;


googleMaps = {
      map:[],
      myLatLng: {lat: -18.8800397, lng: -47.05878999999999},
      zoom: 5,
      center: this.myLatLng,
      mapTypeId:'',
      elementId:"mapa",
      actualLongitude: 0,
      actualLatitude: 0,

    inicialize: function () {

      $.getJSON( 'controllers/moveisController.php?acao=cidades', function(dados) {

          $.each( dados, function( key, obj ) {
             
             procurarEndereco(obj);
          })

        });/*.done(function() {
            
        });*/
    },

    getBairrosPorCidade(obj){
       $.getJSON( 'controllers/moveisController.php?acao=bairros&id='+obj.id, function(dados) {

          $.each( dados, function( key, obj ) {
             
             procurarEndereco(obj);
          })

        });
        map.setZoom(15);

    },
    getCurrentPosition: function(){
        if(navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position){
              this.actualLongitude = position.coords.longitude; 
              this.actualLatitude = position.coords.latitude;
            },function(error){ // callback de erro
              alert('Erro ao obter localização!');
              console.log('Erro ao obter localização.', error);
            });
        }    
    },
    mostrarApartametosNoMapa(obj){
          var html = '<ul class="ul-detalhes-imoveis-mapa">';
                html +='<li class="col-sm-12 col-md-12 grid-ver-detalhes-imoveis-mapa">';
            
                html += '<h3 align="center">Graça, Ba</h3>';
                html += '<a href="#">';
                 html += '<div class="col-sm-8 col-md-8 ver-img-imoveis-mapa">';
                html += '   <img class="img-favoritos" src="img/favoritos25x25.png" > ';
                html += '   <img class="img-ver-moveis-mapa" src="img/home-9.jpg" > ';
                 
                html += '</div>';
                html += '</a>'; 
                 html += '<div class="col-md-4 ver-detalhes-imoveis-mapa">';
                html += '      <p class="info-label-apartamento-mapa valor-quartos">2 Dorm</p>';
                html += '      <p class="info-label-apartamento-mapa valor-carros">2</p>'; 
                html += '      <p class="info-label-apartamento-mapa valor-dimensão">88 m2</p>'; 
                html += '      <p class="info-label-apartamento-mapa valor-aluguel">R$ 1.600 </p>'; 
                html += '      <a class="btn btn-default btn-ver-detalhes">Ver detalhes</a>'; 
              
                 html += '</div>';  
                   //html += '<div class="col-sm-12 col-md-12 grid-btn-ver-detalhes"><p align="center"><a class="btn btn-default btn-ver-detalhes">Ver detalhes</a></p></div>'; 
               
                html +='</li>'; 
          
            return html += '</ul>';

    },
}

function procurarEndereco(obj) {

  var geocoder = new google.maps.Geocoder();
 
  geocoder.geocode({address: obj.nome}, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
            if (results[0]) { 
                  
                  map.setCenter(results[0].geometry.location);
                  createMarker(results,obj);
                /*var marker = new google.maps.Marker({
                        map: map,
                        position: results[0].geometry.location,
                        icon: 'img/icon_mapa.png'

                });

                  marker.info = new google.maps.InfoWindow({content:'<div id="content"><img src="icon_mapa.png"/><div id="bodyContent">'+results[0] .formatted_address+'</div></div>'});
                
                  google.maps.event.addListener(marker, 'click', function() {
                
                    marker.info.open(map, marker);
                  }); */   
          }
      }
  });
}

function createMarker(results,obj) {
   var marker ;
   marker = new google.maps.Marker({
      map: map,
      position: results[0].geometry.location,
      icon: 'img/icon_mapa.png'

   });
   
    google.maps.event.addListener(marker, 'click', function() {
    /*infobox = new InfoBox({
          //content: document.getElementById("infobox1"),
          disableAutoPan: false,
          maxWidth: 150,
          pixelOffset: new google.maps.Size(-140, 0),
          //zIndex: null,
          boxStyle: {
                      //background: "url('http://google-maps-utility-library-v3.googlecode.com/svn/trunk/infobox/examples/tipbox.gif') no-repeat",
                      //opacity: 0.75,
                      width: "280px"
              },
          //closeBoxMargin: "12px 4px 2px 2px",
         // closeBoxURL: "http://www.google.com/intl/en_us/mapfiles/close.gif",
          //infoBoxClearance: new google.maps.Size(1, 1)
      });*/
        if (infowindow) {
              infowindow.close();
        }        
        marker.info = new google.maps.InfoWindow({
        content:googleMaps.mostrarApartametosNoMapa(obj),
          disableAutoPan: false,
          maxWidth: 300,
          //pixelOffset: new google.maps.Size(-140, 0),
          //zIndex: null,
          boxStyle: {
                      //background: "url('http://google-maps-utility-library-v3.googlecode.com/svn/trunk/infobox/examples/tipbox.gif') no-repeat",
                      //opacity: 0.75,
                      width: "300px",
                      padding:"0px",
              },
      });

     
      marker.info.open(map, marker);
      var markerCluster = new MarkerClusterer(map, markers);
      
    });  

    google.maps.event.addListener(marker, 'dblclick', function() {
      if (infowindow) {
          infowindow.close();
      }
      /*marker.info = new google.maps.InfoWindow({
        content:'<div id="content"><img src="img/icon_mapa.png"/><div id="bodyContent">'+results[0].formatted_address+'</div></div>'
      });*/
        map.setZoom(10);
        googleMaps.getBairrosPorCidade(obj);
        //marker.info.open(map, marker);
    });        
}


function initMap() {
        googleMaps.inicialize();
        map = new google.maps.Map(document.getElementById('mapa'), {
          center: myLatLng,
          //scrollwheel: false,
          zoom: 7,
          mapTypeId: google.maps.MapTypeId.ROADMAP

          //mapTypeControl: false
          //disableDefaultUI: true

        });
}


