@extends('layouts.app')

@section('title')
اهلا بك
@endsection

@push('css')

<link rel="stylesheet" href="{{url('website/amazing/css/reset.css')}}"> <!-- CSS reset -->
<link rel="stylesheet" href="{{url('website/amazing/css/style.css')}}"> <!-- Resource style -->
<script src="{{url('website/amazing/js/modernizr.js')}}"></script> <!-- Modernizr -->

@endpush

@if(session()->has('flash_message'))
@include('admin.layouts.flash')
@endif

@section('content')
<div class="banner ">
        <div class="container">
          <div class="banner-info text-center">
            <h1 class="">
              اهلا بك فى
              {{getSetting()}}
            </h1>
            <p>
                {!! Form::open(['url'=>"search",'action'=>"POST"]) !!}
                {{--can put method replace with action--}}
                
                <div class="row">



                    <div class="col-md-3">
                        
                      {!! Form::select(
                        'rooms',
                        rooms(),
                        old('rooms'),
                        ['class'=>'form-control ','placeholder'=>'عدد الغرف',])
                       !!}                        
                    </div>
                  
                    <div class="col-md-3">
                        
                      {!! Form::select(
                        'bu_type',
                        bu_type(),
                        old('bu_type'),
                        ['class'=>'form-control ','placeholder'=>' نوع العقار',]
                        ) !!}                        
                    </div>

                    <div class="col-md-3">
                        {!! Form::text(
                          'bu_price_from',
                          old('bu_price_from'),
                          ['class'=>'form-control ','placeholder'=>'سعر العقار من',]
                          ) !!}
                       </div>
                       <div class="col-md-3">
                   
                         {!! Form::text(
                           'bu_price_to',
                           old('bu_price_to'),
                           ['class'=>'form-control ','placeholder'=>'سعر العقار الى',]
                           ) !!}  
   
                       </div>

                       <div class="clearfix"></div>

                    <div class="col-md-3">
                        
                      {!! Form::submit("ابحث",
                      ['class'=>'btn btn-warning search']
                      ) !!}
                    </div>



                    <div class="col-md-3">
                        
                      {!! Form::select(
                        'bu_place',
                        bu_place(),
                        old('bu_place'),
                        ['class'=>'form-control','placeholder'=>' مكان العقار',])
                        !!}                        
                    </div>

                  <div class="col-md-3">
                        
                    {!! Form::select(
                      'bu_rent',
                      bu_rent(),
                      old('bu_rent'),
                      ['class'=>'form-control','placeholder'=>'نوع العمليه',])
                      !!}                        
                  </div>

                  <div class="col-md-3">
                      
                    {!! Form::text('bu_square',
                    old('bu_square'),
                    ['class'=>'form-control','placeholder'=>'المساحه',]
                    ) !!}
                  </div>

                  
                </div>{{--end row--}}
                        
                
                {!! Form::close() !!}
            </p>
           
            <a class="banner_btn text-center" href="{{ url('user/create/bu') }}">اضف عقارك مجانا</a>
           </div>
          </div>
        </div>
      <div class="main">
        <ul class="cd-items cd-container">
          @foreach($bus as $key=>$bu)
          <li class="cd-item effect8">
            <img src="{{img_path($bu->image)}}" alt="{{$bu->name}}" title="{{$bu->name}}">
            <a href="#{{$key}}" data-id="{{$bu->id}}" class="cd-trigger">نبذه سريه </a>
          </li> <!-- cd-item -->
          @endforeach
      
        </ul> <!-- cd-items -->
      
        <div class="cd-quick-view">
          <div class="cd-slider-wrapper">
            <ul class="cd-slider">
              <li class="selected"><img class="imgbox" src="" alt=""></li>

            </ul> <!-- cd-slider -->

          </div> <!-- cd-slider-wrapper -->
      
          <div class="cd-item-info">
            <h2 class="titlebox"></h2>
            <p class="discbox"></p>
      
            <ul class="cd-item-action">
              <li><a class="add-to-cart pricebox"></a></li>					
              <li><a href="#0" class="morebox">اقراء المزيد</a></li>	
            </ul> <!-- cd-item-action -->
          </div> <!-- cd-item-info -->
          <a href="#0" class="cd-close">Close</a>
        </div> <!-- cd-quick-view -->
      </div>

@push('js')
<script src="{{url('website/amazing/js/velocity.min.js')}}"></script>
<script>
  function urlHome()
  {
    return "{{ Request::root() }}";
  }
</script>
<script src="{{url('website/amazing/js/main.js')}}"></script> 
@endpush

@endsection