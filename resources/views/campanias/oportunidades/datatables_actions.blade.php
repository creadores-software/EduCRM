{!! Form::open(['route' => ['campanias.oportunidades.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a gloss="Interacciones" href="{{ route('campanias.interacciones.index', ['idOportunidad'=>$id]) }}" class='mytooltip btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-comment"></i>
    </a>
    <a href="{{ route('campanias.oportunidades.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>    
    @if(!empty($idCampania))
        @can('campanias.oportunidades.editar')        
            <a href="{{ route('campanias.oportunidades.edit', [$id,'idCampania'=>$idCampania]) }}" class='btn btn-default btn-xs'>
                <i class="glyphicon glyphicon-pencil"></i>
            </a>       
        @endcan    
        @can('campanias.oportunidades.eliminar')
            {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
                'type' => 'submit',
                'class' => 'btn btn-danger btn-xs',
                'onclick' => 'return confirm("'.__('crud.are_you_sure').'")'
            ]) !!}
        @endcan   
    @endif
</div>
{!! Form::close() !!}
