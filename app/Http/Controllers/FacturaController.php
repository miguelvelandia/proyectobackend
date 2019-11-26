<?php

namespace App\Http\Controllers;

use App\Http\Requests\FacturaRequest;
use App\Models\EmpleadoOrden;
use App\Models\Factura;
use App\Models\Orden;
use Illuminate\Http\Request;
use App\Http\Resources\Factura as FacturaResource;


class FacturaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:factura-list');
        $this->middleware('permission:factura-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:factura-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:factura-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $facturas = FacturaResource::collection(Factura::all());
        return view('factura.index', compact('facturas'));
    }


    public function create()
    {
        $ordenes = Orden::all();
        $empleadoordenes = EmpleadoOrden::all();
        return view('factura.create', compact('ordenes', 'empleadoordenes'));
    }

    public function store(FacturaRequest $request)
    {
        $factura = new Factura;

        $factura->total = $request->total;
        $factura->abono = $request->abono;
        $factura->saldo = $request->saldo;
        $factura->estado = $request->estado;
        $factura->orden_id = $request->orden_id;

        $factura->save();

        $factura->empleado_orden()->attach([$request->empleadoorden_id], ['valor' => $request->valor]);

        return redirect()->route('factura.index')->with('success', 'FACTURA REGISTRADO CON EXITO!');
    }

    public function edit($id)
    {
        $factura = new FacturaResource(Factura::find($id));
        $ordenes = Orden::all();
        $empleadoordenes = EmpleadoOrden::all();

        return view('factura.edit', compact('factura', 'ordenes', 'empleadoordenes'));
    }

    public function update(FacturaRequest $request, $id)
    {
        $factura = Factura::find($id);

        $factura->total = $request->total;
        $factura->abono = $request->abono;
        $factura->saldo = $request->saldo;
        $factura->estado = $request->estado;
        $factura->orden_id = $request->orden_id;

        $factura->save();
        
        $factura->empleado_orden()->detach();
        $factura->empleado_orden()->attach([$request->empleadoorden_id], ['valor' => $request->valor]);

        return redirect()->route('factura.index')->with('success', 'FACTURA ACTUALIZADO CON EXITO!');
    }

    public function destroy($id)
    {
        $factura = Factura::find($id);
        $factura->delete();
        return redirect()->route('factura.index')->with('success', 'FACTURA ELIMINADO CON EXITO!');
    }
}
