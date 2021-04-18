{!! Form::open(['route' => ['contactos.segmentos.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('contactos.segmentos.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
    @can('contactos.segmentos.editar')
    <a href="{{ route('contactos.segmentos.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-edit"></i>
    </a>
    @endcan
    @can('contactos.segmentos.crear')
    <a gloss="Duplicar" href="{{ route('contactos.segmentos.duplicar', ['id'=>$id]) }}" class='mytooltip btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-duplicate"></i>
    </a>
    @endcan
    @can('contactos.segmentos.eliminar')
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => 'return confirm("'.__('crud.are_you_sure').'")'
    ]) !!}
    @endcan
</div>
{!! Form::close() !!}
