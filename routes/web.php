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

//rutas de archivos faltan corregir segun requerimientos---------------------------------------->

Route::get('/subir', 'App\Http\Controllers\FilesController@subir');

//Libreria Excel
Route::get('export', 'App\Http\Controllers\RegistersController@export')->name('export');
Route::get('importExportView', 'App\Http\Controllers\RegistersController@importExportView');
Route::post('import', 'App\Http\Controllers\RegistersController@import')->name('import');

//otra forma de subir y manejar archivos
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
//-------------------------------------------------------------------------------------------->


//Rutas autenticacion
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('/');

//Rutas crud usuarios
Route::resource('admin/users', 'App\Http\Controllers\AdminUserController');

//Rutas crud areas
Route::resource('admin/areas', 'App\Http\Controllers\AdminAreaController');

//Rutas crud rosters
Route::resource('admin/rosters', 'App\Http\Controllers\AdminRosterController');

//Rutas crud workers
Route::resource('workers', 'App\Http\Controllers\WorkersController');

//Rutas crud results
Route::resource('workers/{id}/results', 'App\Http\Controllers\ResultsController');