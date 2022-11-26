<x-layout>
    <x-slot name='title'>categoria</x-slot>
    <div class="bg-annunci">
        <div class="container mt-5 pt-3 pb-5">
            <div class="row">
                <div class="col-12 margin-top ">
                    
                    
                    <h2 class='text-center my-2 mb-5 title-annunci display-2'><em>{{__('ui.Ecco_i_nostri_annunci_della_categoria')}}</em> <em>{{$category->name}}</em></h2>
                    <div class="row">
                        @forelse ($category->announcements as $announcement)
                        <div class="col-12 col-md-4 col-xl-3 d-flex justify-content-center mb-5 ">
                            <div class="card-annunci">
                                <div class="img-card">
                                    <a href="{{route('detailAnnouncement', compact('announcement'))}}" class=""><div class="copertina-img"></div><img  src="{{!$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(300,300) : 'https://picsum.photos/800/800'}}" class="img-fluid" alt="..."></a>
                                    <i class="fa-solid fa-circle-info text-white fs-3"></i>
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
                            <div class='col-12 margin-bottom'>
                                <p class='h1'>{{__('ui.Non_sono_presenti_annunci_di_questa_categoria')}}</p>
                                <p class='h2'>{{__('ui.Pubblicane_uno')}} : <a class='btn btn-warning shadow' href="{{route('createAnnouncement')}}">{{__('ui.Nuovo_annuncio')}}</a></p>
                            </div> 
                        @endforelse 
                    </div>
                </div>
            </div>
        </div>
    </div>



</x-layout>