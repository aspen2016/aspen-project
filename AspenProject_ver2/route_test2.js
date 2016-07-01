rendererOptions = {
draggable: true,
preserveViewport:false
};
var directionsDisplay = 
  new google.maps.DirectionsRenderer(rendererOptions);
var directionsService = 
  new google.maps.DirectionsService();
var map;

function initialize() {
 var zoom = 7;
 var mapTypeId = google.maps.MapTypeId.ROADMAP

 var opts = {
 zoom: zoom,
 mapTypeId: mapTypeId
 };
 map = new google.maps.Map
 (document.getElementById("map_canvas"),opts);
   directionsDisplay.setMap(map);
    

 google.maps.event.addListener(directionsDisplay,
   'directions_changed', function(){
 });
 calcRoute();
}

    var from = new google.maps.LatLng(t_lat, t_lng);
    var to = new google.maps.LatLng(lat,long);
function calcRoute() {
 var request = {
 origin: from,
 destination: to,
 travelMode: google.maps.DirectionsTravelMode.WALKING,
 unitSystem: google.maps.DirectionsUnitSystem.METRIC,
 optimizeWaypoints: true,
 avoidHighways: false,
 avoidTolls: false
 };
 directionsService.route(request,
  function(response,status){
  if (status == google.maps.DirectionsStatus.OK){
  directionsDisplay.setDirections(response);}
  });
}