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
                    <canvas id="chart-area" width="400" height="300"></canvas>
                </div>
                {!! Form::open(['route' => 'reportes.interacciones']) !!}
                    <div class="form-group col-sm-6">
                        <!-- Campania Id Field -->
                        <div class="form-group col-sm-12">
                            {!! Form::label('campania_id', __('models/oportunidades.fields.campania_id')) !!}
                            <select name="campania_id" id="campania_id" class="form-control">
                                <option></option>
                                @if(!empty($campania))
                                    <option value="{{ $campania->id }}" selected> {{ $campania->nombre }} </option>
                                @endif
                            </select>
                        </div>   
                        <!-- Responsable Id Field -->
                        <div class="form-group col-sm-12">
                            {!! Form::label('responsable_id', __('models/oportunidades.fields.responsable_id')) !!}
                            <select name="responsable_id" id="responsable_id" class="form-control">
                                <option></option>
                                @if(!empty($responsable))
                                    <option value="{{ $responsable->id }}" selected> {{ $responsable->name }} </option>
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
    <script src="/js/chart.js"></script>
    
    <script type="text/javascript"> 
        var labels = @json($labels);
        var dataset = @json($dataset);

        const footer = (tooltipItems) => {
            let sum = 0;
            tooltipItems.forEach(function(tooltipItem) {
                sum += tooltipItem.parsed.y;
            });
            return 'Total: ' + sum;
        };

        window.onload = function() {
        var area = document.getElementById("chart-area").getContext("2d");
        window.chart = new Chart(area, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: dataset
            },
            options: {
                plugins: {
                    title: {
                        display: true,
                        text: 'Interacciones por estado'
                    },
                    tooltip: {
                        callbacks: {
                        footer: footer,
                        }
                    }
                },
                responsive: true,
                scales: {
                    x: {
                        stacked: true,
                    },
                    y: {
                        stacked: true
                    }
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
        };
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
    </script>
@endpush


