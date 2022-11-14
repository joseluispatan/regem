@extends('voyager::master')

@section('page_title', __('voyager::generic.view').' '.$dataType->getTranslatedAttribute('display_name_singular'))

@section('page_header')
    
    <link rel="stylesheet" href="/css/image.css">
    <script src="/js/image.js"></script>

   
@stop
<!-- Contenido-->
@section('content')
    <!-- Para generar el código QR-->
        <div>
            {!!
            
            QrCode::
             size(100)  //defino el tamaño
            ->eye('circle') //cambiar a circulo los ojos
            ->eyeColor(0, 17, 7, 155, 0, 0, 0) // Cambiar de color a los ojos
            ->eyeColor(1, 17, 7, 155, 0, 0, 0)
            ->eyeColor(2, 17, 7, 155, 0, 0, 0)
            ->style('round') // cambiar a redondeado
            ->backgroundColor(137, 238, 252) //defino el fondo
            ->margin(1)  //defino el margen
            ->generate($datoqr) /** genero el codigo qr **/
            !!}
        </div>
        <div>
        <p class="tipo_usuario"> {{$dataTypeContent->tipo_usuario_id}}</p>
        <br><br><br>
        <p class="numero_cert"> {{$dataTypeContent->nro_certificado}}/<?php echo date('Y'); ?></p>
        <br><br><br>
        <p class="tipoempresa"> {{$dataTypeContent->tipo_empresa_id}}</p>
        <p class="razonsocial"> {{$dataTypeContent->user_id}}</p>
        <p class="nit"> {{$dataTypeContent->nit}}</p>
        <p class="licencia"> {{$dataTypeContent->lic_municipal}}</p>
        <p class="licencia"> {{$dataTypeContent->nit}}</p>
        <p class="replegal"> {{$dataTypeContent->nom_rep_legal}}</p>
        <p class="actprincipal"> {{$dataTypeContent->act_principal}}</p>
            
            <p class="departamento"> {{$dataTypeContent->departamento_id}}</p> 
            <p class="provincia"> {{$dataTypeContent->provincia}}</p>

            <p class="localidad"> {{$dataTypeContent->zona_localidad}} </p>
            <p class="calle"> {{$dataTypeContent->calle_av}}</p>
            <br><br><br>
        <p class="csociedad">{{$dataTypeContent->clase_sociedad}}</p>
        
        <p class="npropietario">{{$dataTypeContent->propietario}}</p>
        <p class="fundacion"> {{$fecha_1}} de {{$fecha_1m}} de {{$fecha_1a}} </p>
        <br><br><br><br><br><br><br><br>
        <p class="desde"> {{$fecha_2}} de {{$fecha_2m}}  &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;{{$fecha_2aa}}</p>
        <p class="hasta">VENCIMIENTO &emsp;&emsp;{{$fecha_2}} de {{$fecha_2m}} &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;{{$fecha_2a + 2}}</p>
        </div>
        <div>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br> 
            <p class="patras">
                El empleo de explosivos y accesorios para la actividad minera; es para el consumo propio de la empresa, con Razón Social <b>{{$dataTypeContent->tipo_empresa_id}} "{{$dataTypeContent->user_id}}"</b>. <b>Póliza de Seguro:</b> La Póliza de Seguro de Responsabilidad Civil debe cumplir lo estipulado en el D. S. 2470, que modifica Art. 31, Parágrafo IV, Numeral 10  del  D.S. 2175 "Póliza de seguro de responsabilidad civil, vigente por el periodo registrado". <b>Renovación:</b> El Certificado de Registro debe renovarse dentro los quince (15) días hábiles previos a la fecha de vencimiento, previa presentación de los documentos que se hubieren modificado o que no se encuentren vigentes al momento de su renovación, de acuerdo al Art. 16 parágrafo II del D.S. 2175. <b>Ubicación: </b>Departamento de {{$dataTypeContent->departamento_id}}, Provincia {{$dataTypeContent->provincia}}, Coordenadas Georeferenciadas (Latitud= {{$dataTypeContent->latitud}} S y Longitud= {{$dataTypeContent->longitud}}W; ),  <b>Representante Legal:</b> Sr. (Sra.) {{$dataTypeContent->nom_rep_legal}}, Número de celular Nº {{$dataTypeContent->telefono}}. <b>Almacenaje:</b> El almacenamiento de explosivos, sus partes y componentes, y otros materiales relacionados, deben efectuarse en instalaciones que cumplan con las normas de seguridad y los requisitos establecidos en la reglamentación, de acuerdo a lo estipulado en  Articulo 23 de la Ley 400

            </p>
            <P class="productos1">{{$dataTypeContent->productos1}}

            </P>
            <P class="productos2">{{$dataTypeContent->productos2}}

            </P>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        </div>
@endsection
