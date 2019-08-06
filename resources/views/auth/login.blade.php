@extends('layouts.plantilla')

@section('content')
  <body class="login">

<div class="row justify-content-center login-container">
<section id="login">
<h3 class="text-center titleLogin">LOGIN</h3>
 <div class="col-12 col pb-0">
  <div class="form-login-container">
    <form method="post" enctype="multipart/form-data" action="{{ route('login') }}">
    @csrf
    <!-- FOMULARIO EMAIL -->
    <p class="form-row form-row-wide">
       <label for="log_email">{{ __('E-Mail Address') }}<span class="required">*</span></label>
       <input type="email"
      class="input-text form-control @error('email') is-invalid @enderror" name="email" id="email" autocomplete="email" value="{{ old('email') }}" autofocus>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </p>


      <!-- FOMULARIO CONTRASEÑA -->
    <p class="form-row form-row-wide"><label for="log_password">{{ __('Password') }}<span class="required">*</span></label>
    <input type="password"
      class="input-text  @error('password') is-invalid @enderror" name="password" id="log_password" autocomplete="password" required>
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </p>
    @if (Route::has('password.request'))
        <a class=" btn-link center" href="{{ route('password.request') }}">
            {{ __('Forgot Your Password?') }}
        </a>
    @endif

    <div class="form-group row">
        <div class="col-md-6">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>
        </div>
    </div>

    <p class="form-row buttons"><button type="submit" class="btnSubmit" name="login" value="Login">{{ __('Login') }}</button>

    <a class="btn btnRegister" href="{{ route('register') }}" role="button" name="login">{{ __('Register') }}</a></p>

    </form>
      </div>
      </div>
    </section>
   </div>
  </body>
@endsection
