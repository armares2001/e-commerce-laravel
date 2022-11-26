<div class="">
    @if (session()->has('message'))
            <div class="flex flex-row justify-center my-2 p-3 alert-success">
                {{session ('message')}}
            </div>
    @endif
    <h1 class="text-center display-3 mb-4 title-annunci"><em>{{__('ui.Crea_il_tuo_annuncio')}}</em></h1>
    <form wire:submit.prevent='store'>
        @csrf
        <div class="mb-3">
            <label for="exampleInputText" class="form-label"></label>
            <input type="text"   aria-describedby="textHelp" class="form-control my-form-control @error('title') is-invalid @enderror" placeholder="{{__('ui.Titolo')}}" wire:model='title'>
            @error('title')
                {{$message}}
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label"></label>
            <textarea wire:model='body' type='text' class="form-control my-form-control @error('body') is-invalid @enderror" placeholder="{{__('ui.Descrizione')}}" cols="30" rows="10"></textarea>
            @error('body')
                {{$message}}
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label"></label>
            <input type="text" class="form-control my-form-control @error('price') is-invalid @enderror" placeholder="{{__('ui.Prezzo')}}" wire:model='price'>
            @error('price')
                {{$message}}
            @enderror
        </div>
        <div class="mb-3">
            <label for="category" class="form-label  @error('price') is-invalid @enderror"></label>
            <select wire:model.defer="category" id="category" class="form-control my-form-control text-muted">
                <option value="">{{__('ui.scegli_la_categoria')}}</option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            @error('category')
                {{$message}}
            @enderror
            
            {{-- <input type="number" class="form-control @error('price') is-invalid @enderror" wire:model='price'>
            @error('price')
                {{$message}}
            @enderror --}}
        </div>
        <div class="mb-3">
            <label class="form-label">{{__('ui.Immagini')}}</label>
            <input multiple type="file" name="images" class="form-control my-form-control @error('temporary_images.*') is-invalid @enderror text-muted" wire:model='temporary_images'>
            @error('temporary_images.*')
                {{$message}}
            @enderror
        </div>
        @if (!empty($images))
            <div class="row">
                <div class="col-12">
                    <p>Photo preview:</p>
                    <div class="row border border-4 border-info rounded shadow py-4">
                        @foreach ($images as $key=>$image )
                            <div class="col my-3">
                                <div class="img-preview mx-auto shadow rounded" style="background-image: url({{$image->temporaryUrl()}}); height:300px; width:300px;"></div>
                                <button class="btn btn-danger shadow d-block text-center mt-2 mx-auto" type="button" wire:click="removeImage({{$key}})">{{__('ui.Cancella')}}</button>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
        <div class="d-flex justify-content-center mt-4">
            <button type="submit" class="my-btn-annunci ">{{__('ui.Crea_il_tuo_annuncio')}}</button>
        </div>
        <div class="mb-5 pb-5"></div>
    </form>
</div>

