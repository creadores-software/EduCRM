{!! Form::open(['route' => ['contactos.informacionesLaborales.destroy', $id], 'method' => 'delete']) !!}
{!! Form::hidden('idContacto',$idContacto) !!}
<div class='btn-group'>
    <a href="{{ route('contactos.informacionesLaborales.show', [$id,'idContacto'=>$idContacto]) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
    @can('contactos.informacionesLaborales.editar')
    <a href="{{ route('contactos.informacionesLaborales.edit', [$id,'idContacto'=>$idContacto]) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-pencil"></i>
    </a>
    @endcan
    @can('contactos.informacionesLaborales.eliminar')
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => 'return confirm("'.__('crud.are_you_sure').'")'
    ]) !!}
    @endcan
</div>
{!! Form::close() !!}
