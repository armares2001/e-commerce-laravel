<x-layout>
    <x-slot name='title'>Login></x-slot>
        <div class="bg-login">    
            <div class="container mt-5 pt-5">
                <div class="row justify-content-center">
                    
                    <div class="col-12 col-md-6 card-login margin-top pt-5 ">
                        <div class="d-flex justify-content-center">
                            <div class="circle-login d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-users fs-1"></i>
                            </div>
                        </div>
                        <h1 class="text-center my-4">{{__('ui.Accedi')}}</h1>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="POST" action={{route('login')}}>
                            @csrf
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-envelope"></i></span>
                                <input type="email" class="form-control my-form-control" placeholder="example@email.it" aria-label="Username" aria-describedby="basic-addon1" name='email'>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-lock"></i></span>
                                <input type="password" class="form-control my-form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" name='password'>
                            </div>
                            {{-- <div class="mb-3">
                                <i class="fa-solid fa-envelope"></i>
                                <label for="exampleInputEmail1" class="form-label">Indirizzo e-mail</label>
                                <input type="email" class="form-control "   aria-describedby="emailHelp" name='email'>
                            </div> --}}
                            {{-- <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" name='password'>
                            </div> --}}
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="my-btn ">{{__('ui.Accedi')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div> 
        </div>
        {{-- <div class="min-vh-100"></div> --}}
</x-layout>