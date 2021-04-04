<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', __('models/entidades.fields.nombre').':') !!}
    <p>{{ $entidad->nombre }}</p>
</div>

<!-- Lugar Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lugar_id', __('models/entidades.fields.lugar_id').':') !!}
    <p>{{ $entidad->lugar->nombre }}</p>
</div>

<!-- Direccion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('direccion', __('models/entidades.fields.direccion').':') !!}
    <p>{{ $entidad->direccion }}</p>
</div>

<!-- Barrio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('barrio', __('models/entidades.fields.barrio').':') !!}
    <p>{{ $entidad->barrio }}</p>
</div>

<!-- Telefono Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telefono', __('models/entidades.fields.telefono').':') !!}
    <p>{{ $entidad->telefono }}</p>
</div>

<!-- Correo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('correo', __('models/entidades.fields.correo').':') !!}
    <p>{{ $entidad->correo }}</p>
</div>

<!-- Sitio Web Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sitio_web', __('models/entidades.fields.sitio_web').':') !!}
    <p>{{ $entidad->sitio_web }}</p>
</div>

<!-- Nit Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nit', __('models/entidades.fields.nit').':') !!}
    <p>{{ $entidad->nit }}</p>
</div>

<!-- Sector Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sector_id', __('models/entidades.fields.sector_id').':') !!}
    <p>{{ $entidad->sector->nombre }}</p>
</div>

<!-- Actividad Economica Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('actividad_economica_id', __('models/entidades.fields.actividad_economica_id').':') !!}
    <p>{{ $entidad->actividadEconomica->nombre }}</p>
</div>

<!-- Mi Universidad Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mi_universidad', __('models/entidades.fields.mi_universidad').':') !!}
    <p>{{ $entidad->mi_universidad? 'Si': 'No' }}</p>
</div>

<!-- Codigo Ies Field -->
<div class="form-group col-sm-6">
    {!! Form::label('codigo_ies', __('models/entidades.fields.codigo_ies').':') !!}
    <p>{{ $entidad->codigo_ies }}</p>
</div>

<!-- Acreditacion Ies Field -->
<div class="form-group col-sm-6">
    {!! Form::label('acreditacion_ies', __('models/entidades.fields.acreditacion_ies').':') !!}
    <p>{{ $entidad->acreditacion_ies }}</p>
</div>

<!-- Calendario Field -->
<div class="form-group col-sm-12">
    {!! Form::label('calendario', __('models/entidades.fields.calendario').':') !!}
    <p>{{ $entidad->calendario }}</p>
</div>


