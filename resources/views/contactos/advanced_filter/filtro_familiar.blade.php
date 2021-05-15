<!-- Tipo Parentesco Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo_parentesco_id', 'Rol familiar:') !!}
    <select name="parentescoTipos[]" id="parentescoTipos" class="form-control">
    </select> 
</div>

<!-- Acudiente Field -->
<div class="form-group col-sm-6">
    {!! Form::label('acudiente', __('models/parentescos.fields.acudiente')) !!}
    {!! Form::select('parentescoAcudiente',[''=>'TODOS',1=>'SI',0=>'NO'], old('parentescoAcudiente'), ['class' => 'form-control','id'=>'parentescoAcudiente']) !!}
</div>

<!-- Cantidad hijos -->
<div class="form-group col-sm-6">
    {!! Form::label('cantidad', 'Cantidad hijos:') !!}
    <div class="row">
        <div class="col-sm-6">
            {!! Form::text('cantidadHijosMinimo', null, ['class' => 'form-control','placeholder'=>'Desde','id'=>'cantidadHijosMinimo']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::text('cantidadHijosMaximo', null, ['class' => 'form-control','placeholder'=>'Hasta','id'=>'cantidadHijosMaximo']) !!}
        </div>
    </div>
</div>

<!-- Edad hijos -->
<div class="form-group col-sm-6">
    {!! Form::label('edad', 'Edad hijos:') !!}
    <div class="row">
        <div class="col-sm-6">
            {!! Form::text('edadMinimaHijos', null, ['class' => 'form-control','placeholder'=>'Desde','id'=>'edadMinimaHijos']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::text('edadMaximaHijos', null, ['class' => 'form-control','placeholder'=>'Hasta','id'=>'edadMaximaHijos']) !!}
        </div>
    </div>
</div>

@push('scripts')
    <script type="text/javascript">      
        $(document).ready(function() {  
            $('#parentescoAcudiente').select2(); 
            $('#parentescoTipos').select2({
                tags: true,
                multiple: true,
                tokenSeparators: [','],
                placeholder: "Seleccionar",
                allowClear: true,
                createTag: function(params) {return undefined;},
                ajax: {
                    url: '{{ route("parametros.tiposParentesco.dataAjax") }}',
                    dataType: 'json',
                },
            });              
        }); 
    </script>
@endpush
