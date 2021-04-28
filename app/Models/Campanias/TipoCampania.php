<?php

namespace App\Models\Campanias;

use Illuminate\Database\Eloquent\Model;
use Altek\Accountant\Contracts\Recordable;

/**
 * Class TipoCampania
 * @package App\Models\Campanias
 * @version April 24, 2021, 2:04 pm -05
 *
 * @property \Illuminate\Database\Eloquent\Collection $campania
 * @property \Illuminate\Database\Eloquent\Collection $tipoCampaniaEstados
 * @property string $nombre
 * @property string $descripcion
 */
class TipoCampania extends Model implements Recordable
{

    public $table = 'tipo_campania';
    use \Altek\Accountant\Recordable;
    
    public $timestamps = false;




    public $fillable = [
        'nombre',
        'descripcion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'descripcion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required|string|max:45',
        'descripcion' => 'nullable|string|max:191'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function campania()
    {
        return $this->hasMany(\App\Models\Campanias\Campania::class, 'tipo_campania_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function tipoCampaniaEstados()
    {
        return $this->hasMany(\App\Models\Campanias\TipoCampaniaEstados::class, 'tipo_campania_id');
    }
}
