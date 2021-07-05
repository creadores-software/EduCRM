<div class="modal" tabindex="-1" role="dialog" id="advanced_filter">
    {!! Form::open(['route' => 'home']) !!} 
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="row">                    
                    <div class="form-group col-sm-12">                
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
                        @if($verResponsable)
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
                        @else
                            {!! Form::hidden('responsable_id', $responsable->id ??'') !!}
                        @endif             
                    </div>                    
                </div>
            </div>
            <div class="modal-footer">
                {!! Form::submit('Filtrar', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>

@push('scripts')   
    <script type="text/javascript">   
        $(document).ready(function() {
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
        });
    </script>
@endpush