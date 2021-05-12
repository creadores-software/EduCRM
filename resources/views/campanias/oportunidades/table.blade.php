@push('css')
    @include('layouts.datatables_css')
@endpush

{!! $dataTable->table(['width' => '100%', 'class' => 'table table-striped table-bordered'],true) !!}

@push('scripts')
    @include('layouts.datatables_js')    
    <script type="text/javascript">
    var buttonCommon = {
        exportOptions: {
            format: {
                body: function ( data, row, column, node ) {
                    // Strip $ from salary column to make it numeric
                    return column === 5 ?
                        data.replace( /[$,]/g, '' ) :
                        data;
                }
            }
        }
    };
    </script>
    {!! $dataTable->scripts() !!}
@endpush