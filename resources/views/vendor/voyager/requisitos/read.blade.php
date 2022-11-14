@extends('voyager::master')

@section('page_header')
    <link rel="stylesheet" href="/css/image.css">
    <script src="/js/image.js"></script>
    <div class="titulo" class="col-md-12">
       DOCUMENTACIÓN PRESENTADA POR LA EMPRESA                     
    </div>
@stop
@section('content')
    <div class="page-content read container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered" style="padding-bottom:5px;">
                    <div class="panel panel-bordered" style="pandding-bottom:0;">
                        <div class="col-md-4">
                            <figure>
                                <figcaption>Certificado de registro emitido por el Ministerio de Defensa</figcaption>
                                <img src="{{Voyager::image($dataTypeContent->cert_registro)}}" alt="Certificado de registro" class="modalImg" ALIGN=CENTER/>
                                <figcaption>Fecha de Vencimiento: {{$dataTypeContent->vencimiento_registro}}</figcaption>
                                <figcaption>Tiempo de vigencia: {{ $dias_reg + 1}} dias</figcaption>
                            </figure>
                        </div>

                        <div class="col-md-4">
                            <figure>
                                <figcaption>Solicitud dirigida a la Ministra o Ministro de Defensa</figcaption>
                                <img src="{{Voyager::image($dataTypeContent->solicitud)}}" alt="Solicitud dirigida al Ministro de Defensa" class="modalImg" ALIGN=CENTER/>
                                <figcaption>.</figcaption>
                                <figcaption>.</figcaption>
                            </figure>
                        </div>

                        <div class="col-md-4">
                            <figure>
                                <figcaption>Testimonio de constitución de sociedad de la empresa</figcaption>
                                <img src="{{Voyager::image($dataTypeContent->testimonio)}}" alt="Testimonio de constitución de sociedad de la empresa" class="modalImg" ALIGN=CENTER/>
                                <figcaption>.</figcaption>
                                <figcaption>.</figcaption>
                            </figure>
                        </div>

                        <div class="col-md-4">
                            <figure>
                                <figcaption>Poder del representante legal, si corresponde</figcaption>
                                <img src="{{Voyager::image($dataTypeContent->repr_legal)}}" alt="Poder del representante legal" class="modalImg" ALIGN=CENTER/>
                                <figcaption>.</figcaption>
                                <figcaption>.</figcaption>
                            </figure>

                        </div>

                        <div class="col-md-4">
                            <figure>
                                <figcaption>Cédula de identidad o pasaporte del representante legal</figcaption>
                                <img src="{{Voyager::image($dataTypeContent->cedula_pasaporte)}}" alt="Cédula de identidad o pasaporte" class="modalImg" ALIGN=CENTER/>
                                <figcaption>.</figcaption>
                                <figcaption>.</figcaption>
                            </figure>
                        </div>
                    
                        <div class="col-md-4">
                            <figure>
                                <figcaption>Certificado único de antecedentes policiales del representante legal</figcaption>
                                <img src="{{Voyager::image($dataTypeContent->cert_feclcn_felcc)}}" alt="Certificado único de antecedentes policiales" class="modalImg" ALIGN=CENTER/>
                                <figcaption>.</figcaption>
                                <figcaption>.</figcaption>
                            </figure>
                        </div>

                        <div class="col-md-4">
                            <figure>
                                <figcaption>Certificado de antecedentes policiales internacionales, emitido por INTERPOL</figcaption>
                                <img src="{{Voyager::image($dataTypeContent->antec_interpol)}}" alt="Certificado de antecedentes policiales internacionales, emitido por INTERPOL" class="modalImg" ALIGN=CENTER/>
                                <figcaption>.</figcaption>
                                <figcaption>.</figcaption>
                            </figure>
                        </div>

                        <div class="col-md-4">
                            <figure>
                                <figcaption>Certificado de antecedentes penales del representante legal REJAP</figcaption>
                                <img src="{{Voyager::image($dataTypeContent->rejap)}}" alt="Certificado de antecedentes penales del representante legal" class="modalImg" ALIGN=CENTER/>
                                <figcaption>.</figcaption>
                                <figcaption>.</figcaption>
                            </figure>
                        </div>

                        <div class="col-md-4">
                            <figure>
                                <figcaption>Licencia de funcionamiento o padrón municipal otorgado por el GAM</figcaption>
                                <img src="{{Voyager::image($dataTypeContent->licen_func)}}" alt="Licencia de funcionamiento o padrón municipal otorgado por el Gobierno Autónomo Municipal" class="modalImg" ALIGN=CENTER/>
                                <figcaption>Fecha de Vencimiento: {{$dataTypeContent->vencimiento_lic}}</figcaption>
                                <figcaption>Tiempo de vigencia: {{ $dias_lic + 1}} dias</figcaption>
                            </figure>
                        </div>
                        <div class="col-md-4">
                            <figure>
                                <figcaption>Certificado del Número de Identificación Tributaria – NIT</figcaption>
                                <img src="{{Voyager::image($dataTypeContent->nit)}}" alt="Certificado del Número de Identificación Tributaria – NIT" class="modalImg" ALIGN=CENTER/>
                                <figcaption>.</figcaption>
                                <figcaption>.</figcaption>
                            </figure>
                        </div>

                        <div class="col-md-4">
                            <figure>
                                <figcaption>Certificado del Servicio Plurinacional de Registro de Comercio - SEPREC– NIT</figcaption>
                                <img src="{{Voyager::image($dataTypeContent->seprec)}}" alt="Servicio Plurinacional de Registro de Comercio - SEPREC" class="modalImg" ALIGN=CENTER/>
                                <figcaption>Fecha de Vencimiento: {{$dataTypeContent->vencimiento_seprec}}</figcaption>
                                <figcaption>Tiempo de vigencia: {{ $dias_seprec + 1}} dias</figcaption>
                            </figure>
                        </div>

                        <div class="col-md-4">
                            <figure>
                                <figcaption>Croquis de ubicación del domicilio de la empresa y de sus depósitos</figcaption>
                                <img src="{{Voyager::image($dataTypeContent->croquis_empresa)}}" alt="Croquis de ubicación del domicilio de la empresa" class="modalImg" ALIGN=CENTER/>
                                <figcaption>.</figcaption>
                                <figcaption>.</figcaption>
                            </figure>
                        </div>

                        <div class="col-md-4">
                            <figure>
                                <figcaption>Boleta de depósito bancario, en cuenta fiscal del Ministerio de Defensa</figcaption>
                                <img src="{{Voyager::image($dataTypeContent->boleta_deposito)}}" alt="Boleta de depósito bancario" class="modalImg" ALIGN=CENTER/>
                                <figcaption>.</figcaption>
                                <figcaption>.</figcaption>
                            </figure>
                        </div>

                        <div class="col-md-4">
                            <figure>
                                <figcaption>Registro y licencia para la importación de fuegos artificiales o pirotécnicos;</figcaption>
                                <img src="{{Voyager::image($dataTypeContent->licen_pirotecnicos)}}" alt="Registro y licencia para actividades con sustancias peligrosas" class="modalImg" ALIGN=CENTER/>
                                <figcaption>.</figcaption>
                                <figcaption>.</figcaption>
                            </figure>
                        </div>

                        <div class="col-md-4">
                            <figure>
                                <figcaption>Pólizas de seguro vigentes por el periodo registrado, de responsabilidad civil. que incluya cobertura del personal de la escolta militar</figcaption>
                                <img src="{{Voyager::image($dataTypeContent->poliza_seguro)}}" alt="Pólizas de seguro vigentes por el periodo registrado, de responsabilidad civil" class="modalImg" ALIGN=CENTER/>
                                <figcaption>Fecha de Vencimiento: {{$dataTypeContent->vencimiento_poliza}}</figcaption>
                                <figcaption>Tiempo de vigencia: {{ $dias_poliza + 1}} dias</figcaption>
                            </figure>
                        </div>

                        <div class="col-md-4">
                            <figure>
                                <figcaption>Certificado de la Autoridad de Fiscalización y Control de Cooperativas</figcaption>
                                <img src="{{Voyager::image($dataTypeContent->resolicion_afcor)}}" alt="Certificado de la Autoridad de Fiscalización y Control de Cooperativas" class="modalImg" ALIGN=CENTER/>
                                <figcaption>En caso de pertenecer a la AFCOOP</figcaption>
                                <figcaption>.</figcaption>
                            </figure>
                        </div>

                        <div  class="col-md-8">
                            <label  class="form-label"><strong>Observaciones</strong></label>
                            <textarea class="form-control">{{$dataTypeContent->observaciones}}</textarea>
                        </div>
                        <div  class="row">
                         
                        </div>
  
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection