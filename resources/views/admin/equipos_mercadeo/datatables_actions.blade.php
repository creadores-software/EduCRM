{!! Form::open(['route' => ['admin.equiposMercadeo.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('admin.equiposMercadeo.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
    @can('admin.equiposMercadeo.editar')
    <a href="{{ route('admin.equiposMercadeo.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-pencil"></i>
    </a>
    <a gloss="Miembros" href="{{ route('admin.pertenenciasEquipoMercadeo.index', ['idEquipo'=>$id]) }}" class='mytooltip btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-user"></i>
    </a>
    @endcan
    @can('admin.equiposMercadeo.eliminar')
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => 'return confirm("'.__('crud.are_you_sure').'")'
    ]) !!}
    @endcan
</div>
{!! Form::close() !!}
