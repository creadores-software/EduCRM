<?php

namespace App\Repositories;

use Illuminate\Container\Container as Application;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


abstract class BaseRepository
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * @var Application
     */
    protected $app;

    /**
     * @param Application $app
     *
     * @throws \Exception
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
        $this->makeModel();
    }

    /**
     * Get searchable fields array
     *
     * @return array
     */
    abstract public function getFieldsSearchable();

    /**
     * Configure the Model
     *
     * @return string
     */
    abstract public function model();

    /**
     * Make Model instance
     *
     * @throws \Exception
     *
     * @return Model
     */
    public function makeModel()
    {
        $model = $this->app->make($this->model());

        if (!$model instanceof Model) {
            throw new \Exception("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");
        }

        return $this->model = $model;
    }

    /**
     * Paginate records for scaffold.
     *
     * @param int $perPage
     * @param array $columns
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginate($perPage, $columns = ['*'])
    {
        $query = $this->allQuery();

        return $query->paginate($perPage, $columns);
    }

    /**
     * Build a query for retrieving all records.
     *
     * @param array $search
     * @param int|null $skip
     * @param int|null $limit
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function allQuery($search = [], $skip = null, $limit = null)
    {
        $query = $this->model->newQuery();

        if (count($search)) {
            foreach($search as $key => $value) {
                if (in_array($key, $this->getFieldsSearchable())) {
                    $query->where($key, $value);
                }
            }
        }

        if (!is_null($skip)) {
            $query->skip($skip);
        }

        if (!is_null($limit)) {
            $query->limit($limit);
        }

        return $query;
    }

    /**
     * Retrieve all records with given filter criteria
     *
     * @param array $search
     * @param int|null $skip
     * @param int|null $limit
     * @param array $columns
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all($search = [], $skip = null, $limit = null, $columns = ['*'])
    {
        $query = $this->allQuery($search, $skip, $limit);

        return $query->get($columns);
    }

    /**
     * Create model record
     *
     * @param array $input
     *
     * @return Model
     */
    public function create($input)
    {
        $model = $this->model->newInstance($input);

        $model->save();

        return $model;
    }

    /**
     * Find model record for given id
     *
     * @param int $id
     * @param array $columns
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|Model|null
     */
    public function find($id, $columns = ['*'])
    {
        $query = $this->model->newQuery();

        return $query->find($id, $columns);
    }

    /**
     * Update model record for given id
     *
     * @param array $input
     * @param int $id
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|Model
     */
    public function update($input, $id)
    {
        $query = $this->model->newQuery();

        $model = $query->findOrFail($id);

        $model->fill($input);

        $model->save();

        return $model;
    }

    /**
     * @param int $id
     *
     * @throws \Exception
     *
     * @return bool|mixed|null
     */
    public function delete($id)
    {
        $query = $this->model->newQuery();

        $model = $query->findOrFail($id);

        return $model->delete();
    }


     /**
     * Información para select básicos 
     * @throws \Exception
     */
    public function infoSelect()
    {
        $list = $this->all()->pluck('nombre', 'id');
        $list->prepend('-- Seleccionar --');
        return $list;
    }

    /**
     * Información para select2 con términos de búsqueda 
     * @throws \Exception
     */
    public function infoSelect2($term,$search=null,$join=[],$orSearch=null,$order=[],$name=null,$page=null,$customWhere=null)
    {
        //DB::enableQueryLog();
        $query = $this->model->newQuery();  

        if(!empty($join) && is_array($join)){
            if(is_array($join[0])){
                foreach($join as $jo) {
                    $query->leftjoin($jo[0],$jo[1],$jo[2],$jo[3]);                   
                }
            }else{
                $query->leftjoin($join[0],$join[1],$join[2],$join[3]);    
            }            
        }

        if (!empty($search)) {
            foreach($search as $key => $value) {
                if(is_array($value)){
                    $query->whereIn($key, $value);
                }else{
                    $query->where($key, $value);
                }                
            }
        }

        if (!empty($orSearch)) {
            foreach($orSearch as $key => $value) {
                if(is_array($value)){
                    $query->whereIn($key, $value, 'or');
                }else{
                    $query->orWhere($key, $value);
                }                
            }
        }        

        if(empty($name)){
            $name = $this->model->table.'.nombre';
        }
        $name_alias= DB::raw($name." as text");
        $name_select= DB::raw($name);

        if (!empty($customWhere)) {        
            $query->whereRaw($customWhere[0],$customWhere[1]);
        }else{
            $query->where($name_select, 'LIKE', '%'.$term.'%');  
        }
        
        if(empty($order)){
            $query->orderBy($this->model->table.'.nombre', 'ASC');
        }else{
            $query->orderBy($order[0], $order[1]);    
        }     


        if(!empty($page)){
            $coincidentes = $query->get([$this->model->table.'.id', $name_alias]);
            $resultCount = 10;
            $offset = ($page - 1) * $resultCount;
            $query->take($resultCount);
            $query->skip($offset); 
            $count = Count($coincidentes);            
            $endCount = $offset + $resultCount;
            $morePages = $count > $endCount;
        }
        
        $resultado = $query->get([$this->model->table.'.id', $name_alias]);
        //dd(DB::getQueryLog()); 

        if(!empty($page)){            
            return [
                'results' => $resultado,
                "more" => $morePages
            ];
        }else{
            return ['results' => $resultado];
        }
    }

    /**
     * Información para select2 con términos de búsqueda 
     * @throws \Exception
     */
    public function count($search=null)
    {
        $query = $this->model->newQuery();
        if ($search!=null) {
            foreach($search as $key => $value) {
                if (in_array($key, $this->getFieldsSearchable())) {
                    $query->where($key, $value);
                }
            }
        }
        $count = $query->count();
        return $count;
    }
}
