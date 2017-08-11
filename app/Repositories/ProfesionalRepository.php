<?php

namespace App\Repositories;

use App\Models\Profesional;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProfesionalRepository
 * @package App\Repositories
 * @version August 10, 2017, 2:40 am UTC
 *
 * @method Profesional findWithoutFail($id, $columns = ['*'])
 * @method Profesional find($id, $columns = ['*'])
 * @method Profesional first($columns = ['*'])
*/
class ProfesionalRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'Apellido',
        'imagen',
        'especialidad'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Profesional::class;
    }
}
