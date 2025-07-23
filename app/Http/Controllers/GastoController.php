<?php

namespace App\Http\Controllers;

use App\Models\Gasto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GastoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dados = Gasto::all();
        return view('home', compact('dados'));  
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cadastrar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dados = new Gasto();
        $dados->descricao = $request->input('descricao');
        $dados->valor = $request->input('valor');
        $dados->data = $request->input('data');
        $dados->categoria = $request->input('categoria');
        $dados->formaPag = $request->input('formaPag');
        $dados->save();
        return redirect('/gasto')->with('success', 'Novo gasto cadastrado com sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dados = Gasto::find($id);
        if (isset($dados)) {
            return view('editar', compact('dados'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dados = Gasto::find($id);
        if (isset($dados)) {
            $dados->descricao = $request->input('descricao');
            $dados->valor = $request->input('valor');
            $dados->data = $request->input('data');
            $dados->categoria = $request->input('categoria');
            $dados->formaPag = $request->input('formaPag');
            $dados->save();
            return redirect('/gasto')->with('success', 'Gasto atualizado com sucesso.');
        }
        return redirect('/gasto')->with('danger', 'Erro ao atualizar gasto');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dados = Gasto::find($id);
        if (isset($dados)) {
            $dados->delete();
            return redirect('/gasto')->with('success', 'Gasto deletado com sucesso.');
        }
        return redirect('/gasto')->with('danger', 'Erro ao deletar gasto.');
    }

    public function procurarGasto(Request $request)
    {
        $nome = $request->input('descricao');
        $dados = DB::table('gastos')
            ->select('id', 'descricao', 'valor', 'data', 'categoria', 'formaPag')
            ->where(DB::raw('lower(descricao)'), 'like', '%' . strtolower($nome) . '%')
            ->get(); 
        return view('exibir', compact('dados'));
    }
}
