@extends('layouts.app')

@section('title')
صفحه تسجيل الدخول
@endsection

@section('content')

                    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @csrf
                        <div class="container">
                        <div class="row">
                            <h3>تسجيل الدخول</h3>
                            <div class="col-md-6">
                                <input id="password"
                                 type="password"
                                  class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                   name="password"
                                    required
                                    placeholder="كلمه السر" 
                                      style="margin-left: 10px">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                            <div class="col-md-6">
                                    <input id="email" type="email"
                                     class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                      name="email"
                                      value="البريد الالكترونى" onfocus="this.value = '';"
                                       onblur="if (this.value == '') {this.value = 'البريد الالكترونى';}"
                                        style="margin-left: 10px"
                                        required>
    
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>

                            <div class="col-md-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        تذكرنى
                                    </label>
                                </div>
                            </div>


    
                            <div class="col-md-12 ">
                                <button type="submit" class="btn btn-primary">
                                    تسجيل الدخول
                                </button>

                                <a class="banner_btn" href="{{ route('password.request') }}">
                                    نسيت كلمه السر
                                </a>
                        </div>       
                    </div> 
                </div>
            </form>

@endsection
