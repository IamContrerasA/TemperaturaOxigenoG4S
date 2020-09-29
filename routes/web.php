<?php

use Illuminate\Support\Facades\Route;
use \App\Models\Worker;
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

//rutas varias, faltan corregir
Route::get('/index_resultados', "App\Http\Controllers\ResultsController@index");
Route::get('/dashboard', "App\Http\Controllers\ResultsController@dashboard");
Route::get('/workers', "App\Http\Controllers\ResultsController@index");

Route::get('/resultados', function () {
    return view('index');
});

Route::get('/insertar', function(){
    
    $trabajador = new Worker;

    $trabajador->name = "Pepe";
    $trabajador->age = 58;
    $trabajador->sex = "hombre";
    $trabajador->DNI = 88446699;    

    $trabajador->save();

});

Route::get('/insertar_resultado', function(){
    
    $resultado = new Result;

    $resultado->worker_id = 2;
    $resultado->oxygen_saturation = 91.5;
    $resultado->temperature = 36.1;     

    $resultado->save();

});

Route::get('/leer_resultado', function(){
    
    $resultados = Result::all();
    foreach($resultados as $resultado){        
        echo "Trabajador: " . $resultado->worker_id  . "<br>";
    }

});

/*
Route::get('/trabajador/{id}/resultados', function($id){
    
    $results = Worker::find($id)->results;
 
    foreach($results as $result){       
        echo $result->oxygen_saturation . "<br/>";
    }

});
*/

Route::get('/trabajador/{id}/resultados', 'App\Http\Controllers\ResultsController@resultados');
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


//Rutas para exportar importar archivos
Route::get('/uploadfile','App\Http\Controllers\UploadFileController@index');
Route::post('/uploadfile','App\Http\Controllers\UploadFileController@showUploadFile');

//Rutas autenticacion
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('/');

//Rutas crud usuarios
Route::resource('admin/users', 'App\Http\Controllers\AdminUserController');