<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Filme;

class FilmeController extends Controller
{
    public function index()
    {
        try {
            $filmes = Filme::all();
            return response()->json($filmes);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            $filme = Filme::with('avaliacoes.user')->findOrFail($id);
            return response()->json($filme);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'genero' => 'required|string|max:255',
            'ano_lancamento' => 'required|integer',
            'diretor' => 'required|string|max:255',
            'elenco' => 'required|string',
            'sinopse' => 'required|string',
        ]);

        $filme = new Filme([
            'titulo' => $request->titulo,
            'genero' => $request->genero,
            'ano_lancamento' => $request->ano_lancamento,
            'diretor' => $request->diretor,
            'elenco' => $request->elenco,
            'sinopse' => $request->sinopse,       
        ]);

        $filme->save();

        return response()->json(['message' => 'Filme adicionado com sucesso!'], 201);
    }
}