@extends('layouts.app')
@push('scripts')
<script type="text/javascript">
    localStorage.removeItem('menu_abuelo_seleccionado');
    localStorage.removeItem('menu_padre_seleccionado');
    localStorage.removeItem('menu_hijo_seleccionado');
</script>

@section('content')
@endpush
@endsection
