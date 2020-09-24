@extends("layouts.template")

@section("contenido") 
  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Subir Archivo</h1>
      
    </div>    
   
    <div class="container">
      <div class="card bg-light mt-3">
          <div class="card-header">
              Importar o Exportar información de Pacientes
          </div>
          <div class="card-body">
              <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <input type="file" name="file" class="form-control">
                  <br>
                  <button class="btn btn-success">Importar Información</button>
                  <a class="btn btn-danger" href="{{ route('export') }}">Exportar Información</a>
              </form>
          </div>
      </div>
    </div>

  </main>

  
@endsection



