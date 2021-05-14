{!! Form::open(['route' => ['campanias.interacciones.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('campanias.interacciones.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
    @can('campanias.interacciones.editar')
        @if($editable && !empty($idOportunidad))
        <a href="{{ route('campanias.interacciones.edit', $id) }}" class='btn btn-default btn-xs'>
            <i class="glyphicon glyphicon-pencil"></i>
        </a>
        @endif
    @endcan   
</div>
{!! Form::close() !!}
