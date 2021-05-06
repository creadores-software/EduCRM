<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('models/users.fields.name').':') !!}
    <p>{{ $user->name }}</p>
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', __('models/users.fields.email').':') !!}
    <p>{{ $user->email }}</p>
</div>

<!-- Created At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('created_at', __('models/users.fields.created_at').':') !!}
    <p>{{ $user->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('updated_at', __('models/users.fields.updated_at').':') !!}
    <p>{{ $user->updated_at }}</p>
</div>

<!-- Permisos -->
<div class="form-group col-sm-6">
    {!! Form::label('roles', ' Roles:') !!}
    <select name="uroles[]" id="uroles" class="form-control"  multiple="multiple" disabled=true>
        @foreach (old('uroles[]', $user->roles,null) as $rol)
            <option value="{{ $rol->id }}" selected="selected">{{ $rol->name }}</option>
        @endforeach
    </select> 
</div>

<!-- Equipos -->
<div class="form-group col-sm-6">
    {!! Form::label('equipos', ' Equipos de Mercadeo:') !!}
    <select name="uEquipo[]" id="uEquipo" class="form-control"  multiple="multiple" disabled=true>
        @foreach ($user->equiposMercadeo() as $pertenencia)
            <option value="{{ $pertenencia->id }}" selected="selected">{{ $pertenencia->equipoMercadeo->nombre }}</option>
        @endforeach
    </select> 
</div>


<!-- Activo Field -->
<div class="form-group col-sm-12" >
    {!! Form::label('active', __('models/users.fields.active').':') !!}
    <p>{{ $user->active? 'Si' : 'No' }}</p>
</div>

@push('scripts')
    <script type="text/javascript">            
        $(document).ready(function() {             
            $('#uroles').select2({
                tags: true,
                multiple: true,
                tokenSeparators: [','],
            });
            $('#uEquipo').select2({
                tags: true,
                multiple: true,
                tokenSeparators: [','],
            });
        });
    </script>
@endpush


