<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Imovel;

class ImoveisTableSeeder extends Seeder
{
    public function run()
    {
        Imovel::create([
            'titulo' => 'Apartamento Luxuoso',
            'descricao' => 'Apartamento de luxo com 3 quartos e vista para o mar.',
            'tipo_imovel' => 'Apartamento',
            'categorias' => json_encode(['Luxuoso', 'Vista para o mar']),
            'valor' => 1200000.00,
            'corretor_id' => 1,
        ]);

        Imovel::create([
            'titulo' => 'Casa de Campo',
            'descricao' => 'Casa espaçosa com jardim e piscina.',
            'tipo_imovel' => 'Casa',
            'categorias' => json_encode(['Campo', 'Piscina']),
            'valor' => 800000.00,
            'corretor_id' => 2,
        ]);

        Imovel::create([
            'titulo' => 'Sala Comercial',
            'descricao' => 'Sala comercial no centro da cidade.',
            'tipo_imovel' => 'Comercial',
            'categorias' => json_encode(['Centro', 'Comercial']),
            'valor' => 500000.00,
            'corretor_id' => 3,
        ]);
    }
}
