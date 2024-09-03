<?php

namespace Database\Factories;

use App\Models\Corretor;
use App\Models\Imovel;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImovelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Imovel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'titulo' => $this->faker->sentence(3),
            'descricao' => $this->faker->paragraph(),
            'tipo_imovel' => $this->faker->randomElement(['Casa', 'Apartamento', 'Comercial', 'Terreno']),
            'categorias' => $this->faker->randomElements(['Venda', 'Aluguel', 'Temporada'], rand(1, 3)),
            'valor' => $this->faker->optional()->randomFloat(2, 50000, 1000000),
            'corretor_id' => Corretor::factory(), // Assuming you have a Corretor factory
        ];
    }
}
