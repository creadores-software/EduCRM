<?php

namespace App\DataTables\Admin;

use Spatie\Permission\Models\Permission;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class PermissionDataTable extends DataTable
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

        $dataTable
        ->addColumn('action', 'admin.permissions.datatables_actions')
        ->editColumn('created_at', function ($permission){
            if(empty($permission->created_at)){
                return;
            }
            return date('Y-m-d h:i:s A', strtotime($permission->created_at));
        })
        ->editColumn('updated_at', function ($permission){
            if(empty($permission->updated_at)){
                return;
            }
            return date('Y-m-d h:i:s A', strtotime($permission->updated_at));
        });

        if($this->request()->has('action') && $this->request()->get('action')=="excel"){
             $dataTable->removeColumn('action');
        }
        return $dataTable;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Permission $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Permission $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false, 'title' => __('crud.action')])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => false,
                'order'     => [[0, 'asc']],
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
                    this.api().columns(':lt(2)').every(function () {
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
            'name' => new Column(['title' => __('models/permissions.fields.name'), 'data' => 'name']),
            'id' => new Column(['title' => 'ID', 'data' => 'id']),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'permissions_' .date("Ymd_His");
    }
}
