@extends('layouts.app')

@push('css')
    @include('layouts.datatables_css')
@endpush

@section('content')
<section class="content-header">
    <h1 class="pull-left">
        CRM - Universidad Autónoma de Manizales
    </h1>        
</section>
<div class="content">
    <div class="clearfix"></div>
    @include('flash::message')
    <div class="clearfix"></div>
    <div class="box box-primary">
        <div class="box-body row">
            
            <div class="col-lg-4 col-xs-6">
                <div class="small-box bg-red">
                <div class="inner text-center">
                    <h3>2</h3>  
                    <p>Interacciones atrasadas</p>
                </div>             
                <a href="#" class="small-box-footer">Ver detalles <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-xs-6">
                <div class="small-box bg-yellow">
                <div class="inner text-center">
                    <h3>4</h3>  
                    <p>Interacciones próximas a vencer</p>
                </div>             
                <a href="#" class="small-box-footer">Ver detalles <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-xs-6">
                <div class="small-box bg-green">
                <div class="inner text-center">
                    <h3>25/30</h3>  
                    <p>Interacciones realizadas esta semana</p>
                </div>              
                <a href="#" class="small-box-footer">Ver detalles <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="form-group col-sm-12">
                <!-- Campania Id Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('campania_id', __('models/oportunidades.fields.campania_id').':') !!}
                    <select name="campania_id" id="campania_id" class="form-control">
                        <option></option>
                        @if(!empty(old('campania_id', $oportunidad->campania_id ?? '' )))
                            <option value="{{ old('campania_id', $oportunidad->campania_id ?? '' ) }}" selected> {{ App\Models\Campanias\Campania::find(old('campania_id', $oportunidad->campania_id ?? '' ))->nombre }} </option>
                        @endif
                    </select>
                </div>   
                <!-- Responsable Id Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('responsable_id', __('models/oportunidades.fields.responsable_id').':') !!}
                    <select name="responsable_id" id="responsable_id" class="form-control">
                        <option></option>
                        @if(!empty(old('responsable_id', $oportunidad->responsable_id ?? '' )))
                            <option value="{{ old('responsable_id', $oportunidad->responsable_id ?? '' ) }}" selected> {{ App\Models\Admin\User::find(old('responsable_id', $oportunidad->responsable_id ?? '' ))->name }} </option>
                        @endif
                    </select>
                </div>               
            </div>
            
            
            <div class="col-lg-4 col-xs-12">
                <div class="box-body row">
                    <div class="box-header text-center">
                        <h3 class="box-title">Actividades para hoy</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="prueba" class="table table-striped table-bordered dataTable">
                        <tbody>
                        <tr>
                            <th>Hora</th>
                            <th width="150px">Detalle</th>
                            <th>Acción</th>
                        </tr>
                        <tr style="color:#00a65a">
                            <td>08:00 am</td>
                            <td>Llamada: Valentina Londoño Marin</td>
                            <td>
                                <div class="btn-group">
                                    <a href="#" class="btn btn-default btn-xs">
                                        <i class="glyphicon glyphicon-eye-open"></i>
                                    </a>
                                        <a href="#" class="btn btn-default btn-xs">
                                        <i class="glyphicon glyphicon-pencil"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr style="color:#dd4b39">
                            <td>10:30 am</td>
                            <td>Videoconferencia: Miriam Marin</td>
                            <td>
                                <div class="btn-group">
                                    <a href="#" class="btn btn-default btn-xs">
                                        <i class="glyphicon glyphicon-eye-open"></i>
                                    </a>
                                        <a href="#" class="btn btn-default btn-xs">
                                        <i class="glyphicon glyphicon-pencil"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>12:30 am</td>
                            <td>Mensaje: Pedro Perez</td>
                            <td>
                                <div class="btn-group">
                                    <a href="#" class="btn btn-default btn-xs">
                                        <i class="glyphicon glyphicon-eye-open"></i>
                                    </a>
                                        <a href="#" class="btn btn-default btn-xs">
                                        <i class="glyphicon glyphicon-pencil"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>                        
                        </tbody></table>
                        <div>
                            <ul class="pagination pagination-sm no-margin pull-right">
                              <li><a href="#">«</a></li>
                              <li><a href="#">1</a></li>
                              <li><a href="#">2</a></li>
                              <li><a href="#">3</a></li>
                              <li><a href="#">»</a></li>
                            </ul>
                        </div>
                    </div>                    
                </div>
            </div> 


            <div class="col-lg-4 col-xs-12">
                <div class="box-body row">
                    <div class="box-header text-center">
                        <h3 class="box-title">Contactos por última actualización</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="prueba" class="table table-striped table-bordered dataTable">
                        <tbody>
                        <tr>
                            <th>Días</th>
                            <th>Estado</th>
                            <th>Nombre</th>
                            <th>Acción</th>
                        </tr>
                        <tr style="color:#dd4b39">
                            <td>30</td>
                            <td>Inscrito</td>
                            <td>Patricia Villamil</td>
                            <td>
                                <div class="btn-group">
                                    <a href="#" class="btn btn-default btn-xs">
                                        <i class="glyphicon glyphicon-pencil"></i>
                                    </a>
                                        <a href="#" class="btn btn-default btn-xs">
                                        <i class="glyphicon glyphicon-comment"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>20</td>
                            <td>Proceso</td>
                            <td>Carlos Hernández</td>
                            <td>
                                <div class="btn-group">
                                    <a href="#" class="btn btn-default btn-xs">
                                        <i class="glyphicon glyphicon-pencil"></i>
                                    </a>
                                        <a href="#" class="btn btn-default btn-xs">
                                        <i class="glyphicon glyphicon-comment"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Prospecto</td>
                            <td>Fernando Londoño</td>
                            <td>
                                <div class="btn-group">
                                    <a href="#" class="btn btn-default btn-xs">
                                        <i class="glyphicon glyphicon-pencil"></i>
                                    </a>
                                        <a href="#" class="btn btn-default btn-xs">
                                        <i class="glyphicon glyphicon-comment"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>                        
                        </tbody></table>
                        <div>
                            <ul class="pagination pagination-sm no-margin pull-right">
                              <li><a href="#">«</a></li>
                              <li><a href="#">1</a></li>
                              <li><a href="#">2</a></li>
                              <li><a href="#">3</a></li>
                              <li><a href="#">»</a></li>
                            </ul>
                        </div>
                    </div>
                    
                </div>
            </div> 

            <div class="col-lg-4 col-xs-12">
                <div class="box-body row">
                    <div class="box-header text-center">
                        <h3 class="box-title">Campañas abiertas</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="prueba" class="table table-striped table-bordered dataTable">
                        <tbody>
                        <tr>
                            <th>Nombre</th>
                            <th>Acción</th>
                        </tr>
                        <tr>
                            <td>Estudiantes antiguos 2021-03</td>
                            <td>
                                <div class="btn-group">
                                    <a href="#" class="btn btn-default btn-xs">
                                        <i class="glyphicon glyphicon-eye-open"></i>
                                    </a>
                                        <a href="#" class="btn btn-default btn-xs">
                                        <i class="glyphicon glyphicon-user"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Estudiantes nuevos 2021-03</td>
                            <td>
                                <div class="btn-group">
                                    <a href="#" class="btn btn-default btn-xs">
                                        <i class="glyphicon glyphicon-eye-open"></i>
                                    </a>
                                        <a href="#" class="btn btn-default btn-xs">
                                        <i class="glyphicon glyphicon-user"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Idiomas 2021-02</td>
                            <td>
                                <div class="btn-group">
                                    <a href="#" class="btn btn-default btn-xs">
                                        <i class="glyphicon glyphicon-eye-open"></i>
                                    </a>
                                        <a href="#" class="btn btn-default btn-xs">
                                        <i class="glyphicon glyphicon-user"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>                        
                        </tbody></table>
                        <div>
                            <ul class="pagination pagination-sm no-margin pull-right">
                              <li><a href="#">«</a></li>
                              <li><a href="#">1</a></li>
                              <li><a href="#">2</a></li>
                              <li><a href="#">3</a></li>
                              <li><a href="#">»</a></li>
                            </ul>
                        </div>
                    </div>
                    
                </div>
            </div> 
        </div> 
    </div>     
    </div>
</div>
@endsection

@push('scripts')
    <script src="/js/funnel/chart.funnel.bundled.js"></script>
    
    <script type="text/javascript">
        
    window.onload = function() {
        $('#campania_id').select2({
                placeholder: "Seleccionar",
                allowClear: true,
                ajax: {
                    url: '{{ route("campanias.campanias.dataAjax") }}',
                    dataType: 'json',
                },
            });
        };
        $('#responsable_id').select2({
                placeholder: "Seleccionar",
                allowClear: true,
                ajax: {
                    url: '{{ route("admin.users.dataAjax") }}',
                    dataType: 'json',
                    data: function (params) {  
                       //La campaña determinará los equipos
                       campania = $("[name='campania_id']").val();
                       return {
                            q: params.term, 
                            page: params.page || 1,
                            campania: campania,
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: data.results,
                            pagination: {
                                more: data.more
                            }
                        };
                    }
                },
            });
    </script>
@endpush
