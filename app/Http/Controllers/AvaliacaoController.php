<?php

namespace App\Http\Controllers;

use App\Models\Avaliacao;
use App\Models\AvaliacaoLike; // Corrigido: Importando a classe AvaliacaoLike do namespace correto
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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

    public function like(Request $request, $id)
    {
        try {
            $avaliacao = Avaliacao::findOrFail($id);
            $like = AvaliacaoLike::updateOrCreate(
                [
                    'avaliacao_id' => $id,
                    'user_id' => auth()->id(),
                ],
                [
                    'like' => true
                ]
            );
            Log::info('Like adicionado', ['avaliacao_id' => $id, 'user_id' => auth()->id(), 'like' => $like]);
            return response()->json($like, 200);
        } catch (\Exception $e) {
            Log::error('Erro ao adicionar like', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'Erro ao adicionar like'], 500);
        }
    }

    public function dislike(Request $request, $id)
    {
        try {
            $avaliacao = Avaliacao::findOrFail($id);
            $dislike = AvaliacaoLike::updateOrCreate(
                [
                    'avaliacao_id' => $id,
                    'user_id' => auth()->id(),
                ],
                [
                    'like' => false
                ]
            );
            Log::info('Dislike adicionado', ['avaliacao_id' => $id, 'user_id' => auth()->id(), 'dislike' => $dislike]);
            return response()->json($dislike, 200);
        } catch (\Exception $e) {
            Log::error('Erro ao adicionar dislike', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'Erro ao adicionar dislike'], 500);
        }
    }
    
    public function getLikesDislikes($id)
    {
        try {
            $avaliacao = Avaliacao::findOrFail($id);
            $likes = AvaliacaoLike::where('avaliacao_id', $id)->where('like', true)->count();
            $dislikes = AvaliacaoLike::where('avaliacao_id', $id)->where('like', false)->count();
            return response()->json([
                'likes' => $likes,
                'dislikes' => dislikes,
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }
}

