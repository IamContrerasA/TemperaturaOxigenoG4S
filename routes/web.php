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
Route::get('/subir', 'App\Http\Controllers\ResultsController@subir');

Route::get('export', 'App\Http\Controllers\RegistersController@export')->name('export');
Route::get('importExportView', 'App\Http\Controllers\RegistersController@importExportView');
Route::post('import', 'App\Http\Controllers\RegistersController@import')->name('import');

Route::get('/subir_archivo/{nombre}', function($nombre){
    /*
    $filename = "/info.txt";
    $location = asset('uploads'). $filename;
    
    //echo $location;

    $fp = fopen($location, "r");
    while(!feof($fp)) {
        $linea = fgets($fp);
        echo $linea . "<br />";
    }
    fclose($fp);
    
    */
    
    // dd(File::allFiles('uploads'));
    $files = File::allFiles('uploads');
    foreach($files as $file){
        echo $file . "</br>";

        /*
        if($file == "uploads/" . $nombre){
            echo $file . "</br>";
        }
        */
    } 
    

   // return (File::allFiles('uploads'));
    
});



Route::get('/uploadfile','App\Http\Controllers\UploadFileController@index');
Route::post('/uploadfile','App\Http\Controllers\UploadFileController@showUploadFile');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
