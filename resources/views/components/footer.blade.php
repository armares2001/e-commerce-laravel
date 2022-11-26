<div class="container-fluid p-4 bg-footer text-light">
    <div class="row justify-content-center">
        <div class="col-12 text-center" >
            <div class="navbar-brand mb-3 ms-3">
                <a class="" href="{{route('welcome')}}"> <img src="/img/Logo_Presto_arancione.png" alt=""></a>
            </div>
            @if (Auth::user())
                @if (!Auth::user()->is_revisor)
                {{-- <p>{{__('ui.Vuoi_lavorare_con_noi?')}}</p> --}}
                {{-- <p>{{__('ui.Registrati_e_clicca_qui')}}</p>
                <div class="">
                    <a href="{{route('become')}}" class="btn btn-warning text-light shadow my-3">
                    {{__('ui.Diventa_revisore')}}
                    </a>
                </div> --}}
                @else
                <p>{{__('ui.Buon_lavoro_revisore')}} <span style="text-transform:uppercase;">{{Auth::user()->name}}</span> </p>
                @endif
            @else
             
            @endif
            © 2022 Company, Inc
            
           
            {{-- @endif --}}
        </div>
        <div class="row justify-content-center mt-2">

            <div class="col-12 col-md-4 d-flex justify-content-center">
                <div>
                    <x-_locale lang="it" nation='it'/> 
                </div>                  
                    
                <div>
                    <x-_locale lang="en" nation='gb'/> 
                </div>    
                    
                <div>
                    <x-_locale lang="ru" nation='ru'/> 
                </div>               
                
    
            </div>
        </div>
    </div>
</div>