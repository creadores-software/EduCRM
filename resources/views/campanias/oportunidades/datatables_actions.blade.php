{!! Form::open(['route' => ['campanias.oportunidades.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('campanias.oportunidades.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>    
    @can('campanias.oportunidades.editar')
        @if(!empty($idCampania))
            <a href="{{ route('campanias.oportunidades.edit', [$id,'idCampania'=>$idCampania]) }}" class='btn btn-default btn-xs'>
                <i class="glyphicon glyphicon-pencil"></i>
            </a>
        @endif
        @if(!empty($idContacto) && $autorizada)
        <a href="{{ route('campanias.oportunidades.edit', [$id,'idContacto'=>$idContacto]) }}" class='btn btn-default btn-xs'>
            <i class="glyphicon glyphicon-pencil"></i>
        </a>
        @endif
    @endcan
    <a gloss="Interacciones" href="{{ route('campanias.interacciones.index', ['idOportunidad'=>$id]) }}" class='mytooltip btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-comment"></i>
    </a>
    @can('campanias.oportunidades.eliminar')
        @if(!empty($idCampania))
            {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
                'type' => 'submit',
                'class' => 'btn btn-danger btn-xs',
                'onclick' => 'return confirm("'.__('crud.are_you_sure').'")'
            ]) !!}
        @endif
    @endcan   
</div>
{!! Form::close() !!}
