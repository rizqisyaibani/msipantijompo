<?php

namespace App\Repositories;

use App\Models\Individu;
use App\Repositories\BaseRepository;

/**
 * Class IndividuRepository
 * @package App\Repositories
 * @version January 4, 2022, 3:08 am UTC
*/

class IndividuRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nik',
        'nama_lengkap',
        'kondisi_fisik',
        'alamat'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Individu::class;
    }
}
