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
@stop
<!-- Contenido-->
@section('content')
    <div class="page-content read container-fluid">
        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-bordered" style="padding-bottom:5px;">
                    <div class="panel panel-bordered" style="pandding-bottom:0;">
                        
                        <div class="col-md-3">
                            <label class="form-label"><strong>Nombre de la empresa</strong></label>
                            <input class="form-control" value="{{$dataTypeContent->user_id}}" type="text">
                        </div>

                        <div class="col-md-3">
                            <label class="form-label"><strong>Tipo de usuario</strong></label>
                            <input class="form-control" value="{{$dataTypeContent->tipo_usuario_id}}" type="text">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label"><strong>Tipo de empresa</strong></label>
                            <input class="form-control" value="{{$dataTypeContent->tipo_empresa_id}}" type="text">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label"><strong>Número de Certificado</strong></label>
                            <input class="form-control" value="{{$dataTypeContent->nro_certificado}}" type="text">
                        </div>
                        
                        <div class="col-md-3">
                            <label class="form-label"><strong>N I T</strong></label>
                            <input class="form-control" value="{{$dataTypeContent->nit}}" type="text">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label"><strong>Licencia municipal</strong></label>
                            <input class="form-control" value="{{$dataTypeContent->lic_municipal}}" type="text">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label"><strong>Representante legal</strong></label>
                            <input class="form-control" value="{{$dataTypeContent->nom_rep_legal}}" type="text">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label"><strong>Actividad Principal</strong></label>
                            <input class="form-control" value="{{$dataTypeContent->act_principal}}" type="text">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label"><strong>Departamento</strong></label>
                            <input class="form-control" value="{{$dataTypeContent->departamento_id}}" type="text">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label"><strong>Provincia</strong></label>
                            <input class="form-control" value="{{$dataTypeContent->provincia}}" type="text">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label"><strong>Municipio</strong></label>
                            <input class="form-control" value="{{$dataTypeContent->municipio}}" type="text">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label"><strong>Zona/localidad</strong></label>
                            <input class="form-control" value="{{$dataTypeContent->zona_localidad}}" type="text">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label"><strong>Calle / Avenida</strong></label>
                            <input class="form-control" value="{{$dataTypeContent->calle_av}}" type="text">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label"><strong>Clase de Sociedad</strong></label>
                            <input class="form-control" value="{{$dataTypeContent->clase_sociedad}}" type="text">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label"><strong>Propietario</strong></label>
                            <input class="form-control" value="{{$dataTypeContent->propietario}}" type="text">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label"><strong>Fecha de Fundación</strong></label>
                            <input class="form-control" value="{{$dataTypeContent->fecha_fundacion}}" type="text">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label"><strong>Vigente desde</strong></label>
                            <input class="form-control" value="{{$dataTypeContent->vigente_desde}}" type="text">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label"><strong>Vigente hasta</strong></label>
                            <input class="form-control" value="{{$dataTypeContent->vigente_hasta}}" type="text">
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label"><strong>Observaciones</strong></label>
                            <textarea class="form-control">{{$dataTypeContent->observaciones}}</textarea>
                        </div>
                        <!-- Para generar el código QR-->
                        <div>
                            {!!
                                QrCode::
                                size(200)  //defino el tamaño
                                ->eye('circle') //cambiar a circulo los ojos
                                ->eyeColor(0, 17, 7, 155, 0, 0, 0) // Cambiar de color a los ojos
                                ->eyeColor(1, 17, 7, 155, 0, 0, 0)
                                ->eyeColor(2, 17, 7, 155, 0, 0, 0)
                                ->style('round') // cambiar a redondeado
                                ->backgroundColor(137, 238, 252) //defino el fondo
                                ->margin(1)  //defino el margen
                                ->generate($dataTypeContent->user_id) /** genero el codigo qr **/
                            !!}
                        </div>
                    </div>
                    <!-- No eliminar el panel-boy-->
                    <div class="panel-body" style="panding-top:50;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Single delete modal --}}
    <div class="modal modal-danger fade" tabindex="-1" id="delete_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('voyager::generic.close') }}"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="voyager-trash"></i> {{ __('voyager::generic.delete_question') }} {{ strtolower($dataType->getTranslatedAttribute('display_name_singular')) }}?</h4>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('voyager.'.$dataType->slug.'.index') }}" id="delete_form" method="POST">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-danger pull-right delete-confirm"
                               value="{{ __('voyager::generic.delete_confirm') }} {{ strtolower($dataType->getTranslatedAttribute('display_name_singular')) }}">
                    </form>
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@stop

@section('javascript')
    @if ($isModelTranslatable)
        <script>
            $(document).ready(function () {
                $('.side-body').multilingual();
            });
        </script>
    @endif
    <script>
        var deleteFormAction;
        $('.delete').on('click', function (e) {
            var form = $('#delete_form')[0];

            if (!deleteFormAction) {
                // Save form action initial value
                deleteFormAction = form.action;
            }

            form.action = deleteFormAction.match(/\/[0-9]+$/)
                ? deleteFormAction.replace(/([0-9]+$)/, $(this).data('id'))
                : deleteFormAction + '/' + $(this).data('id');

            $('#delete_modal').modal('show');
        });

    </script>
@stop
