<?php

namespace App\DataTables\Contactos;

use App\Models\Contactos\Parentesco;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;
use Illuminate\Support\Facades\DB;

class ParentescoDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        $request=$this->request();     

        $idContacto=false;
        if ($request->has('idContacto')) {
            $idContacto=$request->get('idContacto');
        }

        return $dataTable
        ->editColumn('acudiente', function ($row){
            return $row->acudiente? 'Si':'No';
        }) 
        ->addColumn('action', function($row) use ($idContacto){
            $id=$row->id;
            return view('contactos.parentescos.datatables_actions', 
            compact('id','idContacto'));
        }) 
        ->filterColumn('contacto_destino', function($query, $keyword) {
            $query->whereRaw('CONCAT(pariente.nombres," ",pariente.apellidos) like ?', ["%{$keyword}%"]);
        }) 
        ->filterColumn('acudiente', function ($query, $keyword) {
            $validacion=null;
            if(strpos(strtolower($keyword), 's')!==false){
                $validacion=1; 
                $query->whereRaw("acudiente = ?", [$validacion]);   
            }else if(strpos(strtolower($keyword), 'n')!==false){
                $validacion=0;
                $query->whereRaw("acudiente = ?", [$validacion]);    
            }else{
                $query->whereRaw("acudiente = 3"); //Ninguno    
            }                
        })      
        ->filter(function ($query) use ($request) {
            if (!$request->has('idContacto')) {
                return;
            }else{
                $query->whereRaw("contacto_origen = ?", [$request->get('idContacto')]);   
            }            
        });    
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Parentesco $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Parentesco $model)
    {
        return $model::leftjoin('contacto as pariente', 'parentesco.contacto_destino', '=', 'pariente.id')
            ->leftjoin('tipo_parentesco as tipoParentesco', 'parentesco.tipo_parentesco_id', '=', 'tipoParentesco.id')
            ->select(['parentesco.id','parentesco.contacto_origen',DB::raw('CONCAT(pariente.nombres," ",pariente.apellidos) as nombre_pariente'),'tipoParentesco.nombre as nombre_tipo','acudiente'])->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        $idContacto=null;
        if ($this->request()->has("idContacto")) {
            $idContacto = $this->request()->get("idContacto");
        }

        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax(route('contactos.parentescos.index', ['idContacto' => $idContacto]))
            ->addAction(['width' => '120px', 'printable' => false, 'title' => __('crud.action')])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => false,
                'order'     => [[1, 'asc']],
                'buttons'   => [
                    [
                       'extend' => 'export',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-download"></i> ' .__('auth.app.export').''
                    ],
                ],
                 'language' => [
                   'url' => url('/js/Spanish.json'),
                 ],
                 'initComplete' => "function () {                                   
                    this.api().columns(':lt(3)').every(function () {
                        var column = this;
                        var input = document.createElement(\"input\");
                        $(input).appendTo($(column.footer()).empty())
                        .on('change', function () {
                            column.search($(this).val(), false, false, true).draw();                            
                        });
                    });
                }",
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'contacto_destino' => new Column(['title' => __('models/parentescos.fields.contacto_destino'), 'data' => 'nombre_pariente','name'=>'pariente.nombre']),
            'tipo_parentesco_id' => new Column(['title' => __('models/parentescos.fields.tipo_parentesco_id'), 'data' => 'nombre_tipo','name'=>'tipoParentesco.nombre']),
            'acudiente' => new Column(['title' => __('models/parentescos.fields.acudiente'), 'data' => 'acudiente'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'parentescos_' .  date("Ymd_His");
    }
}
