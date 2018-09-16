@extends('admin.layouts.layout')

@section('title')

تعديل العقار 
@endsection

@section('content')

<section class="content-header">
    <h1>
        تعديل العقار | {{$bu->bu_name}}        
    </h1>

</section>
<section class="content">
    <div class="row">
        <div class="col-md-3">
         
          <div class="box box-primary">
            <div class="box-body box-profile">

            <h3 class="profile-username text-center">{{$user->name}}</h3>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                <b>نوع العضو</b> <a class="pull-left">{{contact_type()[$user->admin]}}</a>
                </li>
              </ul>
                
                        <a href="{{route('users.edit',$user->id)}}"
                                 class="btn btn-primary btn-block"><b>المزيد</b></a>
            </div>
            <!-- /.box-body -->
          </div>

         
        </div>
      <div class="col-xs-9">
        <div class="box">
          <div class="box-body">
            {!! Form::open(['route'=>['bus.update',$bu->id],'method'=>'PATCH','files'=>true]) !!}
            <div class="form-group">
                <label class="">اسم العقار</label>
                {!! Form::text('bu_name',$bu->bu_name,['class'=>'form-control','placeholder'=>'اسم العقار']) !!}
            </div>

            <div class="form-group">
                    <label class="">عدد الغرف</label>
                    {!! Form::select('rooms',rooms(),$bu->rooms,['class'=>'form-control']) !!}
                </div>
            
            <div class="form-group">
                    <label class="">سعر العقار</label>
                    {!! Form::text('bu_price',$bu->bu_price,['class'=>'form-control ','placeholder'=>'سعر العقار']) !!}
            </div>

            <div class="form-group">
                <label class=""> مكان العقار</label>
                {!! Form::select('bu_place',bu_place(),$bu->bu_place,['class'=>'form-control']) !!}
                </div>{{--bu_rent() is helper function return an array--}}

            <div class="form-group">
                    <label class=""> نوع العمليه</label>
                    {!! Form::select('bu_rent',bu_rent(),$bu->bu_rent,['class'=>'form-control']) !!}
            </div>{{--bu_rent() is helper function return an array--}}

            <div class="form-group">
                    <label class="">مساحه العقار</label>
                    {!! Form::text('bu_square',$bu->bu_square,['class'=>'form-control','placeholder'=>'مساحه العقار']) !!}
            </div>

            <div class="form-group">
                    <label class=""> نوع العقار</label>
                    {!! Form::select('bu_type',bu_type(),$bu->bu_type,['class'=>'form-control']) !!}
            </div>{{--bu_type() is helper function return an array--}}

            <div class="form-group">
                <div class="input-file-container">  
                    <label class=""> صوره العقار</label>                    
                        <input class="input-file" id="my-file" type="file" name="image">
                        <label tabindex="0" for="my-file" class="input-file-trigger">اختر صوره...</label>
                </div>
                <p class="file-return"></p>
                <img src="{{img_path($bu->image)}}" width="100px" height="100px">
            </div>

            <div class="form-group">
                    <label class=""> الكلمات الدلاليه</label>
                    {!! Form::text('bu_meta',$bu->bu_meta,['class'=>'form-control','placeholder'=>'مساحه العقار']) !!}
            </div>

            <div class="form-group">
                    <label class=""> وصف العقار لمحركات البحث</label>
                    {!! Form::textarea('bu_small_ds',$bu->bu_small_ds,['class'=>'form-control','placeholder'=>'وصف الرابط للعقار','rows'=>4,'maxlength'=>160]) !!}
                    <br>
                    <div class="alert alert-warning">لا يمكن ادخال اكثر من 160 حرف على حسب معايير جوجل</div>
            </div>

            <div class="form-group">
                    <label class="">  خط الطول</label>
                    {!! Form::text('bu_langtude',$bu->bu_langtude,['class'=>'form-control','placeholder'=>'خط الطول ']) !!}
            </div>

            <div class="form-group">
                    <label class=""> دائره العرض</label>
                    {!! Form::text('bu_latitude',$bu->bu_latitude,['class'=>'form-control','placeholder'=>'دائره العرض']) !!}
            </div>

            <div class="form-group">
                    <label class=""> وصف مطول العقار  </label>
                    {!! Form::textarea('bu_large_ds',$bu->bu_large_ds,['class'=>'form-control','placeholder'=>'وصف مساحه وشكل العقار',]) !!}
            </div>

            <div class="form-group">
                    <label class=""> نوع العقار</label>
                    {!! Form::select('bu_status',bu_status(),$bu->bu_status,['class'=>'form-control']) !!}
            </div>{{--bu_status() is helper function return an array--}}

            <div class="form-group">
                <input type="submit" value="تعديل العقار" class="btn btn-success btn-lg">
            </div>
            {!! Form::close() !!}
          </div>
        </div>
    </div>
</section>
@endsection