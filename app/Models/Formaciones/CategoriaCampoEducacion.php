<?php

namespace App\Models\Formaciones;

use \Illuminate\Database\Eloquent\Model;
use Altek\Accountant\Contracts\Recordable;

/**
 * Class CategoriaCampoEducacion
 * @package App\Models\Formaciones
 * @version November 19, 2020, 10:51 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $campoEducacions
 * @property string $nombre
 */
class CategoriaCampoEducacion extends Model implements Recordable
{

    public $table = 'categoria_campo_educacion';
    
    public $timestamps = false;

    use \Altek\Accountant\Recordable;

    public $fillable = [
        'nombre'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required|string|max:150'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function campoEducacions()
    {
        return $this->hasMany(\App\Models\Formaciones\CampoEducacion::class, 'categoria_campo_educacion_id');
    }
}
