<?php

namespace Database\Factories;

use App\Models\Individu;
use Illuminate\Database\Eloquent\Factories\Factory;

class IndividuFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Individu::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nik' => $this->faker->word,
        'nama_lengkap' => $this->faker->word,
        'kondisi_fisik' => $this->faker->word,
        'alamat' => $this->faker->text,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
