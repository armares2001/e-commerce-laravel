<x-layout>
    <x-slot name='title'> Home </x-slot>
    <div class="container-fluid header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="sezione-container margin-top-sezione">
                        <div class="row justify-content-center">
                            {{-- <div class="col-12 col-md-3 my-2">
                                
                                <a class="nav-link dropdown-toggle text-center" href="#" id="categoriesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Categorie
                                </a>
                                <ul class="dropdown-menu text-center" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="{{route('allAnnouncement')}}">Tutti gli annunci</a></li>
                                    <li><hr class="dropdown-divider"></li>  
                                    @foreach ($categories as $category)
                                    <li><a class="dropdown-item" href="{{route('categoryShow', compact('category'))}}">{{$category->name}}</a></li>
                                    <li><hr class="dropdown-divider"></li>   
                                    @endforeach
                                      
                                </ul>                                
                            </div> --}}
                            
                            <div class="col-12 col-md-6 my-3">
                                {{-- <p class="text-center">Cerca</p> --}}
                                <form action="{{route('search')}}" method='GET' class='d-flex' >
                                    <input type='search' name='searched'class='form-control me-2' placeholder="cerca">
                                    <button class='btn btn-warning'><i class="fa-solid fa-magnifying-glass"></i></button>
                                </form>
                               
                            </div>

                            <div class="col-12 col-md-3 d-flex align-items-center justify-content-center my-2">
                                
                                
                                
                                    <button type="button" class="btn-sezione btn-warning d-flex " data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <img src="/img/sort.png" class="me-5 mt-1" alt="">
                                        <p class="mt-2">{{$sortBy}}</p>
                                        
                                    </button>                                

                                
                                    
                                
                                
                                
                                {{-- <div class="accordion accordion-flush" id="accordionFlushExample">
                                    <div class="accordion-item">
                                      <h2 class="accordion-header" id="flush-headingOne">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                              Ordina per
                                        </button>
                                      </h2>
                                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">
                                                @foreach ($sortsBy as $sortBy)
                                                <a class="nav-link" selected href="{{route('welcomeOrder')}}" onclick="event.preventDefault(); document.getElementById('{{$sortBy}}').submit();">{{$sortBy}}</a>                                            
                                        
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>                                    
                                    
                                </div>                              --}}
                                

                                    
                                @foreach ($sortsBy as $sortBy)
                                    <form id="{{$sortBy}}" action="{{route('welcomeOrder')}}" method="get" class="d-none">
                                        @csrf
                                        <input class="d-none" type="text" name="methodSort" value="{{$sortBy}}">
                                        <button class="btn d-none"></button>
                                    </form>
                                @endforeach
                            </div>

                            <div class="col-12 col-md-3 d-flex align-items-center justify-content-center my-2">
                                <button type="button" class="btn-sezione btn-warning d-flex" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                    <img src="/img/search.png" class=" me-5 mt-1" alt="">
                                    <p class="mt-2">{{__('ui.Categoria')}}</p>                                    
                                </button>                                
                                {{-- <a class= "my-btn-annuncio text-center d-flex align-items-center" href="{{route('createAnnouncement')}}"><i class="fa-regular fa-square-plus fs-4 me-2"></i>inserisci annuncio</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
            

            <div class="col-12 mt-5 pt-5 content">
                <h1 class="color-text display-2 fw-bold">{{__('ui.Crea_un_inserzione_e_inizia_a_vendere_su')}} <em>presto.it</em></h1>
            </div>
        </div>
    </div>

    <div class="container my-5 bg-sfondo">
        <div class="row">
            <div class="col-12 ">         
                
                <h2 class="my-5 text-center display-2" data-aos="zoom-in-up"><em>{{__('ui.Ultimi_annunci')}}</em></h2>
                <div class="row">
                    
                    @forelse ($announcementsOrder as $announcement)
                    
                    <div class="col-12 col-md-4 col-xl-3 d-flex justify-content-center mb-5" data-aos="fade-up">
                        <div class="card-annunci">
                            <div class="img-card">
                                <a href="{{route('detailAnnouncement', compact('announcement'))}}" class=""><div class="copertina-img"></div><img  src="{{!$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(300,300) : 'https://picsum.photos/800/800'}}" class="img-fluid" alt="..."></a>
                                <i class="fa-solid fa-circle-info text-white fs-3"></i>
                                {{-- <h6 class="card-title text-white">{{$announcement->body}}</h6> --}}
                            </div>
                            <div class="card-body p-0">
                                <h4 class="card-title text-dark text-center pb-3 pt-2">{{$announcement->title}}</h4>                                
                                <p class="card-text price">{{$announcement->price}}$</p>  
                                <a href="{{route('categoryShow',['category'=>$announcement->category]),}}" class="card-text nav-link category text-center text-dark">{{$announcement->category->name}}</a>                                                              
                                {{-- <button type="button" class="btn-sezione btn-warning d-flex ">
                                    <a href="{{route('detailAnnouncement', compact('announcement'))}}" class="">Visualizza</a>
                                </button>  --}}
                                {{-- <button type="button" class="btn-sezione btn-warning d-flex ">
                                    <a href="#" class="pt-2">{{$announcement->category->name}}</a>
                                </button>                                --}}
                                <p class='card-footer text-muted text-center'>{{__('ui.Pubblicato_il')}} {{$announcement->created_at->format(' d/m/Y')}}</p>  
                                
                            </div>
                        </div>
                    </div>    
                    @empty
                    <div class="col-12">
                        <div class="alert alert-warning py-3 shadow text-center">
                            <p class="lead">{{__('ui.Non_ci_sono_annunci!Diventa_il_primo_a_pubblicare_un_annuncio!')}}</p>
                        </div>
                    </div>     
                    @endforelse
                    
                        
                    
                    
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid my-5 py-5">
        <div class="row ">
            <div class="col-12 col-md-4 mb-5" data-aos="fade-up-right">
                <div class="d-flex justify-content-center">
                    <img src="/img/contact.png" width="128px" height="128px" alt="">
                </div>
                <h3 class="text-center my-3">{{__('ui.registrati')}}</h3>
                <p class="text-center text-muted">{{__('ui.Registrati_o_accedi_per_diventare_revisore')}}</p>
            </div>
            <div class="col-12 col-md-4 mb-5" data-aos="fade-up">
                <div class="d-flex justify-content-center">
                    <img src="/img/insert.png" alt="">
                </div>
                <h3 class="text-center my-3">{{__('ui.Inserisci_gratis_il_tuo_Annuncio')}}</h3>
                <p class="text-center text-muted">{{__('ui.In_meno_di_un_minuto_lo_pubblichi_e_potrai_modificarlo_e_cancellarlo_quando_vuoi')}}</p>
            </div>

            <div class="col-12 col-md-4 " data-aos="fade-up-left">
                <div class="d-flex justify-content-center">
                    <img src="/img/planet-earth.png" alt="">
                </div>
                <h3 class="text-center my-3">{{__('ui.Massima_visibilità_su_Google')}}</h3>
                <p class="text-center text-muted">{{__('ui.Ottieni_la_migliore_visibilità_e_posizionamento_sui_motori_di_ricerca')}}</p>
            </div>

        </div>
    </div>

    
    <!-- Modal Ordine-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{{__('ui.Ordina_per')}}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @foreach ($sortsBy as $sortBy)
                <a class="nav-link" selected href="{{route('welcomeOrder')}}" onclick="event.preventDefault(); document.getElementById('{{$sortBy}}').submit();">{{$sortBy}}</a>                                            
        
                @endforeach
            </div>
            
        </div>
        </div>
    </div>

    <!-- Modal Categoria-->
    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">{{__('ui.Categoria')}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <a class="dropdown-item" href="{{route('allAnnouncement')}}">{{__('ui.Tutti_gli_annunci')}}</a>
                    <hr class="dropdown-divider"> 
                    @foreach ($categories as $category)
                    <a class="dropdown-item" href="{{route('categoryShow', compact('category'))}}">{{$category->name}}</a>
                    <hr class="dropdown-divider">  
                    @endforeach 
                </div>
                
            </div>
        </div>
    </div>

    

</x-layout>