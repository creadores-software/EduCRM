@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">
            Reporte
        </h1>        
    </section>
    <div class="content">
        <div class="clearfix"></div>
        @include('flash::message')
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <div id="canvas-holder" class="form-group col-sm-6">
                    <canvas id="chart-area" height="300" width="350"></canvas>
                </div>
                {!! Form::open(['route' => 'reportes.funnel']) !!}               
                <div class="form-group col-sm-6">
                    <div id="mensaje-seleccion" class="form-group col-sm-12 alert alert-info">
                        <p>Es necesario elegir una campaña</p>
                    </div>
                    <!-- Campania Id Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::label('campania_id', __('models/oportunidades.fields.campania_id')) !!}
                        <select name="campania_id" id="campania_id" class="form-control">
                            <option></option>
                            @if(!empty($campania))
                                <option value="{{ $campania->id}}" selected> {{ $campania->nombre }} </option>
                            @endif
                        </select>
                    </div>   
                    <!-- Responsable Id Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::label('responsable_id', __('models/oportunidades.fields.responsable_id')) !!}
                        <select name="responsable_id" id="responsable_id" class="form-control">
                            <option></option>
                            @if(!empty($responsable))
                                <option value="{{ $responsable->id}}" selected> {{ $responsable->name }} </option>
                            @endif
                        </select>
                    </div>
                    <!-- Submit Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::submit('Filtrar', ['class' => 'btn btn-primary']) !!}
                    </div>                
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="/js/funnel/chart.funnel.bundled.js"></script>
    
    <script type="text/javascript">
         var labels = @json($labels);
        var dataset = @json($dataset);

    window.onload = function() {
        var area = document.getElementById("chart-area").getContext("2d");
        window.chart = new Chart(area, {
            type: 'funnel',
            data: {
                datasets: dataset,
                labels: labels
            },
            options: {
                responsive: true,
                sort: 'desc',
                legend: {
                    position: 'top'
                },
                title: {
                    display: true,
                    text: 'Estados por oportunidad - Funnel de venta'
                },
                animation: {
                    animateScale: true,
                    animateRotate: true
                }
            }
        });
        $('#campania_id').select2({
            placeholder: "Seleccionar",
            allowClear: true,
            ajax: {
                url: '{{ route("campanias.campanias.dataAjax") }}',
                dataType: 'json',
            },
        });
        $('#responsable_id').select2({
            placeholder: "Seleccionar",
            allowClear: true,
            ajax: {
                url: '{{ route("admin.users.dataAjax") }}',
                dataType: 'json',
                data: function (params) {  
                    //La campaña determinará los equipos
                    campania = $("[name='campania_id']").val();
                    return {
                        q: params.term, 
                        page: params.page || 1,
                        campania: campania,
                    };
                },
                processResults: function (data) {
                    return {
                        results: data.results,
                        pagination: {
                            more: data.more
                        }
                    };
                }
            },
        });

        $(document).on('change', '#campania_id', function(e){
            if($("#campania_id").val()!=""){
                $("#mensaje-seleccion").hide();
            }else{
                $("#mensaje-seleccion").show();   
            }
        });
    }
    </script>
@endpush


