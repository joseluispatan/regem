@extends('voyager::master')

@section('page_title', __('voyager::generic.view').' '.$dataType->getTranslatedAttribute('display_name_singular'))

@section('page_header')
    <h1 class="page-title">
        <i class="{{ $dataType->icon }}"></i> {{ __('voyager::generic.viewing') }} {{ ucfirst($dataType->getTranslatedAttribute('display_name_singular')) }} &nbsp;

        @can('edit', $dataTypeContent)
            <a href="{{ route('voyager.'.$dataType->slug.'.edit', $dataTypeContent->getKey()) }}" class="btn btn-info">
                <i class="glyphicon glyphicon-pencil"></i> <span class="hidden-xs hidden-sm">{{ __('voyager::generic.edit') }}</span>
            </a>
        @endcan
        @can('delete', $dataTypeContent)
            @if($isSoftDeleted)
                <a href="{{ route('voyager.'.$dataType->slug.'.restore', $dataTypeContent->getKey()) }}" title="{{ __('voyager::generic.restore') }}" class="btn btn-default restore" data-id="{{ $dataTypeContent->getKey() }}" id="restore-{{ $dataTypeContent->getKey() }}">
                    <i class="voyager-trash"></i> <span class="hidden-xs hidden-sm">{{ __('voyager::generic.restore') }}</span>
                </a>
            @else
                <a href="javascript:;" title="{{ __('voyager::generic.delete') }}" class="btn btn-danger delete" data-id="{{ $dataTypeContent->getKey() }}" id="delete-{{ $dataTypeContent->getKey() }}">
                    <i class="voyager-trash"></i> <span class="hidden-xs hidden-sm">{{ __('voyager::generic.delete') }}</span>
                </a>
            @endif
        @endcan
        @can('browse', $dataTypeContent)
        <a href="{{ route('voyager.'.$dataType->slug.'.index') }}" class="btn btn-warning">
            <i class="glyphicon glyphicon-list"></i> <span class="hidden-xs hidden-sm">{{ __('voyager::generic.return_to_list') }}</span>
        </a>
        @endcan
    </h1>
    @include('voyager::multilingual.language-selector')
     <!-- Librerias Para Leaflet-->
    <script src="https://maps.googleapis.com/maps/api/js?key=" async defer></script>
    <link
			rel="stylesheet"
			href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
			integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
			crossorigin=""
		/>
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
 
<div class="page-content read container-fluid">
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-bordered" style="padding-bottom:5px;">
                <!-- form start -->
                @foreach($dataType->readRows as $row)
                    @php
                    if ($dataTypeContent->{$row->field.'_read'}) {
                        $dataTypeContent->{$row->field} = $dataTypeContent->{$row->field.'_read'};
                    }
                    @endphp
                    <div class="panel-heading" style="border-bottom:0;">
                        <h3 class="panel-title">{{ $row->getTranslatedAttribute('display_name') }}</h3>
                    </div>

                    <div class="panel-body" style="padding-top:0;">
                        @if (isset($row->details->view))
                            @include($row->details->view, ['row' => $row, 'dataType' => $dataType, 'dataTypeContent' => $dataTypeContent, 'content' => $dataTypeContent->{$row->field}, 'action' => 'read', 'view' => 'read', 'options' => $row->details])
                        @elseif($row->type == "image")
                            <img class="img-responsive"
                                 src="{{ filter_var($dataTypeContent->{$row->field}, FILTER_VALIDATE_URL) ? $dataTypeContent->{$row->field} : Voyager::image($dataTypeContent->{$row->field}) }}">
                        @elseif($row->type == 'multiple_images')
                            @if(json_decode($dataTypeContent->{$row->field}))
                                @foreach(json_decode($dataTypeContent->{$row->field}) as $file)
                                    <img class="img-responsive"
                                         src="{{ filter_var($file, FILTER_VALIDATE_URL) ? $file : Voyager::image($file) }}">
                                @endforeach
                            @else
                                <img class="img-responsive"
                                     src="{{ filter_var($dataTypeContent->{$row->field}, FILTER_VALIDATE_URL) ? $dataTypeContent->{$row->field} : Voyager::image($dataTypeContent->{$row->field}) }}">
                            @endif
                        @elseif($row->type == 'relationship')
                             @include('voyager::formfields.relationship', ['view' => 'read', 'options' => $row->details])
                        @elseif($row->type == 'select_dropdown' && property_exists($row->details, 'options') &&
                                !empty($row->details->options->{$dataTypeContent->{$row->field}})
                        )
                            <?php echo $row->details->options->{$dataTypeContent->{$row->field}};?>
                        @elseif($row->type == 'select_multiple')
                            @if(property_exists($row->details, 'relationship'))

                                @foreach(json_decode($dataTypeContent->{$row->field}) as $item)
                                    {{ $item->{$row->field}  }}
                                @endforeach

                            @elseif(property_exists($row->details, 'options'))
                                @if (!empty(json_decode($dataTypeContent->{$row->field})))
                                    @foreach(json_decode($dataTypeContent->{$row->field}) as $item)
                                        @if (@$row->details->options->{$item})
                                            {{ $row->details->options->{$item} . (!$loop->last ? ', ' : '') }}
                                        @endif
                                    @endforeach
                                @else
                                    {{ __('voyager::generic.none') }}
                                @endif
                            @endif
                        @elseif($row->type == 'date' || $row->type == 'timestamp')
                            @if ( property_exists($row->details, 'format') && !is_null($dataTypeContent->{$row->field}) )
                                {{ \Carbon\Carbon::parse($dataTypeContent->{$row->field})->formatLocalized($row->details->format) }}
                            @else
                                {{ $dataTypeContent->{$row->field} }}
                            @endif
                        @elseif($row->type == 'checkbox')
                            @if(property_exists($row->details, 'on') && property_exists($row->details, 'off'))
                                @if($dataTypeContent->{$row->field})
                                <span class="label label-info">{{ $row->details->on }}</span>
                                @else
                                <span class="label label-primary">{{ $row->details->off }}</span>
                                @endif
                            @else
                            {{ $dataTypeContent->{$row->field} }}
                            @endif
                        @elseif($row->type == 'color')
                            <span class="badge badge-lg" style="background-color: {{ $dataTypeContent->{$row->field} }}">{{ $dataTypeContent->{$row->field} }}</span>
                        @elseif($row->type == 'coordinates')
                            @include('voyager::partials.coordinates')
                        @elseif($row->type == 'rich_text_box')
                            @include('voyager::multilingual.input-hidden-bread-read')
                            {!! $dataTypeContent->{$row->field} !!}
                        @elseif($row->type == 'file')
                            @if(json_decode($dataTypeContent->{$row->field}))
                                @foreach(json_decode($dataTypeContent->{$row->field}) as $file)
                                    <a href="{{ Storage::disk(config('voyager.storage.disk'))->url($file->download_link) ?: '' }}">
                                        {{ $file->original_name ?: '' }}
                                    </a>
                                    <br/>
                                @endforeach
                            @else
                                <a href="{{ Storage::disk(config('voyager.storage.disk'))->url($row->field) ?: '' }}">
                                    {{ __('voyager::generic.download') }}
                                </a>
                            @endif
                        @else
                            @include('voyager::multilingual.input-hidden-bread-read')
                            <p>{{ $dataTypeContent->{$row->field} }}</p>
                        @endif
                    </div><!-- panel-body -->
                    @if(!$loop->last)
                        <hr style="margin:0;">
                    @endif
                @endforeach

            </div>
        </div>
        <!-- Desde Aquí la parte geográfica -->
        <div class="col-sm-9" style="background-color:lavenderblush;">
            <div class="panel panel-bordered" style="padding-bottom:5px;">
                
                <div class="panel-body" style="padding-top:4; height: 600px; ">
                    <div id="map" ></div>
                    <script>
	                   
                        
                        var map = L.map('map', {
                            center: [-16.805, -65.446],
                            zoom: 6,
                            
                            });
                        var osm = new L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png').addTo(map);
	                    var satMutant = L.gridLayer.googleMutant({maxZoom: 24,type: "satellite",});
                        var hybridMutant = L.gridLayer.googleMutant({maxZoom: 24,type: "hybrid",});

                        var punto = L.marker([{{$dataTypeContent->latitude}}, {{$dataTypeContent->longitude}}])
                        .bindPopup("{{$dataTypeContent->nombre}} <figure><img src={{Voyager::Image($dataTypeContent->fotografia)}}></figure>").addTo(map);

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
            
            </div>
        </div>

    </div>
</div>

@stop


