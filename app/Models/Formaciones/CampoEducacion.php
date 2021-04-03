<?php

namespace App\Models\Formaciones;

use Eloquent as Model;
use Altek\Accountant\Contracts\Recordable;

/**
 * Class CampoEducacion
 * @package App\Models\Formaciones
 * @version November 19, 2020, 10:51 pm UTC
 *
 * @property \App\Models\Formaciones\CategoriaCampoEducacion $categoriaCampoEducacion
 * @property \Illuminate\Database\Eloquent\Collection $formacions
 * @property \Illuminate\Database\Eloquent\Collection $preferenciasCamposEducacion
 * @property integer $categoria_campo_educacion_id
 * @property string $nombre
 */
class CampoEducacion extends Model implements Recordable
{

    public $table = 'campo_educacion';
    
    public $timestamps = false;

    use \Altek\Accountant\Recordable;

    public $fillable = [
        'categoria_campo_educacion_id',
        'nombre'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'categoria_campo_educacion_id' => 'integer',
        'nombre' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'categoria_campo_educacion_id' => 'required|integer',
        'nombre' => 'required|string|max:150'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function categoriaCampoEducacion()
    {
        return $this->belongsTo(\App\Models\Formaciones\CategoriaCampoEducacion::class, 'categoria_campo_educacion_id')
            ->withDefault(['nombre' => '']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function formacions()
    {
        return $this->hasMany(\App\Models\Formaciones\Formacion::class, 'campo_educacion_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function preferenciasCamposEducacion()
    {
        return $this->hasMany(\App\Models\Formaciones\PreferenciaCampoEducacion::class, 'campo_educacion_id');
    }
}
