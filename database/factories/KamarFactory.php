<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Kamar;

class KamarFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Kamar::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_kamar' => $this->faker->word,
            'jum_kamar' => rand(5, 10),
            'harga_kamar' => $this->faker->numberBetween(300000, 700000),
            'deskripsi_kamar' => $this->faker->paragraph,
        ];
    }
}
