@extends('layouts.plantilla')

@section('content')
  <body class="register">
<div class="row justify-content-center register-container">
<section id="register">
<h3 class="text-center titleLogin">{{ __('REGISTER') }}</h3>
<div class="col-12 col pb-0">
<div class="form-register-container">
<form method="post" enctype="multipart/form-data" action="{{ route('register') }}">
  @csrf
    <!-- FOMULARIO EMAIL -->
    <p class="form-row form-row-wide"> <label for="email">{{ __('Email') }}<span class="required">*</span></label>
    <input type="email" class="input-text  form-control @error('email') is-invalid @enderror" name="email" id="reg_email" autocomplete="email" value="{{ old('email') }}"  autofocus>
      @error('email')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
    </p>

    <!-- FOMULARIO NOMBRE -->
    <p class="form-row form-row-wide"><label for="nombre">{{ __('Nombre') }}<span class="required">*</span></label> <input type="text"
    class="input-text form-control @error('nombre') is-invalid @enderror" name="nombre" id="reg_nombre" autocomplete="nombre" value="{{ old('nombre') }}" >
      @error('nombre')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
    </p>

    <!-- FOMULARIO APELLIDO -->
    <p class="form-row form-row-wide"> <label for="apellido">{{ __('Apellido') }}<span class="required">*</span></label>
    <input type="text" class="input-text form-control @error('apellido') is-invalid @enderror" name="apellido" id="reg_apellido" autocomplete="apellido" value="{{ old('apellido') }}" >
      @error('apellido')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
    </p>

    <!-- FOMULARIO FECHA DE NACIMIENTO -->
    <p class="form-row form-row-wide">
    <label for="fec_nac">{{ __('Fecha de Nacimiento') }}<span class="required">*</span></label>
    <input type="date" name="fec_nac" min="1980-01-01" max="2000-01-01" class=" form-control @error('fec_nac') is-invalid @enderror" >
      @error('fec_nac')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
    </p>

    <!-- FOMULARIO TIPO DE DOCUMENTO -->
    <p class="form-row form-row-wide">
    <label for="doc_tipo">{{ __('Tipo de Documento') }}<span class="required">*</span></label>
    <select class="form-control @error('doc_tipo') is-invalid @enderror"  name="doc_tipo" id="doc_tipo">
    <option value="dni" selected>DNI</option>
    <option value="lde">Libreta de enrolamiento</option>
    <option value="lbc">Libreta cívica</option>
    </select>
    @error('doc_tipo')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    </p>

    <!-- FOMULARIO DNI-->
    <p class="form-row form-row-wide">
    <label for="documento">{{ __('Numero de documento') }}<span class="required">*</span></label>
    <input type="text" class="input-text form-control @error('documento') is-invalid @enderror" name="documento" id="dni" autocomplete="DNI" value="{{ old('documento') }}" >
      @error('documento')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
    </p>

    <!-- FOMULARIO DOMICILIO-->
    <p class="form-row form-row-wide">
    <label for="domicilio">{{ __('Domicilio') }}<span class="required">*</span></label>
    <input type="text" class="input-text form-control @error('domicilio') is-invalid @enderror" name="domicilio" id="domicilio" autocomplete="Domicilio" value="{{ old('domicilio') }}" >
      @error('domicilio')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
    </p>

    <!-- FOMULARIO NUMERO DE TELEFONO -->
    <p class="form-row form-row-wide">
    <label for="telefono">{{ __('Telefono') }}<span class="required">*</span></label>
    <input type="text" class="input-text form-control @error('telefono') is-invalid @enderror" name="telefono" id="telefono" autocomplete="Telefono" value="{{ old('telefono') }}" >
      @error('telefono')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
    </p>


    <!-- FOMULARIO SEXO -->
    <p class="form-row form-row-wide">
      <label for="sexo">{{ __('Sexo') }}<span class="required">*</span></label> <div class="custom-control custom-radio">
    <input type="radio" id="masculino" name="sexo" class="custom-control-input  @error('sexo') is-invalid @enderror" value="m">
    <label class="custom-control-label" for="masculino">{{ __('Masculino') }}</label>
     </div>
    <div class="custom-control custom-radio">
    <input type="radio" id="femenino" name="sexo" class="custom-control-input  @error('sexo') is-invalid @enderror" value="f">
    <label class="custom-control-label" for="femenino">{{ __('Femenino') }}</label>
    </div>
    @error('sexo')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </p>

  <p class="form-row form-row-wide">
    <label for="role">{{__('Tipo de cuenta')}}</label>
    <select class="form-control @error('role') is-invalid @enderror"  name="role" id="role">
    <option value="customer" selected>Customer</option>
    <option value="admin">Admin</option>
    </select>
    @error('role')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</p>


      <!-- FOMULARIO CONTRASEÑA -->
              <p class="form-row form-row-wide"><label for="password">{{ __('Password') }}<span class="required">*</span></label><input type="password"
                  class="input-text form-control @error('password') is-invalid @enderror" name="password" id="password" autocomplete="password">
                @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </p>
                <p class="form-row form-row-wide"><label for="password_confirmation">{{ __('Confirm Password') }}<span class="required">*</span></label><input type="password"
                    class="input-text form-control" name="password_confirmation" id="password-confirm" autocomplete="new-password">
                  </p>



          <label class="">
            <input class="" name="terminos" type="checkbox" id="reg_terminos" value="{{ old('terminos') }}"><span>Acepto términos y condiciones</span><br>
            <a href="terminos-condiciones.php" target="_new"
             > Ver términos y condiciones</a>
          </label>

          </p>



          <div class="privacy-policy-text"></div>
          <p class="form-row"><button type="submit" class="btnSubmit" name="register" value="Register">{{ __('Registrarme') }}</button></p>
          </form>
          </div>
            </div>
          </section>
        </div>

          </body>

@endsection
