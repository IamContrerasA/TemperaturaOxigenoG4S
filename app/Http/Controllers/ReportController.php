<?php

namespace App\Http\Controllers;
use App\Exports\WorkersExport;
use App\Exports\ResultsExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Worker;

//Controlador para la gestion de los reportes y archivos

//class ReportController extends Controller  implements FromCollection
class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        Auth::user()->authorizeRoles(['user', 'administrador', 'operador']);     
        return view("reports.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
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
    public function destroy($id)
    {        
             
    }

    
    public function exportWorker() 
    {
        Auth::user()->authorizeRoles(['user', 'administrador', 'operador']);      
        return Excel::download(new WorkersExport, 'trabajadores.xlsx');
    }

    public function exportResult() 
    {
        Auth::user()->authorizeRoles(['user', 'administrador', 'operador']);      
        return Excel::download((new ResultsExport), 'resultados.xlsx');
    }
    
}
