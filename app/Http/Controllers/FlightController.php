<?php

namespace App\Http\Controllers;

use App\Flight;
//use App\usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FlightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $datos['usuarios']=Flight::paginate(20);

        return view('index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( Request $request)
    {
        /*$usua= new Flight();
        $usua -> Usu_Username = $request ->nombre;
        $usua -> Usu_Email = $request ->email;
        $usua -> Usu_Contrasenia = $request ->contrasenia;
        $usua -> Usu_Imagen = $request ->imagen;
        $usua ->save();*/

       // $usuario=Flight::findOrFail($id);
       return view('/agregar');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // $usuario = request() ->all();
        $usuario = request() ->except('_token');
        
        if($request->file('Usu_Imagen')){
           
            $usuario['Usu_Imagen']=$request->file('Usu_Imagen')->store('uploads','public');
        }
      
        Flight::insert($usuario);
        return redirect('/create')->with('Mensaje','Empleado Agregado con Exito');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function show(Flight $flight)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $usuario=Flight::findOrFail($id);
        return view('/editar',compact('usuario'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $usuario2 = request() ->except(['_token','_method']); 
       
        $usuario=Flight::findOrFail($id);
        if($request->file('Usu_Imagen')){
            Storage::delete('public/'. $usuario->Usu_Imagen);
            $usuario2['Usu_Imagen']=$request->file('Usu_Imagen')->store('uploads','public');
        }
        
        $usuario->update($usuario2);
        //return $usuario2['Usu_Imagen'] ;
       // $usuario['Usu_Imagen']->update($usuario['Usu_Imagen']);
      
        return redirect('/create')->with('Mensaje','Empleado Modificado con Exito');
        
      // return view('/editar',compact('usuario'));

        /*
        if($request->file('Usu_Imagen')){
            $usuario['Usu_Imagen']=$request->file('Usu_Imagen')->store('uploads','public');
        }
        Flight::insert($usuario);
        return redirect('/create');*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //
        $usuario=Flight::findOrFail($id);
        if(Storage::delete('public/'. $usuario->Usu_Imagen)){
            Flight::destroy($id);
        } 
        Flight::destroy($id);

        
        return redirect('/create')->with('Mensaje','Empleado Eliminado con Exito');
    }
}
