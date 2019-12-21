<!DOCTYPE html>
<html>
<head>
     <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
   integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
   crossorigin=""/>
   <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />

   <style type="text/css">
       #mapid { position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0; }
   </style>

    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
   integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
   crossorigin=""></script>
   <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
    <title></title>
</head>
<body>
     <div id="mapid"></div>

     <script type="text/javascript">
         var mymap = L.map('mapid').setView([-8.2655356,113.3732593], 13);

         L.tileLayer('https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=yonG280E2JEzE5rYw1o2', {
        attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(mymap);

    L.Routing.control({
        waypoints: [
            L.latLng(-8.178512148666, 113.70120048522),
            L.latLng({{$loc['latitude']}}, {{$loc['longitude']}})
        ]
        
    }).addTo(mymap);
     </script>
</body>
</html>