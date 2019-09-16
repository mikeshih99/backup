<!DOCTYPE html>
<html>
    <head>
        <title>Geocoding using Google Maps Javascript API</title>
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
        <meta charset="utf-8">
        <style>
            html, body{
                height:100%;   
            }
            #map{
                height:60%;   
            }
        </style>
    </head>
    
    <body>
        <div id="map"></div>
        <input type="text" placeholder="Address" id="address">
        <button onclick="geocodeAddress();">geocode Addess</button>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCwJ2Vepe9L2Miuh7QH87SR_RItIXHlX6Q"></script>
        <script>
            
            //set map options
            var myLatLng = {lat: 51.5, lng: -0.1};
            var mapOptions = {
                center: myLatLng,
                zoom: 7,
                mapTypeId: google.maps.MapTypeId.ROADMAP
                
            };
            
            //create map
            var map = new google.maps.Map(document.getElementById('map'), mapOptions);
            //create a geocoder object to use the geocode method
            var geocoder = new google.maps.Geocoder();
            
            
            //create geocode function
            function geocodeAddress(){
                geocoder.geocode({'address': document.getElementById("address").value}, function(results, status){
                    if(status == google.maps.GeocoderStatus.OK){
                        console.log(results);
                        window.alert("Address coordinates: " + results[0].geometry.location);
                        map.setCenter(results[0].geometry.location);
                        var marker = new google.maps.Marker({
                            map: map,
                            position: results[0].geometry.location
                        });
                    }else{
                        window.alert("Geocode not successful: " + status);   
                    }
                });
            }
        </script>
    </body>

</html>