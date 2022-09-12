<?php

namespace App\Http\Controllers;

use App\Empleado;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use GuzzleHttp\Client as HttpClient;

class EmpleadoController extends Controller
{
    public function __construct(){
        //$this->middleware("auth");
        //$this->middleware('editDelete.admin')->except('index','store'); //cuales no se aplica con except
        //$this->middleware('editDelete.admin')->only('index','create','store'); //los unicos que se aplica
        //$this->middleware('create.user')->except('index','delete','edit');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados = Empleado::orderby('id','DESC')->get();
        return view('Empleado.index',compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $currencyWS = $this->obtenerCurrencyWS();
        $listMonedas = explode(";" , $currencyWS);
        return view('Empleado.create',compact('listMonedas'));
        //return view('Empleado.create');
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
            'nombre' => 'required|max:50',
            'apellido_paterno' => 'required|max:30',
            'apellido_materno' => 'required|max:30',
            'correo' => 'nullable|required|email|max:50',
            'fecha_nacimiento' => 'nullable|date',
            'direccion' => 'nullable|max:100',
            'genero' => [
                'required',
                Rule::In(['hombre', 'mujer']),],
            'telefono' => 'required',
            'codigo_empleado' => 'required|unique:empleado,codigo_empleado',
            'salario' => 'required',
            'tipo_moneda' => 'required'
        ]);

        /*$validaciones=Validator::make($request->all(),[
            'nombre' => 'required|max:10',
            'apellido_paterno' => 'required',
            'apellido_materno' => 'required',
            'correo' => 'required',
            'fecha_nacimiento' => '',
            'direccion' => '',
            'genero' => 'required',
            'telefono' => 'required',
            'codigo_empleado' => 'required'
            ]
        );
        dd($validaciones);*/

        $arraySave = [
            'nombre' => $request->get("nombre"),
            'apellido_paterno' => $request->get("apellido_paterno"),
            'apellido_materno' => $request->get("apellido_materno"),
            'correo' => $request->get("correo"),
            'fecha_nacimiento' => $request->get("fecha_nacimiento"),
            'direccion' => $request->get("direccion"),
            'genero' => $request->get("genero"),
            'telefono' => $request->get("telefono"),
            'codigo_empleado' => $request->get("codigo_empleado"),
            'salario' => $request->get('salario'),
            'tipo_moneda' => $request->get('tipo_moneda'),
        ];

        $saveEmpleado= Empleado::create($arraySave);
        //dd($saveEmpleado);
        return redirect()->route('empleado.index')->with('success','Registro creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empleado  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $id)
    {
        $empleado = Empleado::find($id);
        $estadosWS = $this->wsEstados();
        $estadosList = ((array)$estadosWS->data)['lst_estado_proveedor'];
        return view('Empleado.show',compact('empleado', 'estadosList'));
        //dd(((array)$estadosWS->data)['lst_estado_proveedor']);
        //dd($empleado->datosContacto);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleado = Empleado::find($id);
        $currencyWS = $this->obtenerCurrencyWS();
        $listMonedas = explode(";" , $currencyWS);
        return view('Empleado.edit',compact('empleado','listMonedas'));
        //return view('Empleado.edit',compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,['nombre' => 'required|max:50',
            'apellido_paterno' => 'required',
            'apellido_materno' => 'required',
            'correo' => 'required|email', //Formato correo
            'fecha_nacimiento' => '',//Solo acepte formato fecha
            'direccion' => '',
            'genero' => 'required', //Solo acepte masculino/femenino
            'telefono' => 'required'
        ]);
        
        Empleado::find($id)->update($request->all());
        return redirect()->route('empleado.index')->with('success','Registro actualizado correctamente');
        //return view('Empleado.edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($idEmpleado)
    {
        Empleado::find($idEmpleado)->delete();
        return redirect()->route('empleado.index')->with('success','Registro eliminado correctamente');
        //return view('Empleado.delete', compact('deleteEmpleado'));
    }

    private function wsEstados(){

        // Create a client with a base URI
        $client = new HttpClient(['base_uri' => 'https://beta-bitoo-back.azurewebsites.net/api/', 'verify' => false]);
        $response = $client->request('POST', 'proveedor/obtener/lista_estados');
        return json_decode($response->getBody());
    }

    private function obtenerCurrencyWS(){

        $client = new HttpClient(['base_uri' => 'https://fx.currencysystem.com/webservices/CurrencyServer5.asmx/','verify' => false]);
        $response = $client->request('GET',"AllCurrencies",['query' => 'licenseKey=']);
        return xmlrpc_decode($response->getBody()->getContents());
    }
}
