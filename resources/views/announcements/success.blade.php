<x-layout>
    <x-slot name="title">Thank You</x-slot>
    
    <div class="container container-grazie margin-top">
        <div class="row align-items-center h-100">
            <div class="col-12 text-center">
                <i class="fas fa-check-circle fs-1 text-success"></i>
                <h2>{{__('ui.Grazie_per_l_annuncio_inserito')}}</h2>
                <a class="btn btn-primary mt-3" href="{{route('welcome')}}">Torna alla Home</a>
            </div>
        </div>
    </div>
</x-layout>