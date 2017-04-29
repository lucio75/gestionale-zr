<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class equipment
 * @package App\Models
 * @version April 27, 2017, 8:52 am UTC
 */
class equipment extends Model
{
    use SoftDeletes;

    public $table = 'equipment';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'description',
        'photo',
        'barcode'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'description' => 'string',
        'photo' => 'string',
        'barcode' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'description' => 'required',
        'barcode' => 'required'
    ];

    
}
