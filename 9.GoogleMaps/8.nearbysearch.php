<!DOCTYPE html>
<html>
    <head>
        <title>nearby search</title>
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
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCwJ2Vepe9L2Miuh7QH87SR_RItIXHlX6Q&libraries=places"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>
            
            //set map options
            var myLatLng = {lat: 51.5, lng: -0.1};
            var mapOptions = {
                center: myLatLng,
                zoom: 15,
                mapTypeId: google.maps.MapTypeId.ROADMAP
                
            };
            
            //create map
            var map = new google.maps.Map(document.getElementById('map'), mapOptions);
            
            //create infowindow
            var infowindow = new google.maps.InfoWindow();
            
            //define a request, the location must be defined using google.maps.LatLng
            
            var london = new google.maps.LatLng(51.5, -0.1);
            var request = {
                location: london,
                radius: '500',
                types: ['store']
            }
            
            //create a placesServcie object before using the nearbysearch method
            var service = new google.maps.places.PlacesService(map);
            
            service.nearbySearch(request, callback);
            
            //define the callback function showing what we do with the results
            
            function callback(result, status){
                if(status == google.maps.places.PlacesServiceStatus.OK){
                    console.log(result);
                    for(i =0; i<result.length; i++){
                        addMarker(result[i]);   
                    }
                }
            }
            
            //add a marker for each place in the result array
            function addMarker(place){
                   var marker = new google.maps.Marker({
                    map: map,
                       position: place.geometry.location,
                       animation: google.maps.Animation.DROP
                   });
                google.maps.event.addListener(marker, "click", function(){
            infowindow.setContent(place.name); 
                    infowindow.open(map, this);
                })
            }
        </script>
    </body>

</html>