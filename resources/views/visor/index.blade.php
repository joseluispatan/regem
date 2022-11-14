@extends('voyager::master')

@section('page_header')
<!-- Librerias Para Leaflet-->
<script src="https://maps.googleapis.com/maps/api/js?key=" async defer></script>
<link   rel="stylesheet"
        href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />
    <script
        src="https://unpkg.com/leaflet@1.7.1/dist/leaflet-src.js"
        integrity="sha512-I5Hd7FcJ9rZkH7uD01G3AjsuzFy3gqz7HIJvzFZGFt2mrCS4Piw9bYZvCgUE0aiJuiZFYIJIwpbNnDIM6ohTrg=="
        crossorigin=""
    ></script>

<script src="https://unpkg.com/leaflet.gridlayer.googlemutant@latest/dist/Leaflet.GoogleMutant.js"></script>
<link rel="stylesheet" href="/css/L.Control.MousePosition.css" />
<script src="/js/L.Control.MousePosition.js" type="text/javascript"></script>

<link rel="stylesheet" href="/css/L.Control.BetterScale.css" />
<script src="/js/L.Control.BetterScale.js"></script>

<style>
    #map {
    height: 100%; }
    </style>
@stop
@section('content')
<div class="panel-body" style="padding-top:0; height: 650px; ">
    <div id="map" ></div>
    
    <script>
       //Llamamos al archivo puntos de la ruta visor puntos
       var geoJson = @include('visor.puntos')

        var map = L.map('map', {
            center: [-16.805, -65.446],
            zoom: 6,
            });
        var osm = new L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png').addTo(map);
        var satMutant = L.gridLayer.googleMutant({maxZoom: 24,type: "satellite",});
        var hybridMutant = L.gridLayer.googleMutant({maxZoom: 24,type: "hybrid",});
       
        //Insertamos al mapa los puntos y le damos el popup
        var puntos = L.geoJSON(geoJson,{
            onEachFeature: function(feature, layer) {
            layer.bindPopup ("<h4 text-align:center;>Información</h4><ul><li>Estilo: " +feature.properties.Estilo+"</li><li>Siglo: " +feature.properties.Nombre+"</li></ul>");
                }
        }).addTo(map);

        L.control.mousePosition().addTo(map);
        L.control.betterscale().addTo(map);

        L.control
            .layers(
                {
                    Callejero: osm,
                    Satelital: satMutant,
                    Híbrido: hybridMutant,
                },
            ).addTo(map);
        </script>
    </div>
@endsection
