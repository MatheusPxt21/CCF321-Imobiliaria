<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imovel extends Model
{
    use HasFactory;

    protected $table = 'imoveis';

    protected $fillable = [
        'titulo',
        'descricao',
        'tipo_imovel',
        'categorias',
        'valor',
        'corretor_id',
    ];

    protected $casts = [
        'categorias' => 'array',
    ];

    public function imagens()
    {
        return $this->hasMany(Imagem::class, 'imovel_id');
    }
}
