@section('css')
    @include('layouts.datatables_css')
@endsection

<div class="col-sm-12">
<h2 class="page-header">Log de auditoria</h2>

<table id="datatable" class="table table-striped table-bordered" style="width:100%" >
    <thead>
      <tr>
        <th scope="col">Acción</th>
        <th scope="col">Usuario</th>
        <th scope="col">Fecha</th>
        <th scope="col">Atributos modificados</th>
      </tr>
    </thead>
    <tbody id="audits">
      @foreach($audits as $audit)
        <tr>
          <td>@lang('events.'.$audit->event)</td>
          <td>{{ $audit->user->name }}</td>
          <td>{{ $audit->created_at }}</td>
          <td>
            <table class="table">
              @if(!empty($audit->pivot))
                <tr>
                  <td><b>{{ $audit->pivot['relation'] }}</b></td>
                  <td>
                    @if(empty($audit->pivot['properties']))
                      {{'(vacío)'}}
                    @endif
                    @foreach($audit->pivot['properties'] as $property)
                      {{ $property[array_key_first($property)] }}<br/>
                    @endforeach
                  </td>
                </tr> 
              @else
              @foreach($audit->getData() as $attribute => $value)
                <tr>
                  <td><b>{{ $attribute }}</b></td>
                  <td>{{ empty($value)?'(vacío)': $value }}</td>
                </tr>
              @endforeach
              @endif
            </table>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

@push('scripts')  
  @include('layouts.datatables_js')
    <script>
        $('#datatable').DataTable({
          "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Spanish.json"
           }
        });
    </script>
@endpush