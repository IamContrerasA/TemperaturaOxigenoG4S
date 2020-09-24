@extends("layouts.template")

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

    @if(count($pacientes))
   
    <table class="table " id="id_table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Nombre</th>
          <th scope="col">Edad</th>
          <th scope="col">Sexo</th>
          <th scope="col">DNI</th>
          <th scope="col">Resultados</th>          
        </tr>
      </thead>
      <tbody>

      @foreach($pacientes as $paciente)
        <tr>
          <td>{{$paciente->name}}</td>
          <td>{{$paciente->age}}</td>
          <td>{{$paciente->sex}}</td>
          <td>{{$paciente->DNI}}</td>
          <td><a href= "/paciente/{{ $paciente -> id }}/resultados"> resultado </a></td>
        </tr>
      @endforeach 

      </tbody>
    </table>
      
    @else
      {{"No existen pacientes registrados"}}
    @endif    
    
  </main>
  
  
@endsection



