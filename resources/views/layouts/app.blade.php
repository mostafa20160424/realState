<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    {!! Html::style('website/css/bootstrap.min.css') !!}
    {!! Html::style('website/css/flexslider.css') !!}
    {!! Html::style('website/css/style.css') !!}
    {!! Html::style('website/css/font-awesome.min.css') !!}
    {!! Html::style('css/select2.min.css') !!}
    <link href="" rel="stylesheet" />
    {!! Html::script('website/js/jquery.min.js') !!}    
    <script src=""></script>
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900' rel='stylesheet' type='text/css'>
    {!! Html::style('website/css/bu.css') !!}
     <style>
      .input-file-container {
        position: relative;
        width: 225px;
      } 
      .js .input-file-trigger {
        display: block;
        padding: 14px 45px;
        background: #39D2B4;
        color: #fff;
        font-size: 1em;
        transition: all .4s;
        cursor: pointer;
      }
      .js .input-file {
        position: absolute;
        top: 0; left: 0;
        width: 225px;
        opacity: 0;
        padding: 14px 0;
        cursor: pointer;
      }
      .js .input-file:hover + .input-file-trigger,
      .js .input-file:focus + .input-file-trigger,
      .js .input-file-trigger:hover,
      .js .input-file-trigger:focus {
        background: #34495E;
        color: #39D2B4;
      }
      
      .file-return {
        margin: 0;
      }
      .file-return:not(:empty) {
        margin: 1em 0;
      }
      .js .file-return {
        font-style: italic;
        font-size: .9em;
        font-weight: bold;
      }
      .js .file-return:not(:empty):before {
        content: "Selected file: ";
        font-style: normal;
        font-weight: normal;
      }
      
      
      
  </style>
    @stack('css')

    <title>{{ empty(getSetting())?'موقع عقارات':getSetting() }}|@yield('title')</title>

    <!-- Scripts -->

</head>
<body>
    <div id="app" style="direction:rtl;">
            <div class="header">
                    <div class="container"> <a class="navbar-brand pull-right" href="{{ url('/') }}"><i class="fa fa-paper-plane"></i> عقارات</a>
                      <div class="menu pull-left"> <a class="toggleMenu" href="#"><img src="{{url('website/images/nav_icon.png')}}" alt="" /> </a>
                        <ul class="nav " id="nav">
                                
                          <li class="{{get_active_head()==''?'active':''}}"><a href="{{url('/')}}">الرئيسيه</a></li>
                            
                          <li class="{{get_active_head()=='showall'?'active':''}}"><a href="{{ url('showall') }}">  عقاراتنا</a></li>

                          <li class="nav-item dropdown {{get_active_head()=='buy'?'active':''}}" >
                              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  تمليك <span class="caret"></span>
                                </a>
                              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @foreach(bu_type() as $key=>$type)
                                    <a class="dropdown-item" href="{{ url('search?bu_rent=0&bu_type='.$key) }}"> 
                                        {{$type}}
                                    </a>
                                   @endforeach  

                                </div>
                          </li>
                          
                          <li class="nav-item dropdown {{get_active_head()=='rent'?'active':''}}" >
                              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  ايجار <span class="caret"></span>
                                </a>
                              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                  @foreach(bu_type() as $key=>$type)
                                    <a class="dropdown-item" href="{{ url('search?bu_rent=1&bu_type='.$key) }}"> 
                                        {{$type}}
                                    </a>
                                   @endforeach  
                             </div>
                          </li>
                          <li class="{{get_active_head()=='contact'?'active':''}}"><a href="{{ url('contact/create') }}"> اتصل بنا</a></li>                          
                          @guest
                          <li class="nav-item">
                              <a class="nav-link" href="{{ route('login') }}">تسجيل الدخول</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="{{ route('register') }}">تسجيل عضويه جديده</a>
                          </li>
                      @else
                          <li class="nav-item dropdown">
                              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                  {{ Auth::user()->name }} <span class="caret"></span>
                              </a>

                              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item" href="{{ route('logout') }}"
                                     onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                                      تسجيل الخروج
                                  </a>
                                  <a class="dropdown-item" href="{{ url('myBullding') }}">عقاراتى</a>
                                  <a class="dropdown-item" href="{{ url('myBullding/unactive') }}">عقاراتى الغير مفعله</a>
                                  <a href="{{url('user/create/bu')}}" class="dropdown-item" >اضف عقار </a>
                                  <a href="{{url('myprofile')}}" class="dropdown-item">تعديل المعلومات الشخصيه </a>
                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                      @csrf
                                  </form>
                              </div>
                          </li>
                      @endguest
                          <div class="clear"></div>
                        </ul>
                      </div>
                    </div>
                  </div>

                  @if(session()->has('error'))
                  <div class="alert alert-danger">
                    {{session('error')}}
                  </div>
                  @endif
        
            @yield('content')


            <div class="footer">
                
                
                    <div class="footer_bottom">
                      <div class="follow-us">
                           <a class="fa fa-facebook social-icon" href="{{ getSetting('facebook') }}"></a>
                            <a class="fa fa-twitter social-icon" href="{{ getSetting('twitter') }}"></a>
                             <a class="fa fa-youtube social-icon" href="{{ getSetting('youtube') }}"></a>
                        </div>
                      <div class="copy">
                        <p>Copyright &copy; 2015 Company Name. Design by <a href="http://www.templategarden.com" rel="nofollow">TemplateGarden</a></p>
                      </div>
                    </div>
            </div>
      
    </div>

    {!! Html::script('website/js/jquery.min.js') !!}    
    {!! Html::script('website/js/bootstrap.min.js') !!}
    {!! Html::script('website/js/jquery.flexslider.js') !!}
    {!! Html::script('js/select2.min.js') !!}    
    {!! Html::script('website/js/responsive-nav.js') !!}
    <script>
        $(document).ready(function(){
            var v;
            $("input,textarea").on({
                focus:function(){
    
                    v=$(this).attr('placeholder');
                    $(this).attr('placeholder','');
                },
                blur:function(){
                    $(this).attr('placeholder',v);
                }
            })
        });
        var i=0;
        $(".nav li").each(function(){
            if($(this).hasClass('active') && i!=0){
                $(this).siblings().removeClass('active');
                return ;
            }
            i++;
        });




        $("select").select2({
            dir:'rtl'
          });

          document.querySelector("html").classList.add('js');
          
          var fileInput  = document.querySelector( ".input-file" ),  
              button     = document.querySelector( ".input-file-trigger" ),
              the_return = document.querySelector(".file-return");
                
          button.addEventListener( "keydown", function( event ) {  
              if ( event.keyCode == 13 || event.keyCode == 32 ) {  
                  fileInput.focus();  
              }  
          });
          button.addEventListener( "click", function( event ) {
             fileInput.focus();
             return false;
          });  
          fileInput.addEventListener( "change", function( event ) {  
              the_return.innerHTML = this.value;  
          });  
    </script>    
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    @stack('js')
    <!-- Go to www.addthis.com/dashboard to customize your tools --> <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5b90010a4419aa56"></script>
</body>
</html>
