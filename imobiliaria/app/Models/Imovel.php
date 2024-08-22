<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imovel extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'imoveis';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'titulo',
        'descricao',
        'tipo_imovel',
        'categorias',
        'valor',
        'corretor_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'categorias' => 'array',
        'valor' => 'decimal:2',
    ];

    /**
     * Get the corretor that owns the imovel.
     */
    public function corretor()
    {
        return $this->belongsTo(Corretor::class);
    }
}