@extends('admin.layouts.layout')

@section('title')

اضافه عقار جديد
@endsection

@section('content')

<section class="content-header">
        <h1>
        اضافه عقار
        </h1>

</section>

<section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-body">
                
                    <form method="POST" action="{{ url('admin/bus') }}" aria-label="{{ __('Register') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="">اسم العقار</label>
                            {!! Form::text('bu_name',old('bu_name'),['class'=>'form-control','placeholder'=>'اسم العقار']) !!}
                        </div>

                        <div class="form-group">
                                <label class="">عدد الغرف</label>
                                {!! Form::select('rooms',rooms(),old('rooms'),['class'=>'form-control']) !!}
                        </div>
                        
                        <div class="form-group">
                                <label class="">سعر العقار</label>
                                {!! Form::text('bu_price',old('bu_price'),['class'=>'form-control ','placeholder'=>'سعر العقار']) !!}
                        </div>

                        <div class="form-group">
                                <label class=""> نوع العمليه</label>
                                {!! Form::select('bu_rent',bu_rent(),old('bu_rent'),['class'=>'form-control']) !!}
                        </div>{{--bu_rent() is helper function return an array--}}

                        <div class="form-group">
                                <label class=""> مكان العقار</label>
                                {!! Form::select('bu_place',bu_place(),old('bu_place'),['class'=>'form-control']) !!}
                        </div>{{--bu_rent() is helper function return an array--}}

                        <div class="form-group">
                                <label class="">مساحه العقار</label>
                                {!! Form::text('bu_square',old('bu_square'),['class'=>'form-control','placeholder'=>'مساحه العقار']) !!}
                        </div>

                        <div class="form-group">
                                        <div class="input-file-container">  
                                            <label class=""> صوره العقار</label>                    
                                                <input class="input-file" id="my-file" type="file" name="image">
                                                <label tabindex="0" for="my-file" class="input-file-trigger">اختر صوره...</label>
                                        </div>
                                        <p class="file-return"></p>
                        </div>

                        <div class="form-group">
                                <label class=""> نوع العقار</label>
                                {!! Form::select('bu_type',bu_type(),old('bu_type'),['class'=>'form-control']) !!}
                        </div>{{--bu_type() is helper function return an array--}}

                        <div class="form-group">
                                <label class=""> الكلمات الدلاليه</label>
                                {!! Form::text('bu_meta',old('bu_meta'),['class'=>'form-control','placeholder'=>'مساحه العقار']) !!}
                        </div>

                        <div class="form-group">
                                <label class=""> وصف العقار لمحركات البحث</label>
                                {!! Form::textarea('bu_small_ds',old('bu_small_ds'),['class'=>'form-control','placeholder'=>'وصف الرابط للعقار','rows'=>4,'maxlength'=>160]) !!}
                                <br>
                                <div class="alert alert-warning">لا يمكن ادخال اكثر من 160 حرف على حسب معايير جوجل</div>
                        </div>

                        <div class="form-group">
                                <label class="">  خط الطول</label>
                                {!! Form::text('bu_langtude',old('bu_langtude'),['class'=>'form-control','placeholder'=>'خط الطول ']) !!}
                        </div>

                        <div class="form-group">
                                <label class=""> دائره العرض</label>
                                {!! Form::text('bu_latitude',old('bu_latitude'),['class'=>'form-control','placeholder'=>'دائره العرض']) !!}
                        </div>

                        <div class="form-group">
                                <label class=""> وصف مطول العقار  </label>
                                {!! Form::textarea('bu_large_ds',old('bu_large_ds'),['class'=>'form-control','placeholder'=>'وصف مساحه وشكل العقار',]) !!}
                        </div>

                        <div class="form-group">
                                <label class=""> نوع العقار</label>
                                {!! Form::select('bu_status',bu_status(),old('bu_status'),['class'=>'form-control']) !!}
                        </div>{{--bu_status() is helper function return an array--}}

                        <div class="form-group">
                            <input type="submit" value="اضافه العقار" class="btn btn-success btn-lg">
                        </div>

                    </form>
                
              </div>
            </div>
          </div>
        </div>
</section>

@push('js')

<script>

</script>


@endpush    

@endsection