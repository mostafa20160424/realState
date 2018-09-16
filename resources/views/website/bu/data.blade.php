
@if(count($buAll)>0)

@foreach($buAll as $key=>$bu)
<div class="col-md-4 pull-right bu">
    <div class="thumbnail">
      <img src="{{img_path($bu->image)}}" alt="" class="img-responsive">
      <div class="caption">
        <h4 class="pull-right">{{$bu->bu_price}} جنيه</h4>
        <h4 style="text-align:left"><a href="{{url('SingleBullding/'.$bu->id)}}">{{$bu->bu_name}}</a></h4>
        <p>
            {{str_limit($bu->bu_small_ds,100)}}
        </p>
      </div>

      <hr>
      <span class="pull-right">نوع العمليه : {{bu_rent()[$bu->bu_rent]}}</span>
      <span style="text-align:left" class="pull-left"> المساحه : {{$bu->bu_square}}</span>
      <div class="clearfix"></div>
      <p class="pull-right">نوع العقار : {{bu_type()[$bu->bu_type]}}</p> 
      <p class="pull-right"> مكان العقار : {{bu_place()[$bu->bu_place]}}</p>
      <div class="clearfix"></div>
      <hr>
      <div class="space-ten"></div>
        @if($bu->bu_status)
          <a href="{{url('SingleBullding/'.$bu->id)}}" class="btn btn-primary" ><i class="fa fa-search"></i>  اظهر التفاصيل</a>
        @else
        <a href="{{url('SingleBullding/'.$bu->id)}}" class="btn btn-danger disabled pull-left" ><i class="fa fa-search"></i>   العقار بانتظار تفعيل الاداره</a>        
        <a href="{{url('SingleBullding/edit/'.$bu->id)}}" class="btn btn-warning pull-right" ><i class="fa fa-edit"></i>  تعديل العقار </a>  
        <div class="clearfix"></div>      
        @endif  
        <div class="space-ten"> </div>
    </div>
  </div>

    @if($key%2==0 &&$key!=0)
        <div class="clearfix"></div>
    @endif
  @endforeach

  <div class="clearfix"></div>

@else
<div class="alert alert-danger">
    لا توجد عقارات
</div>

@endif
