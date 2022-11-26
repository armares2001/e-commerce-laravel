<x-layout>
    
    <x-slot name='title'>Registrazione</x-slot>
    <div class="bg-login">
        <div class="container mt-5 pt-5">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 margin-top pt-5">
                    <div class="d-flex justify-content-center">
                        <div class="circle-login d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-user-group fs-1"></i>
                        </div>
                    </div>
                    <h1 class="text-center my-4">{{__('ui.Registrazione')}}</h1>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action={{route('register')}}>
                        @csrf
                        
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user"></i></span>
                            <input type="text" class="form-control my-form-control" placeholder="Nome" aria-label="Username" aria-describedby="basic-addon1" name='name'>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-envelope"></i></span>
                            <input type="email" class="form-control my-form-control" placeholder="example@email.it" aria-label="Email" aria-describedby="basic-addon1" name='email'>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-lock"></i></span>
                            <input type="password" class="form-control my-form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" name='password'>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-lock"></i></span>
                            <input type="password" class="form-control my-form-control" placeholder="Conferma Password" aria-label="Password" aria-describedby="basic-addon1" name='password_confirmation'>
                        </div>               
                        
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="my-btn ">{{__('ui.Registrati')}}</button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>


    

</x-layout>