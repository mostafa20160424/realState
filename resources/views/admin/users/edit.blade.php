@extends('admin.layouts.layout')

@section('title')

تعديل عضو
@endsection

@push('css')

{!!Html::style('adminlit/dist/css/sweetalert2.min.css')!!}
@endpush

@section('content')

<section class="content-header">
    <h1>
    تعديل العضو {{$user->name}}
    </h1>

</section>
<section class="content">
    <div class="row">
      <div class="col-lg-4">
        <div class="box">
          <div class="box-body">
            {!! Form::open(['route'=>['users.update',$user->id],'method'=>'PATCH']) !!}
            <div class="form-group">
                    <label for="" class="label-control">  اسم المستخدم </label>                                        
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

                <div class="form-group">
                        <label for="" class="label-control">   البريد الالكترونى</label>                    
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
                <div class="form-group ">
                        <label for="" class="label-control">  كلمه السر</label>

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


                    <div class="form-group">
                        <label for="" class="label-control">اعد كتابه كلمه السر</label>
                            <input id="new-password"
                            type="password"
                             class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                              name="password_confirmation"
                               placeholder="اعد كتابه كلمه السر"
                                 style="margin-left: 10px">
                    </div>
                
                
                <div class="form-group">
                        
                                {!! Form::select('country_id',[0=>'عضو',1=>'مشرف'],$user->admin,['class'=>"form-control",'name'=>'admin']) !!}                                
                        
                    </div> 

                <div class="form-group row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-warning btn-md">
                            تعديل
                        </button>
                    </div>
                </div>    
            {!! Form::close() !!}
          </div>
        </div>
      </div>

      <div class="col-lg-8">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#activity" data-toggle="tab" aria-expanded="true">العقارات المفعله</a></li>
                    <li class=""><a href="#timeline" data-toggle="tab" aria-expanded="false">العقارات غير المفعله</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="activity">
                        <table class="table table-bordered table-hover t1">
                            <tr>
                                <th>اسم العقار</th>
                                <th>سعر العقار</th>
                                <th>نوع العقار</th>
                                <th>مساحه العقار</th>
                                <th>وقت الانشاء </th>
                                <th>الغاء التفعيل </th>
                            </tr>
                            @foreach ($bus_active as $bu)

                                @include('admin.users.active',$bu)

                            @endforeach
                        </table>

                        <div class="text-center">
                            {{ $bus_active->appends(Request::except('page'))->render() }}
                            {{--to show pagination--}}
                            
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="timeline">
                        <table class="table table-bordered table-hover t2">
                            <tr>
                                <th>اسم العقار</th>
                                <th>وقت الانشاء </th>
                                <th>تفعيل العقار </th>
                            </tr>
                            
                            @foreach ($bus_unactive as $bu)

                                 @include('admin.users.active',$bu)

                            @endforeach
                        </table>

                        <div class="text-center">
                            {{ $bus_unactive->appends(Request::except('page'))->render() }}
                            {{--to show pagination--}}
                            
                        </div>
                    </div>
                    <!-- /.tab-pane -->

                </div>
                <!-- /.tab-content -->
            </div>
    <!-- /.nav-tabs-custom -->
        </div>
    </div>
   
</section>


@endsection

@push('js')
{!!Html::script('adminlit/dist/js/sweetalert2.min.js')!!}

<script>
    $(".bu_active").submit(function(e){
        
        var url=$(this).attr("action");
        var attr=$(this).serialize();
        var bu=$(this);
        $.ajax({
            url:url,
            dataType:'JSON',
            type:"post",
            data:attr,
            success:function(data){
                bu.parent().parent().remove();
                swal({
                position: 'center',
                type: 'success',
                title:data.message,
                showConfirmButton: false,
                timer: 2000
            });
            
                
                   $("."+data.tabel).append(data.result);
                   if(data.tabel=="t1"){
                       $(".notifications-menu a span").text($(".notifications-menu a span").text()-1);
                       $(" .notifications-menu .dropdown-menu li .menu .bu-"+data.bu.id+" ").remove();
                   }else{
                        $(".notifications-menu a span").text(parseInt($(".notifications-menu a span").text())+1);
                        $(".notifications-menu .dropdown-menu li .menu")
                        .append("<li><a href='{{ url('admin/bus/"+data.bu.id+"/edit') }}'>"+data.bu.bu_name+"</a></li>");
                   }
                   $(".notifications-menu .dropdown-menu .header")
                       .html("يوجد "+$(".notifications-menu a span").text()+" من العقارات الغير مفعله");

            }
        });
        e.preventDefault();
    });
</script>

@endpush