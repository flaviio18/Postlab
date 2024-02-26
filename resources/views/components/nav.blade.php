<nav class="navbar fixed-top navbar-expand-lg navbar-light navbar-height bg-primary-blue" id="navbar">
  <div class="container-fluid mx-auto d-flex justify-content-between align-items-center">

    
    <div class="navbar-collapse" id="navbarSupportedContent">
    
      <ul class="navbar-nav w-100 d-flex flex-row align-items-center justify-content-between">
  <div class="col-3 col-lg-3">
      <a class="navbar-brand" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
      <i class="fa-solid fa-bars" style="color: #ebe5e5;"></i>
      <span class="ms-2">Sezioni</span>
    </a> 
  </div>
  <div class= "col-3 d-none d-md-flex justify-content-center align-items-center">
      <a href="{{route('homepage')}}" class="navbar-brand">
        <i class="fa solid fa-house " style="color: #ffffff;"></i>
      </a>
  </div>
  <div class= "col-8 col-lg-3">
        <li class="nav-item dropdown">
          @auth
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle ospite-link text-end me-0" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" onclick="this.classList.add('clicked');">
                <i class="fa-solid fa-user" style="color: #ffffff;"></i>
                Benvenuto {{ Auth::user()->name }}
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="{{route('article.byUser', ['user'=>Auth::user()])}}">Profilo</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="{{route('careers')}}">Lavora con noi!</a></li>
                @if(Auth::user()->is_writer)
                  <li>
                    <a class="dropdown-item" href="{{route('article.create')}}">Inserisci un articolo</a>
                  </li>
                @endif
                @if(Auth::user()->is_writer)
                  <li>
                    <a class="dropdown-item" href="{{route('writer.dashboard')}}">Dashboard Redattore</a>
                  </li>
                @endif
                @if(Auth::user()->is_admin)
                  <li><a class="dropdown-item" href="{{route('admin.dashboard')}}">Dashboard Admin</a></li>
                @endif
                @if(Auth::user()->is_revisor)
                  <li><a class="dropdown-item" href="{{route('revisor.dashboard')}}">Dashboard del revisore</a></li>
                @endif
                <li><a class="dropdown-item" href="#" onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">Logout</a></li>
                <form method="post" action="{{route('logout')}}" id="form-logout" class="d-none">
                  @csrf
                </form>
              </ul>
            </li>
          @endauth
 

          @guest
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle ospite-link text-end me-0" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" onclick="this.classList.add('clicked');">
                <i class="fa-regular fa-user" style="color: #ffffff;"></i>
                Benvenuto Ospite
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="{{route('register')}}">Registrati</a></li>
                <li><a class="dropdown-item" href="{{route('login')}}">Accedi</a></li>
              </ul>
            </li>
          @endguest
        </li>
      </ul>
    </div>
  </div>
  </div>
</nav>

<div class="offcanvas offcanvas-start bg-sfondo" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
  <div class="offcanvas-header">
    <ol class="nav-item mx-auto">
      <a class="nav-link1" href="{{route('article.index')}}"><h5>Postlab</h5></a>
    </ol>
  </div>
  @foreach($categories as $category)
    <ol class="nav-item">
      <a class="nav-link1" href="{{ route('article.byCategory', ['category' => $category->id]) }}">{{ $category->name }}</a>
    </ol>
  @endforeach
  <div class="offcanvas-body">
    <div class="dropdown mt-3">
      <form method="GET" action="{{ route('article.search') }}">
        <input type="search" name="query" placeholder="Cosa stai cercando?" aria-label="Search">
        <button type="submit" class="btn btn-color">Cerca</button>
      </form>
    </div>
  </div>
</div>
