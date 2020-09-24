<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Patient;
    
class ResultsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacientes=Patient::all();       
        return view("patients", compact("pacientes"));  
        
    }

    public function dashboard()
    {
          
        return view("dashboard");
    }

    public function resultados($id)
    {
        $results = Patient::find($id)->results;
        $paciente = Patient::find($id)->name;
        return view("dashboard", compact("results", "paciente"));  
        /*
        echo $paciente . "<br/>";
        foreach($results as $result){       
            echo $result . "<br/>";
            
        }
        */
    }

    public function subir()
    {
          
        return view("file");
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("crear");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        return view("articulos");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view("mostrar");
    }

    public function contactar()
    {
        return view("contacto");
    }

    public function galeria()
    {
        $alumnos=["Ana", "Sara", "Antonio", "Manuel"];
        //$alumnos=[];
        return view("galeria", compact("alumnos"));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
