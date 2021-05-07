{!! Form::open(['route' => ['formaciones.periodicidades.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('formaciones.periodicidades.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
    @can('formaciones.periodicidades.editar')
    <a href="{{ route('formaciones.periodicidades.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-pencil"></i>
    </a>
    @endif
    @can('formaciones.periodicidades.eliminar')
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => 'return confirm("'.__('crud.are_you_sure').'")'
    ]) !!}
    @endif
</div>
{!! Form::close() !!}
