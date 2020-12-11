<h2 class="page-header">Log de auditoria</h2>

@section('css')
    @include('layouts.datatables_css')
@endsection

<table id="datatable" class="table table-striped table-bordered" style="width:100%" >
    <thead>
      <tr>
        <th scope="col">Acción</th>
        <th scope="col">Usuario</th>
        <th scope="col">Fecha</th>
        <th scope="col">Atributo</th>
        <th scope="col">Valor nuevo</th>
        <th scope="col">Valor antiguo</th>
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
              @foreach($audit->new_values as $attribute => $value)
                <tr><td><b>{{ $attribute }}</b></td></tr>
              @endforeach
            </table>
          </td>
          <td>
            <table class="table">
              @foreach($audit->new_values as $attribute => $value)
                <tr><td>{{ empty($value)? '(sin valor)':$value }}</td></tr>
              @endforeach
            </table>
          </td>
          <td>
            <table class="table">
              @foreach($audit->old_values as $attribute => $value)
                <tr><td>{{ empty($value)? '(sin valor)':$value }}</td></tr>
              @endforeach
            </table>
          </td>
          
        </tr>
      @endforeach
    </tbody>
  </table>

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