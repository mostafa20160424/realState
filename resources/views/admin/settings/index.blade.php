@extends('admin.layouts.layout')

@section('title')

الاعدادات

@endsection

@section('content')

@if(session()->has('success'))

    @include('admin.layouts.flash')

@endif

@if(session()->has('error'))
<div class="alert alert-danger">
  {{session('error')}}
</div>
@endif

<section class="content-header">
        <h1>
            تعديل الاعدادات
        </h1>

</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
              <div class="box-body">

                <form action="{{ url('admin/settings') }}" method="POST">
                    {{csrf_field()}}
                    @foreach($settings as $setting)
                    <div class="form-group row">
                        <div class="col-md-2">{{ $setting->slug }}</div>

                        <div class="col-md-10">
                            @if($setting->type==0)
                            {{--Form::text(name,value,[attr like id ,class,...])--}}
                             {!! Form::text($setting->name,$setting->value,['class'=>'form-control']) !!}
                            @else 
                            {!! Form::textarea($setting->name,$setting->value,['class'=>'form-control']) !!}
                            @endif
                        </div>
                            @if ($errors->has($setting->name))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first($setting->name) }}</strong>
                            </span>
                            @endif

                    </div>        
                            
                    @endforeach
                    <button type="submit" class="btn btn-app" name="site_btn">
                        حفظ اعدادات الموقع
                        <i class="fa fa-save"></i>
                    </button>
                </form>
              </div>
            </div>
        </div>
    </div>
</section>

@endsection