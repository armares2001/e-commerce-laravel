<x-layout>
    <x-slot name='title'>Dettaglio</x-slot>
    <div class="bg-annunci">
      

      <div class="container-fluid mt-5 pt-3">
          <div class="row">
              <div class="col-12 margin-top pb-5">
                  <h1 class="display-2 text-center title-annunci"><em>{{__('ui.Annuncio')}}</em> <em>{{$announcement->title}}</em></h1>
              </div>
          </div>
      </div>
      <div class="container ">
          <div class="row justify-content-center">
              <div class="border-detail ">
  
                <div class="col-12 d-flex justify-content-center">
                    <div id="carouselExampleIndicators" class="carousel slide positio-relative" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        @if ($announcement->images)
                                <div class="carousel-inner">
                                    @foreach ($announcement->images as $image )
                                        <div class="carousel-item @if ($loop->first) active @endif">
                                          <img src="{{Storage::url($image->path)}}" class="img-fluid p-3 rounded w-100 d-block" alt="">
                                            
                                        </div>
                                        
                                    @endforeach
                                </div>
                            @else
                            {{-- <div class="carousel-inner">
                                <div class="carousel-item active">
                                  <img src="https://picsum.photos/id/27/1200/400" class="d-block w-100 img-fluid p-3 rounded" alt="">
                                </div>
                                <div class="carousel-item">
                                  <img src="https://picsum.photos/id/28/1200/400" class="d-block w-100 img-fluid p-3 rounded" alt="...">
                                </div>
                                <div class="carousel-item">
                                  <img src="https://picsum.photos/id/29/1200/400" class="d-block w-100 img-fluid p-3 rounded" alt="...">
                                </div>
                            </div> --}}
                            @endif
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Next</span>
                        </button>
                      </div>
                </div>
                <div class="col-12 d-flex justify-content-center">
                  <div class="card" >
                    {{-- <img  src="https://picsum.photos/200" class="card-img-top p-3 rounded" alt="..."> --}}
                    <div class="card-body">
                      <a href="{{route('categoryShow',['category'=>$announcement->category]),}}" class="card-text nav-link category-card-detail text-center text-dark">{{$announcement->category->name}}</a>
                      <div class="d-flex justify-content-between">
                        <h5 class="card-title fs-1 text-capitalize">{{$announcement->title}}</h5>
                        <p class="card-text price-card-detail">{{$announcement->price}}$</p>
                      </div>
                      
                      <p class="card-text">{{$announcement->body}}</p>
                      
                      
                      <div class="">
                        <p class="card-footer text-muted pubblicato-card-detail text-center">{{__('ui.Pubblicato_il')}} {{$announcement->created_at->format(' d/m/Y')}}</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="mb-5 pb-5"></div>
            </div>
      </div>
      </div>
    </div>
</x-layout>