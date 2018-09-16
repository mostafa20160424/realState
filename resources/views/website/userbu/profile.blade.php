@extends('layouts.app')

@section('title')

تعديل معلوماتى
@endsection

@section('content')

@include("website.userbu.message")

<div class="container">
    
    <div class="row profile">
    
        <div class="col-md-9">
            <div class="profile-content">
                        
            {!! Form::open(['url'=>'myprofile/'.$user->id,'method'=>'PATCH']) !!}
            <div class="form-group row">
                    <div class="col-md-6">
                            <input id="name" type="text"
                            class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                            name="name"
                            placeholder=" اسم المستخدم" 
                            value="{{ $user->name }}"
                            style="margin-left: 10px"
                            required>
                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>



                    <div class="col-md-6">
                            <input id="email" type="email"
                            class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                            name="email"
                            placeholder="البريد الالكترونى" 
                            value="{{ $user->email }}"
                            style="margin-left: 10px"
                            required>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>    
                <div class="form-group row">
                    <div class="col-md-6">
                            <input id="password"
                            type="password"
                            class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                            name="password"
                            placeholder=" كلمه السر"                                      
                                style="margin-left: 10px">
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>


                    <div class="col-md-6">
                            <input id="new-password"
                            type="password"
                            class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                            name="password_confirmation"
                            placeholder="اعد كتابه كلمه السر"
                                style="margin-left: 10px">
                    </div>
                </div>
                


                <div class="form-group row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-warning btn-md">
                            تعديل
                        </button>
                    </div>
                </div>    
            {!! Form::close() !!}
            </div>{{-- end profile-content --}}
        </div>
        @include('website.bu.pages')
    </div>{{-- end row-profile --}}
</div>

@endsection