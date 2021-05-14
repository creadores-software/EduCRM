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
                <div class="form-group col-sm-6">
                    <!-- Campania Id Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::label('campania_id', __('models/oportunidades.fields.campania_id').':') !!}
                        <select name="campania_id" id="campania_id" class="form-control">
                            <option></option>
                            @if(!empty(old('campania_id', $oportunidad->campania_id ?? '' )))
                                <option value="{{ old('campania_id', $oportunidad->campania_id ?? '' ) }}" selected> {{ App\Models\Campanias\Campania::find(old('campania_id', $oportunidad->campania_id ?? '' ))->nombre }} </option>
                            @endif
                        </select>
                    </div>   
                    <!-- Responsable Id Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::label('responsable_id', __('models/oportunidades.fields.responsable_id').':') !!}
                        <select name="responsable_id" id="responsable_id" class="form-control">
                            <option></option>
                            @if(!empty(old('responsable_id', $oportunidad->responsable_id ?? '' )))
                                <option value="{{ old('responsable_id', $oportunidad->responsable_id ?? '' ) }}" selected> {{ App\Models\Admin\User::find(old('responsable_id', $oportunidad->responsable_id ?? '' ))->name }} </option>
                            @endif
                        </select>
                    </div>               
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="/js/chart.js"></script>
    
    <script type="text/javascript"> 
        const labels = ["Correo electrónico", "Llamada", "Reunión presencial", "Videoconferencia"];
        const data = {
            labels: labels,
            datasets:[
                {
                    label: 'Realizadas',
                    data: [25, 29, 13, 15, 5, 3],               
                    backgroundColor: "#AE7",
                },
                {
                    label: 'Pendientes',
                    data: [10, 9, 3, 5, 2, 3],
                    backgroundColor: "#EE7",
                },
                {
                    label: 'No efectivas',
                    data: [10, 9, 3, 5, 2, 3],
                    backgroundColor: "#FAA",
                }
            ]
        };

        const config = {
            type: 'bar',
            data: data,
            options: {
                plugins: {
                    title: {
                        display: true,
                        text: 'Interacciones por estado'
                    },
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
        };

    window.onload = function() {
        var ctx = document.getElementById("chart-area").getContext("2d");
        window.myDoughnut = new Chart(ctx, config);
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

