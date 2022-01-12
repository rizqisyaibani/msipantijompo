<?php

namespace App\Repositories;

use App\Models\Keluarga;
use App\Repositories\BaseRepository;

/**
 * Class KeluargaRepository
 * @package App\Repositories
 * @version January 12, 2022, 4:15 pm UTC
*/

class KeluargaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nomor',
        'individu_id',
        'peran'
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
        return Keluarga::class;
    }
}
