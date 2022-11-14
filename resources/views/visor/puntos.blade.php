<?php
use App\Models\Deposito;
$depositos = Deposito::all();

$geojson = array(
    'type'      => 'FeatureCollection',
    'features'  => array()
 );
foreach($depositos as $deposito){
    $marker = array(
        'type' => 'Feature',
        'features' => array( 
        	'type' => 'Feature',
	        'geometry' => array(
	        'type' => 'Point',
	        'coordinates' => array($deposito['longitude'], $deposito['latitude'])
	            ),
	      	'properties' => array(
            'Nombre' => $deposito['nombre'],
            'Estilo' => $deposito['users_id'],
            'Latitud' => $deposito['latitude'],
            'Latitud' => $deposito['longitude'],
	            )
	      	)
        );
    array_push($geojson['features'], $marker['features']);
}
echo json_encode($geojson, JSON_NUMERIC_CHECK);
?>
