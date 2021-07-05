<?php

namespace Database\Factories;

use App\Models\Materia;
use Illuminate\Database\Eloquent\Factories\Factory;

class MateriaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Materia::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre_materia' => $this->faker->sentence(),
            'clave_materia' => $this->faker->randomNumber($nbDigits = NULL, $strict = false),
            'id_user' => '1',
            'descripcion' => $this->faker->paragraph(),
            'cantUni' => $this->faker->numberBetween($min=1, $max=10),
            'maxAlu' => $this->faker->numberBetween($min=10,$max=50),
            //'deleteAt' => $this->faker->date($format = 'Y-m-d'),
        ];
    }
}
