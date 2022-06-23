@include('backend.code-section.js.head-js.head')

@php
$setting = DB::table('settings')->first();  
@endphp
 

<div class="account-pages mt-5 mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-pattern">

                    <div class="card-body p-4">
                        
                        <div class="text-center w-75 m-auto">
                            <div class="auth-logo">
                                <a href="/" class="logo logo-dark text-center">
                                    <span class="logo-lg">
                                        <img src="{{ (!empty($setting->image)) ? url('backend/all-images/web/logo/'.$setting->image): url('backend/all-images/web/default/logo.png') }}" alt="" height="72">
                                    </span>
                                </a>
            
                                <a href="/" class="logo logo-light text-center">
                                    <span class="logo-lg">
                                        <img src="{{ (!empty($setting->image)) ? url('backend/all-images/web/logo/'.$setting->image): url('backend/all-images/web/default/logo.png') }}" alt="" height="72">
                                    </span>
                                </a>
                            </div>
                            <p class="text-muted mb-4 mt-3"></p>
                        </div>

                        @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group mb-3">
                                <label for="email" value="{{ __('Email') }}">Email address</label>
                                <input class="form-control" type="email" name="email" id="email" :value="old('email')" placeholder="Enter your email">
                                @error('email')
                                 <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                 </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="password" value="{{ __('Password') }}">Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" name="password" id="password" class="form-control" autocomplete="current-password" placeholder="Enter your password">
                                    <div class="input-group-append" data-password="false">
                                        <div class="input-group-text">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                </div>
                                @error('password')
                                 <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                 </span>
                                @enderror
                            </div>

                            <div class="form-group mb-0 text-center">
                                <button id="form_submit" class="btn btn-primary btn-block" type="submit"> Log In </button>
                            </div>

                        </form> 
                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->
            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>

@include('backend.code-section.js.main-js.main')
