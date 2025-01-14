<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Imovel;
use App\Models\Corretor;
use Illuminate\Support\Str;

class ImovelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $corretores = Corretor::all();

        if ($corretores->isEmpty()) {
            $corretor = Corretor::create([
                'email' => 'corretor@example.com',
                'senha' => bcrypt('password'),
                'nome' => 'John Doe',
            ]);

            $corretores = collect([$corretor]);
        }

        $imoveisPerCorretor = 10;

        foreach ($corretores as $corretor) {
            for ($i = 1; $i <= $imoveisPerCorretor; $i++) {
                Imovel::create([
                    'titulo' => "Imóvel {$i} de {$corretor->nome}",
                    'descricao' => "Descrição do Imóvel {$i} de {$corretor->nome}",
                    'tipo_imovel' => 'Casa',
                    'categorias' => 'Residencial',
                    'valor' => rand(100000, 500000),
                    'corretor_id' => $corretor->id,
                ]);
            }
        }
    }
}
