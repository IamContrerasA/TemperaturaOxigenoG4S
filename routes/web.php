<?php

use Illuminate\Support\Facades\Route;
use \App\Models\Patient;
use \App\Models\Result;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', "App\Http\Controllers\ResultsController@index");
Route::get('/dashboard', "App\Http\Controllers\ResultsController@dashboard");
Route::get('/patients', "App\Http\Controllers\ResultsController@index");

Route::get('/resultados', function () {
    return view('index');
});

Route::get('/insertar', function(){
    
    $paciente = new Patient;

    $paciente->name = "Pepe";
    $paciente->age = 58;
    $paciente->sex = "hombre";
    $paciente->DNI = 88446699;    

    $paciente->save();

});

Route::get('/insertar_resultado', function(){
    
    $resultado = new Result;

    $resultado->patient_id = 2;
    $resultado->oxygen_saturation = 91.5;
    $resultado->temperature = 36.1;     

    $resultado->save();

});

Route::get('/leer_resultado', function(){
    
    $resultados = Result::all();
    foreach($resultados as $resultado){        
        echo "Paciente: " . $resultado->patient_id  . "<br>";
    }

});

/*
Route::get('/paciente/{id}/resultados', function($id){
    
    $results = Patient::find($id)->results;
 
    foreach($results as $result){       
        echo $result->oxygen_saturation . "<br/>";
    }

});
*/

Route::get('/paciente/{id}/resultados', 'App\Http\Controllers\ResultsController@resultados');