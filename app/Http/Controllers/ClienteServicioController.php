<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteServicioRequest;
use App\Models\Cliente;
use App\Models\ClienteServicio;
use App\Models\Servicio;
use Illuminate\Http\Request;
use App\Http\Resources\ClienteServicio as ClienteServicioResource;


class ClienteServicioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:especial-list');
        $this->middleware('permission:especial-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:especial-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:especial-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $especiales = ClienteServicioResource::collection(ClienteServicio::all());
        return view('cliente_servicio.index', compact('especiales'));
    }


    public function create()
    {
        $clientes = Cliente::all();
        $servicios = Servicio::all();
        return view('cliente_servicio.create', compact('clientes', 'servicios'));
    }

    public function store(ClienteServicioRequest $request)
    {
        $cliente = Cliente::find($request->cliente_id);
        $cliente->servicios()->attach($request->servicio_id, ['precio' => $request->precio]);
        return redirect()->route('especial.index')->with('success', 'SERVICIO ESPECIAL REGISTRADO CON EXITO!');
    }

    public function edit($id)
    {
        $especial = new ClienteServicioResource(ClienteServicio::find($id));
        $clientes = Cliente::all();
        $servicios = Servicio::all();
        return view('cliente_servicio.edit', compact('clientes', 'servicios', 'especial'));
    }

    public function update(ClienteServicioRequest $request, $id)
    {
        ClienteServicio::find($id)->update($request->all());

        return redirect()->route('especial.index')->with('success', 'SERVICIO ESPECIAL ACTUALIZADO CON EXITO!');
    }

    public function destroy($id)
    {
        $clienteServicio = ClienteServicio::find($id);
        $clienteServicio->delete();
        return redirect()->route('especial.index')->with('success', 'SERVICIO ESPECIAL ELIMINADO CON EXITO!');
    }
}
