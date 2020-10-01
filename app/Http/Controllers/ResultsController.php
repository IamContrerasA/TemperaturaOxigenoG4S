<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use \App\Models\Worker;
    
// controlador principal de resultados

class ResultsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        /* Consulta antigua
        $trabajadores=Worker::with('roster', 'area')
        ->select('workers.*')
        ->join('rosters', 'rosters.id', '=', 'workers.roster_id')
        ->join('areas', 'areas.id', '=', 'workers.area_id')
        ->get();   
        return $trabajadores;     
        */

        $trabajadores=Worker::all();        
        return view("workers", compact("trabajadores"));  
        
    }

    public function dashboard()
    {          
        return view("dashboard");
    }

    public function resultados($id)
    {
        $results = Worker::find($id)->results;
        $trabajador = Worker::find($id)->name;
        return view("dashboard", compact("results", "trabajador"));  
        /*
        echo $trabajador . "<br/>";
        foreach($results as $result){       
            echo $result . "<br/>";
            
        }
        */
    }

    public function subir()
    {          
        Auth::user()->authorizeRoles(['user', 'administrador', 'operador']);     
        return view("file");  
        
    }
    
}
