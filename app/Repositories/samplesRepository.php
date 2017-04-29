<?php

namespace App\Repositories;

use App\Models\samples;
use InfyOm\Generator\Common\BaseRepository;

class samplesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'material',
        'color',
        'processing',
        'date',
        'photo',
        'barcode'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return samples::class;
    }
}
