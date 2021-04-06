{!! Form::hidden('contacto_id',$idContacto) !!}
{!! Form::hidden('idContacto',$idContacto) !!}
{!! Form::hidden('id', old('id', $informacionEscolar->id ?? '')) !!}

<!-- Entidad Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('entidad_id', __('models/informacionesEscolares.fields.entidad_id').':') !!}
    <select name="entidad_id" id="entidad_id" class="form-control">
        <option></option>
        @if(!empty(old('entidad_id', $informacionEscolar->entidad_id ?? '' )))
            <option value="{{ old('entidad_id', $informacionEscolar->entidad_id ?? '' ) }}" selected> {{ App\Models\Entidades\Entidad::find(old('entidad_id', $informacionEscolar->entidad_id ?? '' ))->nombre }} </option>
        @endif
    </select> 
</div>

<!-- Nivel Educativo Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nivel_educativo_id', __('models/informacionesEscolares.fields.nivel_educativo_id').':') !!}
    <select name="nivel_educativo_id" id="nivel_educativo_id" class="form-control">
        <option></option>
        @if(!empty(old('nivel_educativo_id', $informacionEscolar->nivel_educativo_id ?? '' )))
            <option value="{{ old('nivel_educativo_id', $informacionEscolar->nivel_educativo_id ?? '' ) }}" selected> {{ App\Models\Formaciones\NivelFormacion::find(old('nivel_educativo_id', $informacionEscolar->nivel_educativo_id ?? '' ))->nombre }} </option>
        @endif
    </select> 
</div>

<!-- Finalizado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('finalizado', __('models/informacionesEscolares.fields.finalizado').':') !!}
    {!! Form::select('finalizado',[1=>'SI', 0=>'NO'], old('finalizado'), ['class' => 'form-control']) !!}
</div>

<!-- Fecha Inicio Field -->
<div id="div_fecha_inicio" class="form-group col-sm-6">
    {!! Form::label('fecha_inicio', __('models/informacionesEscolares.fields.fecha_inicio').':') !!}
    <div class="input-group date">
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>
        <input id="fecha_inicio" name="fecha_inicio" type="text" placeholder="AAAA-MM-DD" value="{{ old('fecha_inicio',$informacionEscolar->fecha_inicio ?? '' ) }}" class="form-control pull-right">
    </div>
</div>

<!-- Fecha Grado Field -->
<div id="div_fecha_grado" class="form-group col-sm-6">
    {!! Form::label('fecha_grado', __('models/informacionesEscolares.fields.fecha_grado').':') !!}
    <div class="input-group date">
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>
        <input id="fecha_grado" name="fecha_grado" type="text" placeholder="AAAA-MM-DD" value="{{ old('fecha_grado',$informacionEscolar->fecha_grado ?? '' ) }}" class="form-control pull-right">
    </div>
</div>

<!-- Grado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('grado', __('models/informacionesEscolares.fields.grado').':') !!}
    {!! Form::text('grado', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('contactos.informacionesEscolares.index',['idContacto'=>$idContacto]) }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>

@push('scripts')
    <script type="text/javascript">
        $('#fecha_inicio').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: false,
            locale: 'es',
        });
        $('#fecha_grado').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: false,
            locale: 'es',
        });
        $('#finalizado').change(function(){
           if($('#finalizado').val()==1){
                $('#div_fecha_grado').show();   
           }else{ 
                $('#div_fecha_grado').hide();      
           }
        }); 
        $(document).ready(function() { 
            if($('#finalizado').val()==1){
                $('#div_fecha_grado').show();   
           }else{ 
                $('#div_fecha_grado').hide();      
           }
            $('#finalizado').select2(); 
            $('#entidad_id').select2({
                placeholder: "Seleccionar",
                allowClear: true,
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
            $('#nivel_educativo_id').select2({
                placeholder: "Seleccionar",
                allowClear: true,
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
