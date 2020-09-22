@extends("layouts.template")

@section("columna") 

@endsection

@section("contenido") 
  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Lista de Pacientes</h1>
      <!--
      <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
          <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
          <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
        </div>
        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
          <span data-feather="calendar"></span>
          This week
        </button>
      </div>
      -->
    </div>
    <h2>Mostrar lista de usuarios con sus datos y a la derecha un boton para ver sus estadisticas, en si es como el index pero ya con los datos obtenidos</h2>
    
    <p>This example writes "Hello JavaScript!" into an HTML element with id="demo":</p>

    <p id="demo"></p>

    <script>
    document.getElementById("demo").innerHTML = "Hello JavaScript!";
    </script>
    
  </main>
  
@endsection



