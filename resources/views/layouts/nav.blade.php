<nav class="navbar navbar-expand-lg navbar-light bg-primary navbar-fixed-top">
  <a class="navbar-brand" href="#">LOGO</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{url('package/new')}}">Crear Envío <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('user/envios')}}">Envíos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('user/movimientos')}}">Movimientos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('user/facturas')}}">Facturas</a>
      </li>


     
     
    </ul>


    <span class="navbar-text">
       <ul class="navbar-nav mr-5">
       <li class="nav-item dropleft">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          User
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{url('user/profile')}}">Profile</a>
          <a class="dropdown-item" href="#">Logout</a>   
        </div>
      </li>
    </ul>
   
    </span>
  </div>
</nav>