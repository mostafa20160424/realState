<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>لوحه التحكم {{getSetting()}} | @yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{url('adminlit')}}/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{url('adminlit')}}/dist/css/font-awesome.min.css">
  <!-- Ionicons 2.0.0 -->
  <link rel="stylesheet" href="{{url('adminlit')}}/dist/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('adminlit')}}/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{url('adminlit')}}/dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{url('adminlit')}}/plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{url('adminlit')}}/plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{url('adminlit')}}/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{url('adminlit')}}/plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{url('adminlit')}}/plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{url('adminlit')}}/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <link rel="stylesheet" href="{{url('adminlit')}}/dist/fonts/fonts-fa.css">
  <!--Another way using laravel collective-->
  {!! Html::style('css/select2.min.css') !!}  
  {!!Html::style('adminlit/dist/css/bootstrap-rtl.min.css')!!}
  {!!Html::style('adminlit/dist/css/rtl.css')!!}
  {!!Html::style('adminlit/dist/css/sweetalert2.min.css')!!}

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
  
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  {!!Html::style('adminlit/dist/css/css.css')!!}
</head>
<body class="hold-transition skin-blue sidebar-mini">        
        <div class="wrapper">
                
          <header class="main-header">
            <!-- Logo -->
            <a href="index2.html" class="logo">
              <!-- mini logo for sidebar mini 50x50 pixels -->
              <span class="logo-mini"><b>A</b>LT</span>
              <!-- logo for regular state and mobile devices -->
              <span class="logo-lg"><b>Admin</b>LTE</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
              <!-- Sidebar toggle button-->
              <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
              </a>
              <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                  <!-- Messages: style can be found in dropdown.less-->
                  <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <i class="fa fa-envelope-o"></i>
                      <span class="label label-success">4</span>
                    </a>
                    <ul class="dropdown-menu">
                      <li class="header">You have 4 messages</li>
                      <li>
                        <!-- inner menu: contains the actual data -->
                        <ul class="menu">
                          <li><!-- start message -->
                            <a href="#">
                              <div class="pull-right">
                                <img src="{{url('adminlit')}}/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                              </div>
                              <h4>
                                Support Team
                                <small><i class="fa fa-clock-o"></i> 5 mins</small>
                              </h4>
                              <p>Why not buy a new awesome theme?</p>
                            </a>
                          </li><!-- end message -->
                          <li>
                            <a href="#">
                              <div class="pull-right">
                                <img src="{{url('adminlit')}}/dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                              </div>
                              <h4>
                                AdminLTE Design Team
                                <small><i class="fa fa-clock-o"></i> 2 hours</small>
                              </h4>
                              <p>Why not buy a new awesome theme?</p>
                            </a>
                          </li>
                          <li>
                            <a href="#">
                              <div class="pull-right">
                                <img src="{{url('adminlit')}}/dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                              </div>
                              <h4>
                                Developers
                                <small><i class="fa fa-clock-o"></i> Today</small>
                              </h4>
                              <p>Why not buy a new awesome theme?</p>
                            </a>
                          </li>
                          <li>
                            <a href="#">
                              <div class="pull-right">
                                <img src="{{url('adminlit')}}/dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                              </div>
                              <h4>
                                Sales Department
                                <small><i class="fa fa-clock-o"></i> Yesterday</small>
                              </h4>
                              <p>Why not buy a new awesome theme?</p>
                            </a>
                          </li>
                          <li>
                            <a href="#">
                              <div class="pull-right">
                                <img src="{{url('adminlit')}}/dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                              </div>
                              <h4>
                                Reviewers
                                <small><i class="fa fa-clock-o"></i> 2 days</small>
                              </h4>
                              <p>Why not buy a new awesome theme?</p>
                            </a>
                          </li>
                        </ul>
                      </li>
                      <li class="footer"><a href="#">See All Messages</a></li>
                    </ul>
                  </li>
                  <!-- Notifications: style can be found in dropdown.less -->
                  <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <i class="fa fa-bell-o"></i>
                      <span class="label label-warning">{{get_bus_unactive()['count']}}</span>
                    </a>
                    <ul class="dropdown-menu">
                    <li class="header"> يوجد {{get_bus_unactive()['count']}} من العقارات الغير مفعله</li>
                      <li>
                        <!-- inner menu: contains the actual data -->
                        <ul class="menu">
                          @foreach (get_bus_unactive()['all'] as $item)
                              
                          <li class="bu-{{ $item->id }}">
                            <a href="{{ url('admin/bus/'.$item->id.'/edit') }}">
                                
                                 {{$item->bu_name}}
                              </a>
                            </li>
                          @endforeach
                        </ul>
                      </li>
                    <li class="footer"><a href="{{ url('admin/bus') }}">اظهر الكلl</a></li>
                    </ul>
                  </li>
                  <!-- Tasks: style can be found in dropdown.less -->
                  <li class="dropdown tasks-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <i class="fa fa-flag-o"></i>
                      <span class="label label-danger">۹</span>
                    </a>
                    <ul class="dropdown-menu">
                      <li class="header">You have 9 tasks</li>
                      <li>
                        <!-- inner menu: contains the actual data -->
                        <ul class="menu">
                          <li><!-- Task item -->
                            <a href="#">
                              <h3>
                                Design some buttons
                                <small class="pull-left">20%</small>
                              </h3>
                              <div class="progress xs">
                                <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                  <span class="sr-only">20% Complete</span>
                                </div>
                              </div>
                            </a>
                          </li><!-- end task item -->
                          <li><!-- Task item -->
                            <a href="#">
                              <h3>
                                Create a nice theme
                                <small class="pull-left">40%</small>
                              </h3>
                              <div class="progress xs">
                                <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                  <span class="sr-only">40% Complete</span>
                                </div>
                              </div>
                            </a>
                          </li><!-- end task item -->
                          <li><!-- Task item -->
                            <a href="#">
                              <h3>
                                Some task I need to do
                                <small class="pull-left">60%</small>
                              </h3>
                              <div class="progress xs">
                                <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                  <span class="sr-only">60% Complete</span>
                                </div>
                              </div>
                            </a>
                          </li><!-- end task item -->
                          <li><!-- Task item -->
                            <a href="#">
                              <h3>
                                Make beautiful transitions
                                <small class="pull-left">80%</small>
                              </h3>
                              <div class="progress xs">
                                <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                  <span class="sr-only">80% Complete</span>
                                </div>
                              </div>
                            </a>
                          </li><!-- end task item -->
                        </ul>
                      </li>
                      <li class="footer">
                        <a href="#">View all tasks</a>
                      </li>
                    </ul>
                  </li>
                  <!-- User Account: style can be found in dropdown.less -->
                  <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <img src="{{url('adminlit')}}/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                      <span class="hidden-xs">محمد شریفی</span>
                    </a>
                    <ul class="dropdown-menu">
                      <!-- User image -->
                      <li class="user-header">
                        <img src="{{url('adminlit')}}/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                        <p>
                         محمد شریفی - توسعه دهنده سمت کاربر
                          <small>Member since Nov. 2012</small>
                        </p>
                      </li>
                      <!-- Menu Body -->
                      <li class="user-body">
                        <div class="col-xs-4 text-center">
                          <a href="#">Followers</a>
                        </div>
                        <div class="col-xs-4 text-center">
                          <a href="#">Sales</a>
                        </div>
                        <div class="col-xs-4 text-center">
                          <a href="#">Friends</a>
                        </div>
                      </li>
                      <!-- Menu Footer-->
                      <li class="user-footer">
                        <div class="pull-right">
                          <a href="#" class="btn btn-default btn-flat">Profile</a>
                        </div>
                        <div class="pull-left">
                          <a href="#" class="btn btn-default btn-flat">Sign out</a>
                        </div>
                      </li>
                    </ul>
                  </li>
                  <!-- Control Sidebar Toggle Button -->
                  <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                  </li>
                </ul>
              </div>
            </nav>
          </header>
          <!-- Left side column. contains the logo and sidebar -->
          <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
              <!-- Sidebar user panel -->
              <div class="user-panel">
                <div class="pull-right image">
                  <img src="{{url('adminlit')}}/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                  <p>مصطفى عبد الفتاح</p>
                  <a href="#"><i class="fa fa-circle text-success"></i> آنلاین</a>
                </div>
              </div>
              <!-- search form -->
              <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                  <input type="text" name="q" class="form-control" placeholder="بحث ...">
                  <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                  </span>
                </div>
              </form>
              <!-- /.search form -->
              <!-- sidebar menu: : style can be found in sidebar.less -->
              <ul class="sidebar-menu">
                <li class="header">مصطفى</li>
                @include('admin.layouts.nav')

              </ul>
            </section>
            <!-- /.sidebar -->
          </aside>
                
                  <!-- Content Wrapper. Contains page content -->
                  <div class="content-wrapper">
                        @include('admin.layouts.message')
                        @if(session()->has('success') || session()->has('flash_message'))
      
                        @include('admin.layouts.flash')
                     
                      @endif
                
                      @if(session()->has('error'))
                      <div class="alert alert-danger">
                        {{session('error')}}
                      </div>
                      @endif
                        @yield('content')
                  </div>
                      
                  <!-- /.content-wrapper -->
                  <footer class="main-footer">
                    <div class="pull-right hidden-xs">
                      <b>Version</b> 2.4.0
                    </div>
                    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
                    reserved.
                  </footer>
                
                  <!-- Control Sidebar -->
                  <aside class="control-sidebar control-sidebar-dark">
                    <!-- Create the tabs -->
                    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
                      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                      <!-- Home tab content -->
                      <div class="tab-pane" id="control-sidebar-home-tab">
                        <h3 class="control-sidebar-heading">Recent Activity</h3>
                        <ul class="control-sidebar-menu">
                          <li>
                            <a href="javascript:void(0)">
                              <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                
                              <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                
                                <p>Will be 23 on April 24th</p>
                              </div>
                            </a>
                          </li>
                          <li>
                            <a href="javascript:void(0)">
                              <i class="menu-icon fa fa-user bg-yellow"></i>
                
                              <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>
                
                                <p>New phone +1(800)555-1234</p>
                              </div>
                            </a>
                          </li>
                          <li>
                            <a href="javascript:void(0)">
                              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>
                
                              <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
                
                                <p>nora@example.com</p>
                              </div>
                            </a>
                          </li>
                          <li>
                            <a href="javascript:void(0)">
                              <i class="menu-icon fa fa-file-code-o bg-green"></i>
                
                              <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>
                
                                <p>Execution time 5 seconds</p>
                              </div>
                            </a>
                          </li>
                        </ul>
                        <!-- /.control-sidebar-menu -->
                
                        <h3 class="control-sidebar-heading">Tasks Progress</h3>
                        <ul class="control-sidebar-menu">
                          <li>
                            <a href="javascript:void(0)">
                              <h4 class="control-sidebar-subheading">
                                Custom Template Design
                                <span class="label label-danger pull-right">70%</span>
                              </h4>
                
                              <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                              </div>
                            </a>
                          </li>
                          <li>
                            <a href="javascript:void(0)">
                              <h4 class="control-sidebar-subheading">
                                Update Resume
                                <span class="label label-success pull-right">95%</span>
                              </h4>
                
                              <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                              </div>
                            </a>
                          </li>
                          <li>
                            <a href="javascript:void(0)">
                              <h4 class="control-sidebar-subheading">
                                Laravel Integration
                                <span class="label label-warning pull-right">50%</span>
                              </h4>
                
                              <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                              </div>
                            </a>
                          </li>
                          <li>
                            <a href="javascript:void(0)">
                              <h4 class="control-sidebar-subheading">
                                Back End Framework
                                <span class="label label-primary pull-right">68%</span>
                              </h4>
                
                              <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                              </div>
                            </a>
                          </li>
                        </ul>
                        <!-- /.control-sidebar-menu -->
                
                      </div>
                      <!-- /.tab-pane -->
                      <!-- Stats tab content -->
                      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
                      <!-- /.tab-pane -->
                      <!-- Settings tab content -->
                      <div class="tab-pane" id="control-sidebar-settings-tab">
                        <form method="post">
                          <h3 class="control-sidebar-heading">General Settings</h3>
                
                          <div class="form-group">
                            <label class="control-sidebar-subheading">
                              Report panel usage
                              <input type="checkbox" class="pull-right" checked>
                            </label>
                
                            <p>
                              Some information about this general settings option
                            </p>
                          </div>
                          <!-- /.form-group -->
                
                          <div class="form-group">
                            <label class="control-sidebar-subheading">
                              Allow mail redirect
                              <input type="checkbox" class="pull-right" checked>
                            </label>
                
                            <p>
                              Other sets of options are available
                            </p>
                          </div>
                          <!-- /.form-group -->
                
                          <div class="form-group">
                            <label class="control-sidebar-subheading">
                              Expose author name in posts
                              <input type="checkbox" class="pull-right" checked>
                            </label>
                
                            <p>
                              Allow the user to show his name in blog posts
                            </p>
                          </div>
                          <!-- /.form-group -->
                
                          <h3 class="control-sidebar-heading">Chat Settings</h3>
                
                          <div class="form-group">
                            <label class="control-sidebar-subheading">
                              Show me as online
                              <input type="checkbox" class="pull-right" checked>
                            </label>
                          </div>
                          <!-- /.form-group -->
                
                          <div class="form-group">
                            <label class="control-sidebar-subheading">
                              Turn off notifications
                              <input type="checkbox" class="pull-right">
                            </label>
                          </div>
                          <!-- /.form-group -->
                
                          <div class="form-group">
                            <label class="control-sidebar-subheading">
                              Delete chat history
                              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                            </label>
                          </div>
                          <!-- /.form-group -->
                        </form>
                      </div>
                      <!-- /.tab-pane -->
                    </div>
                  </aside>
                  <!-- /.control-sidebar -->
                  <!-- Add the sidebar's background. This div must be placed
                       immediately after the control sidebar -->
                       <footer class="main-footer">
                        <div class="pull-left hidden-xs">
                          <b>Version</b> 2.2.0
                        </div>
                        <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
                      </footer>
                
                      <!-- Control Sidebar -->
                      <aside class="control-sidebar control-sidebar-dark">
                        <!-- Create the tabs -->
                        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                          <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
                          <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                          <!-- Home tab content -->
                          <div class="tab-pane" id="control-sidebar-home-tab">
                            <h3 class="control-sidebar-heading">Recent Activity</h3>
                            <ul class="control-sidebar-menu">
                              <li>
                                <a href="javascript::;">
                                  <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                                  <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                                    <p>Will be 23 on April 24th</p>
                                  </div>
                                </a>
                              </li>
                              <li>
                                <a href="javascript::;">
                                  <i class="menu-icon fa fa-user bg-yellow"></i>
                                  <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>
                                    <p>New phone +1(800)555-1234</p>
                                  </div>
                                </a>
                              </li>
                              <li>
                                <a href="javascript::;">
                                  <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>
                                  <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
                                    <p>nora@example.com</p>
                                  </div>
                                </a>
                              </li>
                              <li>
                                <a href="javascript::;">
                                  <i class="menu-icon fa fa-file-code-o bg-green"></i>
                                  <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>
                                    <p>Execution time 5 seconds</p>
                                  </div>
                                </a>
                              </li>
                            </ul><!-- /.control-sidebar-menu -->
                
                            <h3 class="control-sidebar-heading">Tasks Progress</h3>
                            <ul class="control-sidebar-menu">
                              <li>
                                <a href="javascript::;">
                                  <h4 class="control-sidebar-subheading">
                                    Custom Template Design
                                    <span class="label label-danger pull-left">70%</span>
                                  </h4>
                                  <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                                  </div>
                                </a>
                              </li>
                              <li>
                                <a href="javascript::;">
                                  <h4 class="control-sidebar-subheading">
                                    Update Resume
                                    <span class="label label-success pull-left">95%</span>
                                  </h4>
                                  <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                                  </div>
                                </a>
                              </li>
                              <li>
                                <a href="javascript::;">
                                  <h4 class="control-sidebar-subheading">
                                    Laravel Integration
                                    <span class="label label-warning pull-left">50%</span>
                                  </h4>
                                  <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                                  </div>
                                </a>
                              </li>
                              <li>
                                <a href="javascript::;">
                                  <h4 class="control-sidebar-subheading">
                                    Back End Framework
                                    <span class="label label-primary pull-left">68%</span>
                                  </h4>
                                  <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                                  </div>
                                </a>
                              </li>
                            </ul><!-- /.control-sidebar-menu -->
                
                          </div><!-- /.tab-pane -->
                          <!-- Stats tab content -->
                          <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
                          <!-- Settings tab content -->
                          <div class="tab-pane" id="control-sidebar-settings-tab">
                            <form method="post">
                              <h3 class="control-sidebar-heading">General Settings</h3>
                              <div class="form-group">
                                <label class="control-sidebar-subheading">
                                  Report panel usage
                                  <input type="checkbox" class="pull-left" checked>
                                </label>
                                <p>
                                  Some information about this general settings option
                                </p>
                              </div><!-- /.form-group -->
                
                              <div class="form-group">
                                <label class="control-sidebar-subheading">
                                  Allow mail redirect
                                  <input type="checkbox" class="pull-left" checked>
                                </label>
                                <p>
                                  Other sets of options are available
                                </p>
                              </div><!-- /.form-group -->
                
                              <div class="form-group">
                                <label class="control-sidebar-subheading">
                                  Expose author name in posts
                                  <input type="checkbox" class="pull-left" checked>
                                </label>
                                <p>
                                  Allow the user to show his name in blog posts
                                </p>
                              </div><!-- /.form-group -->
                
                              <h3 class="control-sidebar-heading">Chat Settings</h3>
                
                              <div class="form-group">
                                <label class="control-sidebar-subheading">
                                  Show me as online
                                  <input type="checkbox" class="pull-left" checked>
                                </label>
                              </div><!-- /.form-group -->
                
                              <div class="form-group">
                                <label class="control-sidebar-subheading">
                                  Turn off notifications
                                  <input type="checkbox" class="pull-left">
                                </label>
                              </div><!-- /.form-group -->
                
                              <div class="form-group">
                                <label class="control-sidebar-subheading">
                                  Delete chat history
                                  <a href="javascript::;" class="text-red pull-left"><i class="fa fa-trash-o"></i></a>
                                </label>
                              </div><!-- /.form-group -->
                            </form>
                          </div><!-- /.tab-pane -->
                        </div>
                      </aside><!-- /.control-sidebar -->
                      <!-- Add the sidebar's background. This div must be placed
                           immediately after the control sidebar -->
                      <div class="control-sidebar-bg"></div>
   
            </div>
            <!-- ./wrapper -->       
    
</body>
    <!-- jQuery 2.1.4 -->
    <script src="{{url('adminlit')}}/plugins/jQuery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.4 -->
    
    <script src="{{url('adminlit')}}/bootstrap/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="{{url('adminlit')}}/plugins/morris/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="{{url('adminlit')}}/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="{{url('adminlit')}}/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="{{url('adminlit')}}/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{url('adminlit')}}/plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="{{url('adminlit')}}/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="{{url('adminlit')}}/plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{url('adminlit')}}/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="{{url('adminlit')}}/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="{{url('adminlit')}}/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{url('adminlit')}}/dist/js/app.min.js"></script>
     <!--Another way using laravel collective-->
  
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    {!!Html::script('adminlit/dist/js/pages/dashboard.js')!!}
    <!-- AdminLTE for demo purposes -->
    {!! Html::script('js/select2.min.js') !!}    
    {!!Html::script('adminlit/dist/js/demo.js')!!}
    {!!Html::script('adminlit/dist/js/sweetalert2.min.js')!!}
    
    <script>
        $(document).ready(function(){
            var v;
            $("input").on({
                focus:function(){
    
                    v=$(this).attr('placeholder');
                    $(this).attr('placeholder','');
                },
                blur:function(){
                    $(this).attr('placeholder',v);
                }
            });
            

            $("select").each(function(){
              if(!$(this).prev('div').hasClass('swal2-range')){
                $(this).select2({
                  dir:'rtl'
                });
              }
            });
            
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
     @stack('js')
    </body>
    </html>
        