<?php
   
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Exports\WorkersExport;
use App\Imports\WorkersImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;

// Controlador para importar/exportar con la librearia Maat de excel 

class RegistersController extends Controller
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function importExportView()
    {
        Auth::user()->authorizeRoles(['user', 'administrador', 'operador']);
        return view('import');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        Auth::user()->authorizeRoles(['user', 'administrador', 'operador']);
        return Excel::download(new WorkersExport, 'workers.xlsx');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import() 
    {      
        Auth::user()->authorizeRoles(['user', 'administrador', 'operador']);

        Excel::import(new WorkersImport,request()->file('file'));           
        return back();
    }
}