<nav class="navbar navbar-expand-lg fixed-top my-navbar" id="navbar">
    <div class="container">
      <a class="navbar-brand" href="{{route('welcome')}}"> <img src="/img/Logo_Presto.png" alt=""></a>
      <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="text-light"><i class="fa-solid fa-bars fs-3"></i></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <div class="dropdown d-flex align-items-center me-2">
            <i class="fa-solid fa-earth-americas text-white fs-5" dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"     aria-expanded="false">             
            </i>
            <ul class="dropdown-menu my-dropdown-menu " aria-labelledby="dropdownMenuButton1">
              <li class="nav-item d-flex justify-content-center">
                <x-_locale lang="it" nation='it'/> 
              </li>
              <li class="nav-item d-flex justify-content-center">
                <x-_locale lang="en" nation='gb'/> 
              </li>
              <li class="nav-item d-flex justify-content-center">
                <x-_locale lang="ru" nation='ru'/> 
              </li>
            </ul>
          </div>
          
          
          
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('welcome')}}">{{__('ui.home')}}</a>
          </li>         
          
          @guest                    
          <li class="nav-item">
            <a class="nav-link" href="{{route('login')}}">{{__('ui.accedi')}}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link me-2" href="{{route('register')}}">{{__('ui.registrati')}}</a>
          </li> 
          <li>
            <a class= "my-btn-annuncio text-center d-flex align-items-center" href="{{route('createAnnouncement')}}"><i class="fa-regular fa-square-plus fs-4 me-2"></i>{{__('ui.inserisci_annuncio')}}</a>   
          </li>
            @else            
            <li>                         
              <p class="nav-link text-uppercase m-0 fw-bold position-relative me-5" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal3"><i class="fa-regular fa-user me-1"></i>{{Auth::user()->name}}
                @if (Auth::user()->is_revisor)
                <span class="position-absolute top-0 start-95 translate-middle badge rounded-pill bg-danger">
                  {{App\Models\Announcement::toBeRevisionedCount()}}
                  <span class="visual-hidden"></span>
                </span>
                @endif
              </p>                    
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{route('logout')}}" method="POST" class="d-none">
                    @csrf
                </form>
            </li> --}}
            <li>
              <a class= "my-btn-annuncio text-center d-flex align-items-center" href="{{route('createAnnouncement')}}"><i class="fa-regular fa-square-plus fs-4 me-2"></i>{{__('ui.inserisci_annuncio')}}</a>   
            </li>
            {{-- @if (Auth::user()->is_revisor)
            <li class="nav-item">
              <a class="nav-link btn btn-outline-warning position-relative" href="{{route('revisorIndex')}}">Zona Revisore
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                  {{App\Models\Announcement::toBeRevisionedCount()}}
                  <span class="visual-hidden"></span>
                </span>
              </a>
            </li> 
            @endif --}}
          @endguest
        </ul>
      </div>
    </div>
</nav>



<!-- Modal -->
@if (Auth::user())
<div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel3" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">        
        <h5 class="modal-title" id="exampleModalLabel3">{{__('ui.Benvenuto')}} {{Auth::user()->name}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        @if (!Auth::user()->is_revisor)
        <div class="d-flex justify-content-center mb-4">
          <a href="{{route('become')}}" class="nav-link my-btn-revisor d-flex align-items-center justify-content-center">
          {{__('ui.Diventa_revisore')}}
          </a>
      </div>
      @endif
      @if (Auth::user()->is_revisor)
        <div class="d-flex justify-content-center mb-4">
          <a class="nav-link my-btn-revisor position-relative d-flex align-items-center justify-content-center" href="{{route('revisorIndex')}}">{{__('ui.Zona_Revisore')}}
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
              {{App\Models\Announcement::toBeRevisionedCount()}}
              <span class="visual-hidden"></span>
            </span>
          </a>

        </div>        
        @endif
        <div class="d-flex justify-content-center ">
          <a class="nav-link my-btn-revisor d-flex align-items-center justify-content-center" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{__('ui.Logout')}}</a>
          <form id="logout-form" action="{{route('logout')}}" method="POST" class="d-none">
               @csrf
          </form>
        </div>
        
      </div>
      
    </div>
  </div>
</div>
@endif