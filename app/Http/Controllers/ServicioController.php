<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServicioRequest;
use App\Models\Categoria;
use App\Models\Servicio;
use Illuminate\Http\Request;
use App\Http\Resources\Servicio as ServicioResource;


class ServicioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:servicio-list');
        $this->middleware('permission:servicio-create', ['only' => ['create','store']]);
        $this->middleware('permission:servicio-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:servicio-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $servicios = ServicioResource::collection(Servicio::all());
        return view('servicio.index', compact('servicios'));
    }

   
    public function create()
    {
        return view('servicio.create');
    }

    public function store(ServicioRequest $request)
    {
       
        $categoria = new Categoria;

        $categoria->nombre =  $request->nombre;
        $categoria->descripcion = $request->descripcion;

        $categoria->save();
       
        $servicio = new Servicio;

        $servicio->nombre = $request->servicio;
        $servicio->precio = $request->precio;
        $servicio->descripcion = $request->descripcion_servicio;

        $categoria->servicios()->save($servicio);

        return redirect()->route('servicio.index')->with('success', 'SERVICIO REGISTRADO CON EXITO!');
    }

    public function edit($id)
    {
        $servicio = new ServicioResource(Servicio::find($id));
        return view('servicio.edit', compact('servicio'));
    }

    public function update(ServicioRequest $request, $id)
    {
        $categoria = Categoria::find($request->idcategoria);
        $categoria->nombre =  $request->nombre;
        $categoria->descripcion = $request->descripcion;

        $categoria->save();

        $servicio = Servicio::find($id);
         
        $servicio->nombre = $request->servicio;
        $servicio->precio = $request->precio;
        $servicio->descripcion = $request->descripcion_servicio;

        $servicio->save();
        
        return redirect()->route('servicio.index')->with('success', 'SERVICIO ACTUALIZADO CON EXITO!');
    }

    public function destroy($id)
    {
        $servicio = Servicio::find($id);
        $servicio->delete();
        return redirect()->route('servicio.index')->with('success', 'SERVICIO ELIMINADO CON EXITO!');
    }
}
