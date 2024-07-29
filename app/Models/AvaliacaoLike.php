<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvaliacaoLike extends Model
{
    use HasFactory;

    protected $fillable = [
        'avaliacao_id', 'user_id', 'like'];

    public function avaliacao()
    {
        return $this->belongsTo(Avaliacao::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
