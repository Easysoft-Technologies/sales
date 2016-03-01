<!DOCTYPE html>
<html>
<head>
<meta charset=utf-8 />
<title>JS Bin</title>
</head>
<body>
  <?php
     //$geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address=573/1,+Jangli+Maharaj+Road,+Deccan+Gymkhana,+Pune,+Maharashtra,+India&sensor=false');
     $geocode = file_get_contents('http://maps.google.com/maps/api/geocode/json?address=Ernakulam,+Nedumbassery,+India&sensor=false');


$output= json_decode($geocode);

$lat = $output->results[0]->geometry->location->lat;
$long = $output->results[0]->geometry->location->lng;
  ?>
    <input type="text" id="latitude" placeholder="latitude" value="<?=$lat?>">
    <input type="text" id="longitude" placeholder="longitude" value="<?=$long?>">
  <input type="text" id="txtAddress" placeholder="latitude" value="ernakulam">
  <div id="map" style="width:500px; height:500px"></div>
  
  <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
  <script>
  
  function initialize() {
    
     var $latitude = document.getElementById('latitude');
    var $longitude = document.getElementById('longitude');
  var image = 'http://www.google.com/intl/en_us/mapfiles/ms/micons/blue-dot.png';
  
    var latitude = document.getElementById('latitude').value;
    var longitude = document.getElementById('longitude').value;
    var zoom = 7;
    
    var LatLng = new google.maps.LatLng(latitude, longitude);
    
    var mapOptions = {
      zoom: zoom,
      center: LatLng,
      panControl: false,
      zoomControl: false,
      scaleControl: true,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    }  
    
    var map = new google.maps.Map(document.getElementById('map'),mapOptions);
    
    var marker = new google.maps.Marker({
      position: LatLng,
      map: map,
      title: 'Drag Me!',
      draggable: true,
        icon: image
    });
    
    google.maps.event.addListener(marker, 'dragend', function(marker){
      var latLng = marker.latLng;
      $latitude.value = latLng.lat();
      $longitude.value = latLng.lng();
    });
    
  }
  initialize();
  </script>
  
</body>
</html>