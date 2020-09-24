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

    
    <form action="/subir_archivo" method="get">
      @csrf
      <div class="input-group" style="margin:100px auto">      
          <div class="input-group-prepend">          
            <input class="input-group-text" id="inputGroupFileAddon01" type="submit" value="Subir" name="submit">
          </div>
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="customFileLang" lang="es">
            <label class="custom-file-label" for="customFileLang">Seleccionar Archivo</label>
          </div>    
      </div>
   </form>
   
   <div id="div1"><p>Let jQuery AJAX Change This Text</p></div>
   <button>ver datos</button>

    <?php
      echo "</br>";echo "</br>";echo "</br>";echo "</br>";echo "</br>";      
      echo Form::open(array('url' => '/uploadfile','files'=>'true'));
      echo 'Select the file to upload.';
      echo Form::file('image');
      echo Form::submit('Upload File');
      echo Form::close();
    ?>
  </main>

  <script>    
    // Add the following code if you want the name of the file appear on select
    //poner nombre en la barra de busqueda del archivo
    $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
  </script>

  <script>
    //actualizar la pagina y mostrar la info de uin botton
    $(document).ready(function(){
      $("button").click(function(){
        $.ajax({        
          url: "/subir_archivo", 
          success: function(result){
            $("#div1").html(result);
        }});
      });
    });
  </script>

@endsection



