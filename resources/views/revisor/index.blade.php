<x-layout>
    <x-slot name='title'>home revision</x-slot>
    <div class="bg-annunci">
        <div class="container-fluid p-5  p-5 shadow mb-4">
            <div class="row">
                <div class="col-12 text-light p-5 margin-top-sezione">
                    <h1 class="display-2 text-dark">
                        {{-- {{$announcement_to_check ? 'Ecco l\'annuncio da revisionare' : 'Non ci sono annunci da revisionare'}} --}}
                        @if ($announcement_to_check)
                        {{__('ui.Ecco_l_annuncio_da_revisionare')}}
                        @else
                        {{__('ui.Non_ci_sono_annunci_da_revisionare')}}
                        @endif
                        
                        
                    </h1>
                </div>
            </div>
        </div>
        

        @if ($announcement_to_check)
        <div class="container mt-5  pt-5 ">
            <div class="row"> 
                @if ($announcement_to_check->images)
                @foreach ($announcement_to_check->images as $image )
                <div class="card-revisor-1 mb-4">
                    <div class="col-12 col-md-6 d-flex align-items-center justify-content-around">
                        <img src="{{$image->getUrl(300,300)}}"  class="img-fluid p-3 rounded" alt="">
                    </div>
                    <div class="col-12 col-md-3 py-5">
                        <div>
                            
                            <div>
                                <p> <span class="{{$image->adult}}"></span> {{__('ui.adult')}} </p>
                                <hr>
                                <p> <span class="{{$image->spoof}}"></span> {{__('ui.spoof')}}</p>
                                <hr>
                                <p> <span class="{{$image->medical}}"></span> {{__('ui.medical')}}</p>
                                <hr>
                                <p> <span class="{{$image->violence}}"></span> {{__('ui.violence')}}</p>
                                <hr>
                                <p> <span class="{{$image->racy}}"></span> {{__('ui.racy')}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-3 py-5">
                        <div>
                            <h5 class="tc-accent mt-3">Tags</h5>
                            <div class="p-2">
                            @if ($image->labels)
                                @foreach ($image->labels as $label )
                                    <p class="d-inline">{{$label}}</p>
                                @endforeach
                            @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>  
        
        {{-- @if ($announcement_to_check)
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                            @if ($announcement_to_check->images)
                                <div class="carousel-inner">
                                    
                                    <div class="card-revisor mb-3">
                                        <div class="row p-2">
                                            @foreach ($announcement_to_check->images as $image )
                                            
                                                <div class="carousel-item  @if ($loop->first) active @endif">
                                                    
                                                        <div class="row p-2">
                                                            <div class="col-12  ">
                                                                <img src="{{$image->getUrl(300,300)}}"  class="img-fluid p-3 rounded" alt="">
                                                            </div>
                                                            <div class="row">
    
                                                                <div class="col-6">
                                                                    <div class="carb-body">
                                                                        <h5 class="tc-accent">Revisione Immagini</h5>
                                                                        <p> <span class="{{$image->adult}}"></span> Adulti</p>
                                                                        <hr>
                                                                        <p> <span class="{{$image->spoof}}"></span> Satira</p>
                                                                        <hr>
                                                                        <p> <span class="{{$image->medical}}"></span> Medicina</p>
                                                                        <hr>
                                                                        <p> <span class="{{$image->violence}}"></span> Violenza</p>
                                                                        <hr>
                                                                        <p> <span class="{{$image->racy}}"></span> Piccante</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6 border-start">
                                                                    <h5 class="tc-accent mt-3">Tags</h5>
                                                                    <div class="p-2">
                                                                        @if ($image->labels)
                                                                            @foreach ($image->labels as $label )
                                                                                <p class="d-inline">{{$label}}</p>
                                                                                <hr>
                                                                            @endforeach
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>
                                            
                                            
                                            
                                            
                                            @endforeach
                                        </div>
                                    </div>
                                        
                                    
                                </div> --}}
                            @else
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                  <img src="https://picsum.photos/id/27/1200/400" class="d-block w-100 img-fluid p-3 rounded" alt="">
                                </div>
                                <div class="carousel-item">
                                  <img src="https://picsum.photos/id/28/1200/400" class="d-block w-100 img-fluid p-3 rounded" alt="...">
                                </div>
                                <div class="carousel-item">
                                  <img src="https://picsum.photos/id/29/1200/400" class="d-block w-100 img-fluid p-3 rounded" alt="...">
                                </div>
                            </div>
                            @endif
                            
                            {{-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Next</span>
                            </button> --}}
                        </div>
                        <h5 class="cart-title mt-5 text-center">
                            {{__('ui.Titolo')}}: {{$announcement_to_check->title}}
                        </h5>
                        <p class="card-text text-center">
                            {{__('ui.Descrizione')}}: {{$announcement_to_check->body}}  
                        </p>
                        <p class="card-footer text-center">
                            {{__('ui.Pubblicato_il')}} {{$announcement_to_check->created_at->format('d/m/Y')}}    
                        </p>  
                    </div>
                </div>
                <div class="row mb-5">
                    <div class=" col-md-6 text-end">
                        <form action="{{route('accept_announcement',['announcement'=>$announcement_to_check])}}" method="POST">
                        @csrf
                        @method('PATCH')
                        
                            
                                <button type="submit" class="btn btn-success shadow">
                                    {{__('ui.Accetta')}}
                                </button>
                            
                        
                        </form>
                    </div>
                    <div class=" col-md-6  ">
                        <form action="{{route('reject_announcement',['announcement'=>$announcement_to_check])}}" method="POST">
                        @csrf
                        @method('PATCH')
                            <button type="submit" class="btn btn-danger shadow">
                                {{__('ui.Rifiuta')}}
                            </button>
                        </form>
                    </div>
                </div>
                
            </div>
        @endif

    </div>
    
</x-layout>