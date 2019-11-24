<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteRequest;
use App\Models\Cliente;
use App\Http\Resources\Cliente as ClienteResource;

use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:cliente-list');
        $this->middleware('permission:cliente-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:cliente-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:cliente-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $clientes = ClienteResource::collection(Cliente::all());
        return view('cliente.index', compact('clientes'));
    }


    public function create()
    {
        return view('cliente.create');
    }

    public function store(ClienteRequest $request)
    {
        $cliente = Cliente::create($request->all());
        return redirect()->route('cliente.index')->with('success', 'CLIENTE REGISTRADO CON EXITO!');
    }

    public function edit($id)
    {
        $cliente = new ClienteResource(Cliente::find($id));
        return view('cliente.edit', compact('cliente'));
    }

    public function update(ClienteRequest $request, $id)
    {
       Cliente::find($id)->update($request->all());
       
        return redirect()->route('cliente.index')->with('success', 'CLIENTE ACTUALIZADO CON EXITO!');
    }

    public function destroy($id)
    {
        $cliente = Cliente::find($id);
        $cliente->delete();
        return redirect()->route('cliente.index')->with('success', 'CLIENTE ELIMINADO CON EXITO!');
    }
}
