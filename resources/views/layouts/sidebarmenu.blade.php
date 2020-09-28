<!-- Menu lateral-->  
<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="sidebar-sticky pt-3">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link " href="/home">
          <span data-feather="home"></span>
          Home <span class="sr-only">(current)</span>
        </a>
      </li>      
      <li class="nav-item">
        <a class="nav-link" href="/workers">
          <span data-feather="users"></span>
          Trabajadores
        </a>
      </li>
      @if(Auth::user()->role_id < 3)
        <li class="nav-item">
          <a class="nav-link" href="/subir">
            <span data-feather="bar-chart-2"></span>
            Subir archivo
          </a>
        </li>
      @endif      
    </ul>
  </div>
</nav>


 