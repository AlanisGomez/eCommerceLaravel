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
    <p class="form-row form-row-wide"> <label for="reg_email">{{ __('Email') }}<span class="required">*</span></label>
    <input type="email" class="input-text  @error('email') is-invalid @enderror" name="email" id="reg_email" autocomplete="email" value="{{ old('email') }}" required autofocus>
      @error('email')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
    </p>

    <!-- FOMULARIO NOMBRE -->
    <p class="form-row form-row-wide"> <label for="reg_nombre">{{ __('Nombre') }}<span class="required">*</span></label> <input type="text"
    class="input-text  @error('nombre') is-invalid @enderror" name="nombre" id="reg_nombre" autocomplete="nombre" value="{{ old('nombre') }}" required>
      @error('nombre')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
    </p>

    <!-- FOMULARIO APELLIDO -->
    <p class="form-row form-row-wide"> <label for="reg_apellido"{{ __('Apellido') }}<span class="required">*</span></label>
    <input type="text" class="input-text  @error('apellido') is-invalid @enderror" name="apellido" id="reg_apellido" autocomplete="apellido" value="{{ old('apellido') }}" required>
      @error('apellido')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
    </p>

    <!-- FOMULARIO FECHA DE NACIMIENTO -->
    <p class="form-row form-row-wide">
    <label for="fecha">{{ __('Fecha de Nacimiento') }}<span class="required">*</span></label>
    <input type="date" name="fecha" min="1980-01-01" max="2000-01-01" >
    </p>

    <!-- FOMULARIO TIPO DE DOCUMENTO -->
    <p class="form-row form-row-wide">
    <label for="tipoDoc">{{ __('Tipo de Documento') }}<span class="required">*</span></label>
    <select class="form-control"  name="tipoDoc" id="tipo_doc">
    <option value="dni" selected>DNI</option>
    <option value="le">Libreta de enrolamiento</option>
    <option value="lc">Libreta cívica</option>
    </select>
    </p>

    <!-- FOMULARIO DNI-->
    <p class="form-row form-row-wide">
    <label for="dni">{{ __('Fecha de Nacimiento') }}<span class="required">*</span></label>
    <input type="text" class="input-text  @error('apellido') is-invalid @enderror" name="dni" id="dni" autocomplete="DNI" value="{{ old('dni') }}" required>
      @error('dni')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
    </p>

    <!-- FOMULARIO DOMICILIO-->
    <p class="form-row form-row-wide">
    <label for="domicilio">{{ __('Domicilio') }}<span class="required">*</span></label>
    <input type="text" class="input-text  @error('domicilio') is-invalid @enderror" name="domicilio" id="domicilio" autocomplete="Domicilio" value="{{ old('domicilio') }}" required>
      @error('domicilio')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
    </p>

    <!-- FOMULARIO NUMERO DE TELEFONO -->
    <p class="form-row form-row-wide">
    <label for="telefono">{{ __('Telefono') }}<span class="required">*</span></label>
    <input type="text" class="input-text  @error('telefono') is-invalid @enderror" name="telefono" id="telefono" autocomplete="Telefono" value="{{ old('telefono') }}" required>
      @error('telefono')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
    </p>




    <!-- FOMULARIO SEXO -->
    <p class="form-row form-row-wide"> <label for="reg_sexo">{{ __('Sexo') }}<span class="required">*</span></label> <div class="custom-control custom-radio">
    <input type="radio" id="masculino" name="sexo" class="custom-control-input  @error('sexo') is-invalid @enderror" value="ms">
    <label class="custom-control-label" for="masculino">{{ __('Masculino') }}</label>
     </div>
    <div class="custom-control custom-radio">
    <input type="radio" id="femenino" name="sexo" class="custom-control-input  @error('sexo') is-invalid @enderror" value="fm">
    <label class="custom-control-label" for="femenino">{{ __('Femenino') }}</label>
    </div>
    @error('sexo')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </p>

        <!-- FOMULARIO CONTRASEÑA -->
              <p class="form-row form-row-wide"> <label for="reg_password">{{ __('Password') }}<span class="required">*</span></label> <input type="password"
                  class="input-text  @error('password') is-invalid @enderror" name="password" id="reg_password" autocomplete="password">
                @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </p>


            <!-- FOMULARIO CONFIRMAR CONTRASEÑA -->
      <p class="form-row form-row-wide"><label for="reg_passwordConfirm">{{ __('Confirmar contraseña') }}<span class="required">*</span></label><input type="password"
          class="input-text  @error('passwordConfirm') is-invalid @enderror" name="passwordConfirm" id="reg_passwordConfirm" autocomplete="passwordConfirm">
            @error('passwordConfirm')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </p>


          <!-- FOMULARIO ACEPTO TERMINOS -->
        <p>
          <label class="">
            <input class=" @error('terminos') is-invalid @enderror" name="terminos" type="checkbox" id="reg_terminos" value="{{ old('terminos') }}"><span>Acepto términos y condiciones</span><br>
            <a href="terminos-condiciones.php" target="_new"
             > Ver términos y condiciones</a>
          </label>
          @error('terminos')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
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
