<?php

namespace App\Http\Controllers\Admin;

use App\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaBreadcrumb = json_encode([
            ["titulo" => "Home", "url" => route('home')],
            ["titulo" => "Lista de Usuários", "url" => ""]
        ]);

        $listaModelo =  User::select('id', 'name', 'email')->paginate(10);
        return view('admin.usuarios.index', compact('listaBreadcrumb','listaModelo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all(); //Recupera Dados

        //Validação de Dados
        $validacao = \Validator::make($data, [
            "name"     => 'required|string|max:255',
            "email"    => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        if ($validacao->fails()) { // Se a calidação falhar
            return redirect()->back()->withErrors($validacao)->withInput();// Retorna pra página anterior com os erros e os inputs
        }

        $data['password'] = bcrypt($data['password']);

        User::create($data); // Salva os dados no BD
        return redirect()->back(); // Volta para a página anterior
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return User::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $data = $request->all(); //Recupera Dados

        //Validação de Dados
        $validacao = \Validator::make($data, [
            "name"     => 'required|string|max:255',
            "email"    => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        if ($validacao->fails()) { // Se a calidação falhar
            return redirect()->back()->withErrors($validacao)->withInput();// Retorna pra página anterior com os erros e os inputs
        }

        User::find($id)->update($data); // Salva os dados no BD
        return redirect()->back(); // Volta para a página anterior
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->back();
    }
}
