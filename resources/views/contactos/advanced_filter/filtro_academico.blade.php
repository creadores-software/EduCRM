<h3 class="page-header" style="padding-left: 20px">Información Académica</h3>
       
<div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#universitario">Historial Universitario</a></li>
         <li><a data-toggle="tab" href="#escolar">Historial Escolar</a></li>   
    </ul>                        
</div>
<div class="tab-content">   
    <div id="universitario" class="tab-pane fade in active">
       <!-- Entidad Id Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('entidad_id', __('models/informacionesAcademicas.fields.entidad_id').':') !!}
            <select name="universidadEntidades[]" id="universidadEntidades" class="form-control" multiple="multiple">
                @if(!empty($segmento))
                    @foreach (old('universidadEntidades[]', $segmento->universidadEntidades,null) as $id)
                        <option value="{{ $id }}" selected="selected">{{ App\Models\Entidades\Entidad::find($id)->nombre }} </option>
                    @endforeach
                @endif 
            </select> 
        </div>
        
        <!-- Formacion Id Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('formacion_id', __('models/informacionesAcademicas.fields.formacion_id').':') !!}
            <select name="universidadFormaciones[]" id="universidadFormaciones" class="form-control"  multiple="multiple">
                @if(!empty($segmento))
                    @foreach (old('universidadFormaciones[]', $segmento->universidadFormaciones,null) as $id)
                        <option value="{{ $id }}" selected="selected">{{ App\Models\Formaciones\Formacion::find($id)->nombre }} </option>
                    @endforeach
                @endif         
            </select> 
        </div>
        
        <!-- Finalizado Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('finalizado', __('models/informacionesAcademicas.fields.finalizado').':') !!}
            {!! Form::select('universidadFinalizado',[''=>'TODOS',1=>'SI',0=>'NO'], old('universidadFinalizado'), ['class' => 'form-control','id'=>'universidadFinalizado']) !!}
        </div>
        
        <!-- Fecha de Grado -->
        <div class="form-group col-sm-6">
            {!! Form::label('universidadFechaGrado', 'Fecha de Grado:') !!}
            <div class="row">
                <div class="col-sm-6">
                    <input id="universidadFechaInicialGrado" name="universidadFechaInicialGrado" type="text" placeholder="Desde" value="{{ old('universidadFechaInicialGrado',$segmento->universidadFechaInicialGrado ?? '' ) }}" class="form-control pull-right">
                </div>
                <div class="col-sm-6">
                    <input id="universidadFechaFinalGrado" name="universidadFechaFinalGrado" type="text" placeholder="Hasta" value="{{ old('universidadFechaFinalGrado',$segmento->universidadFechaFinalGrado ?? '' ) }}" class="form-control pull-right">
                </div>
            </div>
        </div>
    </div>   
    <div id="escolar" class="tab-pane fade">   
        <!-- Entidad Id Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('entidad_id', __('models/informacionesEscolares.fields.entidad_id').':') !!}
            <select name="colegioEntidades[]" id="colegioEntidades" class="form-control" multiple="multiple">
                @if(!empty($segmento))
                    @foreach (old('colegioEntidades[]', $segmento->colegioEntidades,null) as $id)
                        <option value="{{ $id }}" selected="selected">{{ App\Models\Entidades\Entidad::find($id)->nombre }} </option>
                    @endforeach
                @endif
            </select> 
        </div>
        
        <!-- Nivel Educativo Id Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('nivel_educativo_id', __('models/informacionesEscolares.fields.nivel_educativo_id').':') !!}
            <select name="colegioNivelesFormacion[]" id="colegioNivelesFormacion" class="form-control" multiple="multiple">
                @if(!empty($segmento))
                @foreach (old('colegioNivelesFormacion[]', $segmento->colegioNivelesFormacion,null) as $id)
                    <option value="{{ $id }}" selected="selected">{{ App\Models\Formaciones\NivelFormacion::find($id)->nombre }} </option>
                @endforeach
            @endif
            </select> 
        </div>
        
        <!-- Finalizado Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('finalizado', __('models/informacionesEscolares.fields.finalizado').':') !!}
            {!! Form::select('colegioFinalizado',[''=>'TODOS',1=>'SI', 0=>'NO'], old('colegioFinalizado'), ['class' => 'form-control','id'=>'colegioFinalizado']) !!}
        </div>
        
        <!-- Fecha de Grado -->
        <div class="form-group col-sm-6">
            {!! Form::label('colegioFechaGrado', 'Fecha de Grado:') !!}
            <div class="row">
                <div class="col-sm-6">
                    <input id="colegioFechaInicialGrado" name="colegioFechaInicialGrado" type="text" placeholder="Desde" value="{{ old('colegioFechaInicialGrado',$segmento->colegioFechaInicialGrado ?? '' ) }}" class="form-control pull-right">
                </div>
                <div class="col-sm-6">
                    <input id="colegioFechaFinalGrado" name="colegioFechaFinalGrado" type="text" placeholder="Hasta" value="{{ old('colegioFechaFinalGrado',$segmento->colegioFechaFinalGrado ?? '' ) }}" class="form-control pull-right">
                </div>
            </div>
        </div>                       
    </div>
  </div> 


@push('scripts')
    <script type="text/javascript">
        $('#universidadFechaInicialGrado').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: false,
            locale: 'es',
        });
        $('#universidadFechaFinalGrado').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: false,
            locale: 'es',
        });
        $('#colegioFechaInicialGrado').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: false,
            locale: 'es',
        });
        $('#colegioFechaFinalGrado').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: false,
            locale: 'es',
        });        
        $('#universidadEntidades').change(function(){
            $('#universidadFormaciones').val(null).trigger('change');
        }); 
        $(document).ready(function() { 
            $('#universidadFinalizado').select2(); 
            $('#universidadEntidades').select2({
                tags: true,
                multiple: true,
                tokenSeparators: [','],
                placeholder: "Seleccionar",
                allowClear: true,
                createTag: function(params) {return undefined;},
                ajax: {
                    url: '{{ route("entidades.entidades.dataAjax") }}',
                    dataType: 'json',
                    data: function (params) {  
                        return {
                            q: params.term, 
                            es_ies: 1,
                        };
                    },
                },
            });
            $('#universidadFormaciones').select2({
                tags: true,
                multiple: true,
                tokenSeparators: [','],
                placeholder: "Seleccionar",
                allowClear: true,
                createTag: function(params) {return undefined;},
                ajax: {
                    url: '{{ route("formaciones.formaciones.dataAjax") }}',
                    dataType: 'json',
                    data: function (params) {  
                        entidades_seleccionadas = $('#universidadEntidades').val();
                        if($('#universidadEntidades').val()=== ''){
                            entidades_seleccionadas='n';    
                        }
                        console.log('Las entidades seleccionadas son:');
                        console.log(entidades_seleccionadas);
                        return {
                            q: params.term, 
                            entidad: entidades_seleccionadas,
                        };
                    },
                },
            }); 

            $('#colegioFinalizado').select2();
            $('#colegioEntidades').select2({
                tags: true,
                multiple: true,
                tokenSeparators: [','],
                placeholder: "Seleccionar",
                allowClear: true,
                createTag: function(params) {return undefined;},
                ajax: {
                    url: '{{ route("entidades.entidades.dataAjax") }}',
                    dataType: 'json',
                    data: function (params) {  
                        return {
                            q: params.term, 
                            es_colegio: 1,
                        };
                    },
                },
            }); 
            $('#colegioNivelesFormacion').select2({
                tags: true,
                multiple: true,
                tokenSeparators: [','],
                placeholder: "Seleccionar",
                allowClear: true,
                createTag: function(params) {return undefined;},
                ajax: {
                    url: '{{ route("formaciones.nivelesFormacion.dataAjax") }}',
                    dataType: 'json',
                    data: function (params) {  
                        return {
                            q: params.term, 
                            es_ies: 0,
                        };
                    },
                },
            });           
        });
    </script>
@endpush
