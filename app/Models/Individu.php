<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Individu
 * @package App\Models
 * @version January 4, 2022, 3:08 am UTC
 *
 * @property string $nik
 * @property string $nama_lengkap
 * @property string $kondisi_fisik
 * @property string $alamat
 */
class Individu extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'individus';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nik',
        'nama_lengkap',
        'kondisi_fisik',
        'alamat'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nik' => 'string',
        'nama_lengkap' => 'string',
        'kondisi_fisik' => 'string',
        'alamat' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nik' => 'required',
        'nama_lengkap' => 'required',
        'kondisi_fisik' => 'required'
    ];

    
}
