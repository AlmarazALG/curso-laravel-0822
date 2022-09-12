<?php

namespace App\Http\Controllers;

use App\DatoContacto;
use Illuminate\Http\Request;
use GuzzleHttp\Client as HttpClient;

class DatoContactoController extends Controller
{
    public function __construct()
    {
        //Linea para agregar un Middleware a las funciones del controlador
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($empleadoId)
    {
        return view('DatoContacto.create',compact('empleadoId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());

        $this->validate($request,[
            'nombre_contacto' => 'required',
            'email' => 'required|email',
            'telefono' => 'required|numeric',
            'direccion' => 'required',
            'ciudad' => 'required',
            'estado'=> 'required',
            'cp' => 'required'
        ]);

        $arraySave =[
            'empleado_id' => $request->get("empleado_id"),
            'nombre_contacto' => $request->get("nombre_contacto"),
            'email' => $request->get('email'),
            'telefono' => $request->get('telefono'),
            'direccion' => $request->get('direccion'),
            'ciudad' => $request->get('ciudad'),
            'estado' => $request->get('estado'),
            'cp' => $request->get('cp'),
        ];

        DatoContacto::create($arraySave);

        return redirect()->route('empleado.show', $request->get('empleado_id'))->with('success','Registro creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,$empleado_id)
    {
        DatoContacto::where('id',$id)->update(['eliminado' => 1]);
        return redirect()->route('empleado.show', $empleado_id)->with('success','Registro eliminado satisfactoriamente');
    }

}