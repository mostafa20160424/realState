

{{--laravel comment--}}
<li class="treeview {{ active_menu('users')[0] }}">
    
    <a href="#">
      <i class="fa fa-users"></i> <span>التحكم فى الاعضاء</span> <i class="fa fa-angle-left pull-left"></i>
    </a>
    <ul class="treeview-menu">
      <li  class="{{active_menu('users')[1]=='create'?'active':''}}"><a href="{{url('admin/users/create')}}">اضافه عضو</a></li>
      <li class="{{active_menu('users')[1]==''?'active':''}}"><a href="{{url('admin/users')}}">  الاعضاء</a></li>
      <li class="{{active_menu('users')[1]=='profile'?'active':''}}"><a href="{{url('admin/users/'.auth()->user()->id.'/edit')}}">  ملفى الشخصى</a></li>
    </ul>
  </li>


  <li class="treeview {{ active_menu('settings')[0] }}">


<a href="#">
  <i class="fa fa-dashboard"></i> <span>التحكم فى الموقع</span> <i class="fa fa-angle-left pull-left"></i>
</a>
<ul class="treeview-menu">
  <li class="{{active_menu('settings')[1]==''?'active':''}}"><a href="{{url('admin/settings')}}">  الاعدادات</a></li>
</ul>
</li>

  <li class="treeview {{ active_menu('bus')[0] }}">
  
    <a href="#">
      <i class="fa fa-dashboard"></i> <span>التحكم فى العقارات</span> <i class="fa fa-angle-left pull-left"></i>
    </a>
    <ul class="treeview-menu">
      <li  class="{{active_menu('bus')[1]=='create'?'active':''}}"><a href="{{url('admin/bus/create')}}">اضافه عقار</a></li>      
      <li class="{{active_menu('bus')[1]==''?'active':''}}"><a href="{{url('admin/bus')}}">  العقارات</a></li>
      <li class="{{active_menu('bus')[1]==auth()->user()->id?'active':''}}"><a href="{{url('admin/bus/'.auth()->user()->id)}}">  عقاراتى</a></li>
    </ul>
  </li>
  
  <li class="treeview {{ active_menu('contact')[0] }}">
      
      <a href="#">
        <i class="fa fa-dashboard"></i> <span>التحكم فى الرسائل</span> <i class="fa fa-angle-left pull-left"></i>
      </a>
      <ul class="treeview-menu">
        <li class="{{active_menu('contact')[1]==''?'active':''}}"><a href="{{url('admin/contact')}}">  الرسائل</a></li>
      </ul>
  </li>