<!-- vista de inicio de los trabajadores -->
@extends("layouts.template")

@section("contenido") 
  
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Lista de Trabajadores</h1>
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

  @if(count($trabajadores))
  
  <table class="table " id="id_table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Nombre</th>
        <th scope="col">Edad</th>
        <th scope="col">Sexo</th>
        <th scope="col">DNI</th>
        <th scope="col">Area</th>
        <th scope="col">Roster</th>
        <th scope="col">Fecha de Subida</th>
        <th scope="col">Fecha de Bajada</th>
        <th scope="col">Resultados</th>          
      </tr>
    </thead>
    <tbody>

    @foreach($trabajadores as $trabajador)
      <tr>
        <td>{{$trabajador->name}}</td>
        <td>{{$trabajador->age}}</td>
        <td>{{$trabajador->sex}}</td>
        <td>{{$trabajador->DNI}}</td>
        <td>{{$trabajador->area->name}}</td>
        <td>{{$trabajador->roster->name}}</td>
        <td>{{$trabajador->fecha_subida}}</td>
        <td>{{$trabajador->fecha_bajada}}</td>
        <td><a href= "/trabajador/{{ $trabajador -> id }}/resultados"> resultado </a></td>
      </tr>
    @endforeach 

    </tbody>
  </table>
    
  @else
    {{"No existen trabajadores registrados"}}
  @endif    
 
@endsection



