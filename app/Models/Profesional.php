<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Profesional
 * @package App\Models
 * @version August 10, 2017, 2:40 am UTC
 *
 * @method static Profesional find($id=null, $columns = array())
 * @method static Profesional|\Illuminate\Database\Eloquent\Collection findOrFail($id, $columns = ['*'])
 * @property string nombre
 * @property string Apellido
 * @property string imagen
 * @property string especialidad
 */
class Profesional extends Model
{
    use SoftDeletes;

    public $table = 'profesionals';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'Apellido',
        'imagen',
        'especialidad'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'Apellido' => 'string',
        'imagen' => 'string',
        'especialidad' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
