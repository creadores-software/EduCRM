<div class="modal" tabindex="-1" role="dialog" id="advanced_filter">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="row">
                    {!! Form::open(['route' => 'home']) !!} 
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
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="botonFiltrar" class="btn btn-primary" type="submit">Filtrar</button>
            </div>
        </div>
    </div>
</div>