@extends('layouts.app')

@section('title')
صفحه تسجيل عضويه
@endsection

@section('content')
<div class="container">
    <div class="row ">

                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                        @csrf


                        <div class="form-group row">

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
                            <div class="col-md-6">
                                    <input id="name" type="text"
                                    class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                     name="name"
                                     value=" اسم المستخدم" onfocus="this.value = '';"
                                      onblur="if (this.value == '') {this.value = 'اسم المستخدم'}"
                                       style="margin-left: 10px"
                                       required>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>    
                        <div class="form-group row">

                            <div class="col-md-6">
                                        <input id="new-password"
                                        type="password"
                                         class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                          name="password_confirmation"
                                           required
                                           placeholder="اعد كتابه كلمه السر"
                                             style="margin-left: 10px">
                            </div>

                            <div class="col-md-6">
                                    <input id="password"
                                    type="password"
                                     class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                      name="password"
                                      placeholder="  كلمه السر"                                      
                                       required
                                         style="margin-left: 10px">
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>


                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-warning btn-md">
                                    تسجيل
                                </button>
                            </div>
                        </div>    
                    </form>
    </div>
</div>
@push('js')

@endpush

@endsection
