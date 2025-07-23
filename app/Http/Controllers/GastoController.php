<?php

namespace App\Http\Controllers;

use App\Models\Gasto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GastoController extends Controller
{
    public function index()
    {
        $dados = Gasto::all();
        return view('home', compact('dados'));  
    }

    public function create()
    {
        return view('cadastrar');
    }

    public function store(Request $request)
    {
        $dados = new Gasto();
        $dados->descricao = $request->input('descricao');
        
        // Tratamento do valor com vírgula
        $valor = $request->input('valor');
        $valor = str_replace(',', '.', $valor);
        $valor = preg_replace('/[^0-9\.]/', '', $valor);
        $dados->valor = floatval($valor);
        
        $dados->data = $request->input('data');
        $dados->categoria = $request->input('categoria');
        $dados->formaPag = $request->input('formaPag');
        $dados->save();

        return redirect('/gasto')->with('success', 'Novo gasto cadastrado com sucesso');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $dados = Gasto::find($id);
        if (isset($dados)) {
            return view('editar', compact('dados'));
        }
    }

    public function update(Request $request, string $id)
    {
        $dados = Gasto::find($id);
        if (isset($dados)) {
            $dados->descricao = $request->input('descricao');
            
            // Tratamento do valor com vírgula no update
            $valor = $request->input('valor');
            $valor = str_replace(',', '.', $valor);
            $valor = preg_replace('/[^0-9\.]/', '', $valor);
            $dados->valor = floatval($valor);
            
            $dados->data = $request->input('data');
            $dados->categoria = $request->input('categoria');
            $dados->formaPag = $request->input('formaPag');
            $dados->save();

            return redirect('/gasto')->with('success', 'Gasto atualizado com sucesso.');
        }
        return redirect('/gasto')->with('danger', 'Erro ao atualizar gasto');
    }

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
