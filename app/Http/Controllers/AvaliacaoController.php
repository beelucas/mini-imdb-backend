<?php

namespace App\Http\Controllers;

use App\Models\Avaliacao;
use Illuminate\Http\Request;

class AvaliacaoController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'filme_id' => 'required|exists:filmes,id',
            'pontuacao' => 'required|integer|min:1|max:5',
            'comentario' => 'nullable|string',
        ]);

        $avaliacao = Avaliacao::create([
            'filme_id' => $request->input('filme_id'),
            'user_id' => auth()->id(),
            'pontuacao' => $request->input('pontuacao'),
            'comentario' => $request->input('comentario'),
        ]);

        return response()->json($avaliacao, 201);
    }
}

