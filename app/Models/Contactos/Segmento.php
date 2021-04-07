<?php

namespace App\Models\Contactos;

use Illuminate\Database\Eloquent\Model;
use Altek\Accountant\Contracts\Recordable;

/**
 * Class Segmento
 * @package App\Models\Contactos
 * @version February 17, 2021, 10:01 am -05
 *
 * @property \App\Models\Contactos\User $usuario
 * @property string $nombre
 * @property string $descripcion
 * @property array $filtros
 * @property boolean $global
 * @property integer $usuario_id
 */
class Segmento extends Model implements Recordable
{

    public $table = 'segmento';
    
    public $timestamps = false;

    use \Altek\Accountant\Recordable;

    public $fillable = [
        'nombre',
        'descripcion',
        'filtros',
        'global',
        'usuario_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'descripcion' => 'string',
        'filtros' => 'array',
        'global' => 'boolean',
        'usuario_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required|string|max:100',
        'descripcion' => 'required|string|max:255',
        'filtros' => 'required|array|min:1',
        'filtros.*' => 'required',
        'global' => 'nullable|boolean',
        'usuario_id' => 'nullable'
    ];

    /**
     * Se sobreescribe el método con el fin de limpiar 
     * los campos vacios
     */
    public function save(array $options = [])
    {
        $filtros = [];        
        foreach ($this->filtros as $array_item) {
            if (!is_null($array_item['campo'])) {
                $filtros[] = $array_item;
            }
        }
        $this->attributes['filtros'] = json_encode($filtros);
        parent::save($options);       
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function usuario()
    {
        return $this->belongsTo(\App\User::class, 'usuario_id')
            ->withDefault(['nombre' => '']);
    }
}
