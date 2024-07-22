<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filme extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo', 'genero', 'ano_lancamento', 'diretor', 'elenco', 'sinopse',
    ];

    public function avaliacoes()
    {
        return $this->hasMany(Avaliacao::class);
    }
}