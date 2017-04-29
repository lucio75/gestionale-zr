<?php

namespace App\Repositories;

use App\Models\equipment;
use InfyOm\Generator\Common\BaseRepository;

class equipmentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description',
        'photo',
        'barcode'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return equipment::class;
    }
}
