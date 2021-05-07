{!! Form::open(['route' => ['contactos.informacionesUniversitarias.destroy', $id], 'method' => 'delete']) !!}
{!! Form::hidden('idContacto',$idContacto) !!}
<div class='btn-group'>
    <a href="{{ route('contactos.informacionesUniversitarias.show', [$id,'idContacto'=>$idContacto]) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
    @can('contactos.informacionesUniversitarias.editar')
    <a href="{{ route('contactos.informacionesUniversitarias.edit', [$id,'idContacto'=>$idContacto]) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-pencil"></i>
    </a>
    @endcan
    @can('contactos.informacionesUniversitarias.eliminar')
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => 'return confirm("'.__('crud.are_you_sure').'")'
    ]) !!}
    @endcan
</div>
{!! Form::close() !!}
