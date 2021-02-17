<?php

namespace App\Models\Contactos;

use Eloquent as Model;

/**
 * Class Segmento
 * @package App\Models\Contactos
 * @version February 17, 2021, 10:01 am -05
 *
 * @property \App\Models\Contactos\User $usuario
 * @property string $nombre
 * @property string $descripcion
 * @property string $filtros
 * @property boolean $global
 * @property integer $usuario_id
 */
class Segmento extends Model
{

    public $table = 'segmento';
    
    public $timestamps = false;

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
        'filtros' => 'required|array',
        'global' => 'nullable|boolean',
        'usuario_id' => 'nullable'
    ];

    //Método para eliminar atributos con valor nulo
    public function setPropertiesAttribute($value)
    {
        $filtros = [];

        foreach ($value as $array_item) {
            if (!is_null($array_item['key'])) {
                $filtros[] = $array_item;
            }
        }

        $this->attributes['filtros'] = json_encode($filtros);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function usuario()
    {
        return $this->belongsTo(\App\User::class, 'usuario_id');
    }
}
