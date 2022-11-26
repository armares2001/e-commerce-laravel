<x-layout>
    <x-slot name='title'>Tutti gli Annunci</x-slot>
    <div class="bg-annunci">
        <div class="container mt-5 pt-3 pb-5">
            <div class="row">
                <div class="col-12 margin-top">
                    
                    <h2 class='my-2 mb-5 text-center display-2'><em>{{__('ui.Ricerca_per_annuncio')}}</em></h2>
                    <div class="row">
                        @forelse ($announcementsSearch as $announcement)
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
                        <div class="col-12  margin-bottom">
                            <div class="alert alert-warning py-3 shadow">
                                <p class="lead">{{__('ui.Non_ci_sono_annunci!Prova_con_un_altra_parola!')}}</p>
                            </div>
                        </div>     
                        @endforelse
                        {{ $announcementsSearch->links() }}
                    </div>
                </div>
            </div>
        </div>
</div>
</x-layout>