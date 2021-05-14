{!! Form::open(['route' => ['campanias.tiposCampania.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a gloss="Estados" href="{{ route('campanias.tiposCampaniaEstados.index', ['idTipo'=>$id]) }}" class='mytooltip btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-filter"></i>
    </a>
    <a href="{{ route('campanias.tiposCampania.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
    @can('campanias.tiposCampania.editar')
    <a href="{{ route('campanias.tiposCampania.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-pencil"></i>
    </a>    
    @endcan    
    @can('campanias.tiposCampania.eliminar')
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => 'return confirm("'.__('crud.are_you_sure').'")'
    ]) !!}
    @endcan
</div>
{!! Form::close() !!}
