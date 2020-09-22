@extends("layouts.template")

@section("contenido")    
  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">{{$paciente}}</h1>
      <p id="demo">a</p>
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
    </div>

    <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>

    <h2>Resultados</h2>
    <div class="table-responsive">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th>Fecha</th>
            <th>Temperatura</th>
            <th>Saturación de Oxigeno</th>
          </tr>
        </thead>
        <tbody>
        @foreach($results as $result)
          <tr>
            <td>{{$result->created_at}}</td>
            <td>{{$result->temperature}}</td>
            <td>{{$result->oxygen_saturation}}</td>            
          </tr>
        @endforeach 
        </tbody>
      </table>
    </div>     
  </main>  
  <script>
    var appSettings = "{{$results}}";
 </script>
@endsection

