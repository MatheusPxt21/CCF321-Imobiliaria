<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagem extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'imagens';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'imovel_id',
        'caminho_imagem',
    ];

    /**
     * Get the imovel that owns the imagem.
     */
    public function imovel()
    {
        return $this->belongsTo(Imovel::class);
    }
}
