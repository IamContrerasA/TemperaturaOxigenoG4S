<!--Pantalla principal para los rosters-->
@extends("layouts.template")

@section("contenido") 

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">INDEX ADMIN ROSTER</h1>
    <!--<p id="demo">a</p>-->
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group mr-2">        
        <a href="/admin/rosters/create" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Crear Roster</a>
      </div>     
    </div>
  </div>
 
  @if(count($rosters))
  
    <table class="table " id="id_table">
      <thead class="thead-dark">
        <tr>          
          <th scope="col">Id</th>
          <th scope="col">Nombre</th>          
          <th scope="col">Opciones</th>          
        </tr>
      </thead>
      <tbody>

      @foreach($rosters as $roster)
        <tr>          
          <td>{{$roster->id}}</td>
          <td>{{$roster->name}}</td>         
          <td>
            <a href= "{{route('rosters.show', $roster -> id) }}"> Ver </a> &nbsp;
            <a href= "{{route('rosters.edit', $roster -> id) }}"> Editar </a> &nbsp;
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <a href="{{ route('rosters.destroy', $roster->id) }}" data-method="delete" class="jquery-postback">Delete</a>
          </td>          
        </tr>
      @endforeach 

      </tbody>
    </table>
    
  @else
    {{"No existen trabajadores registrados"}}
  @endif
  
  <script>
    //funcion para borrar un roster
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
    });
    
    $(document).on('click', 'a.jquery-postback', function(e) {   
      
      e.preventDefault();   
      var $this = $(this);
      var indice = $this[0].toString();

      var result = confirm("Estas seguro que deseas eliminar el roster: " +  indice.substring(indice.lastIndexOf('/') + 1,indice.size) + "???");
            
      if(result){        
    
        $.post({
            type: $this.data('method'),
            url: $this.attr('href')
        }).done(function (data) {
            alert('Roster borrado exitosamente');
            console.log(data);
            window.location.reload();
        });
      }      
    });
    
  </script>

@endsection
