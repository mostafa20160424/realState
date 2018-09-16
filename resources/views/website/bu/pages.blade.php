<div class="col-md-3">
                @if(auth()->user())
                        <div class="profile-sidebar ">
                
                           <!-- SIDEBAR USER TITLE -->
                           <div class="profile-usertitle">
                               <div class="profile-usertitle-name">
                                    <h2 class="text-right" style="padding-right:10px">خيارات العضو</h2>
                               </div>
                           </div>
                           <!-- END SIDEBAR USER TITLE -->
                
                           <!-- SIDEBAR MENU -->
                           <div class="profile-usermenu">  
                               <ul class="nav">
                                   <li class="{{active_link('myprofile')[0]}}">
                                       <a href="{{url('myprofile')}}">
                                       <i class="glyphicon glyphicon-home"></i>
                                       تعديل المعلومات الشخصيه </a>
                                   </li>
                                   <li  class="{{active_link('myBullding')[1]==''?'active':''}}">
                                       <a href="{{url('myBullding')}}">
                                       <i class="glyphicon glyphicon-user"></i>
                                       عقاراتى المفعله <span class="label label-success">{{ get_bus_count(1) }}</span></a>
                                   </li>
                                   
                                   <li  class="{{active_link('myBullding')[1]=='unactive'?'active':''}}">
                                        <a href="{{url('myBullding/unactive')}}">
                                        <i class="glyphicon glyphicon-user"></i>
                                        عقاراتى الغير مفعله  <span class="label label-danger">{{ get_bus_count(0) }}</span></a>
                                    </li>
                                   <li  class="{{active_link('user')[1]=='create'?'active':''}}">
                                       <a href="{{url('user/create/bu')}}" >
                                       <i class="glyphicon glyphicon-ok"></i>
                                       اضف عقار </a>
                                   </li>

                               </ul>
                           </div>
                           <!-- END MENU -->
                        </div>
                        @endif  
                        <div class="profile-sidebar ">
                
                           <!-- SIDEBAR USER TITLE -->
                           <div class="profile-usertitle">
                               <div class="profile-usertitle-name">
                                    <h2 class="text-right" style="padding-right:10px">خيارات العقارات</h2>
                               </div>
                           </div>
                           <!-- END SIDEBAR USER TITLE -->
                
                           <!-- SIDEBAR MENU -->
                           <div class="profile-usermenu test">
                               <ul class="nav">
                                   <li class="{{active_link('showall')[1]==''?'active':''}}">
                                       <a href="{{url('showall')}}">
                                       <i class="glyphicon glyphicon-home"></i>
                                       كل العقارات </a>
                                   </li>
                                   <li  class="{{active_link('showall')[1]=='rent'?'active':''}}">
                                       <a href="{{url('showall/rent')}}">
                                       <i class="glyphicon glyphicon-user"></i>
                                       الايجار </a>
                                   </li>
                                   <li  class="{{active_link('showall')[1]=='buy'?'active':''}}">
                                       <a href="{{url('showall/buy')}}" >
                                       <i class="glyphicon glyphicon-ok"></i>
                                       تمليك </a>
                                   </li>
                                   <li class="{{active_link('showall')[1]=='flats'?'active':''}}">
                                       <a href="{{url('showall/flats')}}">
                                       <i class="glyphicon glyphicon-flag"></i>
                                       شقق </a>
                                   </li>
                                   <li  class="{{active_link('showall')[1]=='fi'?'active':''}}">
                                           <a href="{{url('showall/fi')}}">
                                           <i class="glyphicon glyphicon-flag"></i>
                                           فيلل </a>
                                   </li>
                                   <li  class="{{active_link('showall')[1]=='sh'?'active':''}}">
                                           <a href="{{url('showall/sh')}}">
                                           <i class="glyphicon glyphicon-flag"></i>
                                           شاليهات </a>
                                   </li>
                
                                   <li class="{{active_link('showall')[1]=='company'?'active':''}}">
                                           <a href="{{url('showall/company')}}">
                                           <i class="glyphicon glyphicon-flag"></i>
                                           شركات </a>
                                   </li>
                               </ul>
                           </div>
                           <!-- END MENU -->
                       </div>

                    <div class="profile-sidebar">

                    <!-- SIDEBAR USER TITLE -->
                    <div class="profile-usertitle">
                        <div class="profile-usertitle-name">
                                <h2 class="text-right" style="padding-right:10px"> البحث المتقدم</h2>
                        </div>
                    </div>
                    <!-- END SIDEBAR USER TITLE -->
                    
                    <!-- SIDEBAR MENU -->
                    <div class="profile-usermenu" style="padding:10px">
                        {!! Form::open(['url'=>"search",'action'=>"POST"]) !!}
                        {{--can put method replace with action--}}
                        <ul class="nav">
                            <li style="margin-bottom:10px">
                                {!! Form::text('bu_price_from',old('bu_price_from'),['class'=>'form-control','placeholder'=>'سعر العقار من','style'=>'margin-left:30px ;width:100px;display:inline']) !!}
                                {!! Form::text('bu_price_to',old('bu_price_to'),['class'=>'form-control','placeholder'=>'سعر العقار الى','style'=>'width:100px;display: inline;']) !!}                        
                            </li>
                            <li>
                                {!! Form::select('rooms',rooms(),old('rooms'),['class'=>'form-control','placeholder'=>'عدد الغرف',]) !!}                        
                            </li>
                            <li>
                                {!! Form::select('bu_type',bu_type(),old('bu_type'),['class'=>'form-control','placeholder'=>' نوع العقار',]) !!}                        
                            </li>
                            <li>
                                {!! Form::select('bu_place',bu_place(),old('bu_place'),['class'=>'form-control','placeholder'=>' مكان العقار',]) !!}                        
                            </li>
                            <li>
                                {!! Form::select('bu_rent',bu_rent(),old('bu_rent'),['class'=>'form-control','placeholder'=>'نوع العمليه',]) !!}                        
                            </li>
                            <li>
                                {!! Form::text('bu_square',old('bu_square'),['class'=>'form-control','placeholder'=>'المساحه','style'=>'margin-bottom:5px']) !!}
                            </li>
                            <li>
                                {!! Form::submit("ابحث",['class'=>'banner_btn','style'=>'margin-bottom:5px;border:none;']) !!}
                            </li>
                                
                        </ul>
                        {!! Form::close() !!}
                    </div>
                    <!-- END MENU -->
                </div>        



   </div>