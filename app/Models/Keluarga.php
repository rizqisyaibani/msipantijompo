<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Keluarga
 * @package App\Models
 * @version January 12, 2022, 4:15 pm UTC
 *
 * @property string $nomor
 * @property int $individu_id
 * @property string $peran
 */
class Keluarga extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'keluargas';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nomor',
        'individu_id',
        'peran'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nomor' => 'string',
        'peran' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nomor' => 'required',
        'individu_id' => 'required',
        'peran' => 'required'
    ];

    
}
