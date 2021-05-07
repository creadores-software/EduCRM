{!! Form::open(['route' => ['formaciones.categoriasCampoEducacion.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('formaciones.categoriasCampoEducacion.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
    @can('formaciones.categoriasCampoEducacion.editar')
    <a href="{{ route('formaciones.categoriasCampoEducacion.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-pencil"></i>
    </a>
    @endcan
    @can('formaciones.categoriasCampoEducacion.eliminar')
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => 'return confirm("'.__('crud.are_you_sure').'")'
    ]) !!}
    @endcan
</div>
{!! Form::close() !!}
