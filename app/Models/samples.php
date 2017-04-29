<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class samples
 * @package App\Models
 * @version April 26, 2017, 9:23 am UTC
 */
class samples extends Model
{
    use SoftDeletes;

    public $table = 'samples';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'material',
        'color',
        'processing',
        'date',
        'photo',
        'barcode'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'material' => 'string',
        'color' => 'string',
        'processing' => 'string',
        'date' => 'date',
        'photo' => 'string',
        'barcode' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'material' => 'required',
        'color' => 'required',
        'processing' => 'required',
        'barcode' => 'required'
    ];

    
}
