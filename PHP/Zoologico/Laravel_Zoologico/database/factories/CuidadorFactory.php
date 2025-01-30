<?php

namespace Database\Factories;
use Illuminate\Support\Str;
use App\Models\Cuidador;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Titulacion;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cuidador>
 */
class CuidadorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Cuidador::class;
    public function definition(): array
    {

        $nombre = $this->faker->name;
        return [
            'name' => $nombre,
            'slug' => Str::slug($nombre),
            'id_titulacion1' => Titulacion::inRandomOrder()->first()->id,
            'id_titulacion2' => Titulacion::inRandomOrder()->first()->id,

        ];
    }
}
