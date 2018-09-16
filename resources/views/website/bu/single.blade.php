@extends('layouts.app')

@section('title')
 العقار ({{$bu->bu_name}})
@endsection

@push('css')


<style>
    .label{
        font-size:100%;
        margin:2px;
    }
</style>


@endpush

@section('content')
<div class="container">
        <div class="row profile">
                
                    <div class="col-md-9">
                            <ol class="breadcrumb">
                                    <li><a href="{{ url('/') }}">الرئيسيه</a></li>
                                    <li><a href="{{ url('showall') }}">كل العقارات</a></li>
                                    <li><a href="#">{{ $bu->bu_name }}</a></li>
                                    
                            </ol>
                        <div class="profile-content">
                            <h1>{{ $bu->bu_name }}</h1>
                            <hr>
                            <div class="btn-group" role="group" style="direction:rtl">
                                <a href="{{ url('search/').'?'.'bu_price='.$bu->bu_price }}" class="btn btn-info"> السعر : {{$bu->bu_price}} </a>
                                <a href="{{ url('search/').'?'.'bu_square='.$bu->bu_square }}"  class="btn btn-warning">المساحه : {{$bu->bu_square}}  </a>
                                <a href="{{ url('search/').'?'.'rooms='.$bu->rooms }}"  class="btn btn-success">عدد الغرف : {{$bu->rooms}}   </a>
                                <a href="{{ url('search/').'?'.'bu_place='.$bu->bu_place }}"  class="btn btn-primary">المنطقه : {{bu_place()[$bu->bu_place]}}  </a>
                                <a href="{{ url('search/').'?'.'bu_type='.$bu->bu_type }}"  class="btn btn-danger">نوع العمليه : {{bu_type()[$bu->bu_type]}}   </a>
                                <a href="{{ url('search/').'?'.'bu_rent='.$bu->bu_rent }}"  class="btn btn-default">نوع العقار : {{bu_rent()[$bu->bu_rent]}}  </a>
                            </div>
                            <hr>
                            <p class="lead">{{$bu->bu_large_ds}}</p>
                            <div id="map" style="width:100%;height:500px"></div>
                        </div>
                        <h1>عقارات متشابهه</h1>
                        <hr>
                        <div class="profile-content">
                            @include('website.bu.data',['buAll'=>$sameRent])
                            @include('website.bu.data',['buAll'=>$sameType])
                        </div>

                    </div>

                    @include('website.bu.pages'){{--include sidebar--}}
                
                </div>
</div>

@push('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCm2GBd6s_E0S5yVjSglJL4qImebbC6yOY&callback=myMap"
type="text/javascript"></script>
<script>
    function myMap() {
      var mapCanvas = document.getElementById("map");
      var myCenter = new google.maps.LatLng({{$bu->bu_latitude}},{{$bu->bu_langtude}}); 
      var mapOptions = {center: myCenter, zoom: 5};
      var map = new google.maps.Map(mapCanvas,mapOptions);
      var marker = new google.maps.Marker({
        position: myCenter,
        animation: google.maps.Animation.BOUNCE
      });
      marker.setMap(map);
    }
    </script>
@endpush

@endsection