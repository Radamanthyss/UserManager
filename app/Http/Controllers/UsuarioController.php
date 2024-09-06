<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use App\Http\Requests\StoreUsuarioRequest;
use App\Http\Requests\UpdateUsuarioRequest;
use Barryvdh\DomPDF\Facade\Pdf;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /* $usuarios = Usuario::collection(Usuario::where('status',true)->get()); */
        $usuarios = Usuario::where('status',true)->get();
        return view('usuario.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('usuario.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUsuarioRequest $request)
    {
        $request->validate([
            'nome' => 'required|string',
            'cpf' => 'required|string|min:11|max:11',
            'data_nascimento' => 'required|date',
            'email' => 'required|email',
            'telefone' => 'required|min:8|max:9',
            'cep' => 'required|string|min:8|max:8',
            'estado' => 'required|string|min:2',
            'cidade' => 'required|string',
            'bairro' => 'required|string',
            'endereco' => 'required|string'
        ]);

        Usuario::create([
            'nome' => $request->nome,
            'cpf' => $request->cpf,
            'data_nascimento' => $request->data_nascimento,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'cep' => $request->cep,
            'estado' => $request->estado,
            'cidade' => $request->cidade,
            'bairro' => $request->bairro,
            'endereco' => $request->endereco
        ]);

        return redirect('usuarios/create')->with('status','Usuário Criado');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('usuario.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUsuarioRequest $request, int $id)
    {
        $request->validate([
            'nome' => 'required|string',
            'cpf' => 'required|string|min:11|max:11',
            'data_nascimento' => 'required|date',
            'email' => 'required|email',
            'telefone' => 'required|min:8|max:9',
            'cep' => 'required|string|min:8|max:8',
            'estado' => 'required|string|min:2',
            'cidade' => 'required|string',
            'bairro' => 'required|string',
            'endereco' => 'required|string'
        ]);

        Usuario::findOrFail($id)->update([
            'nome' => $request->nome,
            'cpf' => $request->cpf,
            'data_nascimento' => $request->data_nascimento,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'cep' => $request->cep,
            'estado' => $request->estado,
            'cidade' => $request->cidade,
            'bairro' => $request->bairro,
            'endereco' => $request->endereco
        ]);

        return redirect()->back()->with('status','Usuário Atualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        //Conforme solicitado, não remove mas apenas muda status para inativo(false)
        $usuario = Usuario::findOrFail($id);
        $usuario->status = false;
        $usuario->save();

        return redirect()->back()->with('status','Usuário Removido');
    }

    public function export(){
        
        $data = [
            'dataAtual' => date('d/m/Y'),
            'usuarios' => Usuario::get()
        ];
        $pdf = Pdf::loadView('usuario.relatorio', $data);
        return $pdf->download('relatorio-de-usuarios.pdf');
    }
}
