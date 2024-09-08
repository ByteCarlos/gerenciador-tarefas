<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TarefaController extends Controller
{
    
    public function index() : View
    {   
        $tarefas = Tarefa::all();

        return view('tarefas.index', compact('tarefas'));
    }

    public function create() : View
    {
        return view('tarefas.create');
    }

    public function store(Request $request) : RedirectResponse
    {
        $request->validate([
            'titulo' => 'required',
            'descricao' => 'required',
        ]);

        Tarefa::create($request->all());

        return redirect()->route('tarefas.index')->with('success', 'Tarefa criada com sucesso.');
    }

    public function show(Tarefa $tarefa) : View
    {
        return view('tarefas.show', compact('tarefa'));
    }

    public function edit(Tarefa $tarefa) : View
    {
        return view('tarefas.edit', compact('tarefa'));
    }

    public function update(Request $request, Tarefa $tarefa) : RedirectResponse
    {
        $request->validate([
            'titulo' => 'required',
            'descricao' => 'required',
        ]);

        if($tarefa->update($request->all())) {
            return redirect()->route('tarefas.index')->with('success', 'Tarefa atualizada com sucesso.');
        }

        return redirect()->route('tarefas.index')->with('error', 'Ocorreu um erro ao atualizar a tarefa.');
    }

    public function destroy(Tarefa $tarefa) : RedirectResponse
    {
        if($tarefa->delete()) {
            return redirect()->route('tarefas.index')->with('success', 'Tarefa excluída com sucesso.');
        }
        
        return redirect()->route('tarefas.index')->with('error', 'Ocorreu um erro ao tentar excluir a tarefa.');  
    }
}
