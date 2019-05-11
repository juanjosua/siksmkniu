<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>SIKSM KNIU</title>]
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('beranda/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('beranda/bower_components/font-awesome/css/font-awesome.min.css') }}">

  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('beranda/bower_components/Ionicons/css/ionicons.min.css') }}">

  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('beranda/dist/css/AdminLTE.min.css') }}">

  <!-- Custom CSS Upload -->
  <link rel="stylesheet" href="{{ asset('beranda/css/upload-file.css')}}" />

  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('beranda/dist/css/skins/_all-skins.min.css') }}">

  <!-- Website Theme -->
  <meta id="theme-color" name="theme-color" content="#4AB3B6">
  <link rel="stylesheet" href="{{ asset('beranda/css/dashboard.css') }}" />
  <link rel="stylesheet" href="{{ asset('beranda/css/document-approval.css') }}" />
  <link rel="stylesheet" href="{{ asset('beranda/document-archieved.css') }}" />
  <link rel="stylesheet" href="{{ asset('beranda/recent-activity.css') }}" />
  <link rel="stylesheet" href="{{ ('beranda/profile.css') }}" />
  <link rel="stylesheet" href="{{ ('beranda/document-detail.css') }}" />
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

            <body class="hold-transition skin-red sidebar-mini">

              <!-- <div class="se-pre-con"></div> -->

            <!-- Section Start -->

            <!-- Site wrapper -->
            <div class="wrapper">

              <!-- Navbar Start -->

              <header class="main-header">

                <!-- Logo -->
                <a href="{{ url('/pimpinan_document_approval') }}" class="logo">
                  <!-- mini logo for sidebar mini 50x50 pixels -->
                  <span class="logo-mini"><b>S</b>K</span>
                  <!-- logo for regular state and mobile devices -->
                  <span class="logo-lg"><b>SIKSM</b>KNIU</span>
                </a>

                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">

                  <!-- Sidebar toggle button -->
                  <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </a>

                  <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">

                      <!-- NOTIFICATION STARTS -->

                      <!-- Notifications: style can be found in dropdown.less -->
                      <li class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                          <i class="fa fa-bell-o"></i>
                          <?php if ($suratbaru == 0 && $disposisibaru == 0 && $arsipbaru == 0): ?>
                          <?php else: ?>
                            <span class="label label-warning">!</span>
                          <?php endif ?>
                        </a>
                        <ul class="dropdown-menu">
                          
                          <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">

                              <!-- SURAT BARU -->
                              <li>
                                <a href="{{ url('/pimpinan_document_approval') }}">
                                  @if($suratbaru == 0)
                                    <i class="fa fa-times text-danger"></i> Tidak Ada Surat Baru
                                  @else
                                    <i class="fa fa-plus text-success"></i> Ada Surat Baru   
                                  @endif
                                </a>
                              </li>
                              <!-- ########## -->

                              <!-- DISPOSISI BARU -->
                              <li>
                                <a href="{{ url('/document_archived') }}">
                                  @if($disposisibaru == 0)
                                    <i class="fa fa-times text-danger"></i> Tidak Ada Disposisi Baru
                                  @else
                                    <i class="fa fa-plus text-success"></i> Ada Disposisi Baru   
                                  @endif
                                </a>
                              </li>
                              <!-- ########## -->

                              <!-- ARSIP BARU -->
                              <li>
                                <a href="{{ url('/document_archived') }}">
                                  @if($arsipbaru == 0)
                                    <i class="fa fa-times text-danger"></i> Tidak Ada Arsip Baru
                                  @else
                                    <i class="fa fa-plus text-success"></i> Ada Arsip Baru   
                                  @endif
                                </a>
                              </li>
                              <!-- ########## -->

                            </ul>
                          </li>
                        </ul>
                      </li>

                      <!-- NOTIFICATION ENDS -->

                      <!-- User Account: style can be found in dropdown.less -->
                      <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                          <!-- profile picture default & update-->
                          @if(auth()->user()->avatar)
                          <img src="{{ asset('storage/' . auth()->user()->avatar) }}" class="user-image" alt="User Image">
                          @else
                          <img src="{{ asset('beranda/dist/img/profilepicture.png') }}" class="user-image" alt="User Image">
                          @endif
                          <span class="hidden-xs">{{Auth::User()->name}}</span>
                        </a>
                        <ul class="dropdown-menu">
                          <!-- User image -->
                          <li class="user-header">
                            <!-- profile picture default & update-->
                            @if(auth()->user()->avatar)
                            <img src="{{ asset('storage/' . auth()->user()->avatar) }}" class="img-circle" alt="User Image">
                            @else
                            <img src="{{ asset('beranda/dist/img/profilepicture.png') }}" class="img-circle" alt="User Image">
                            @endif

                            <p>
                              {{Auth::User()->name}} - {{Auth::User()->jabatan}}
                              <small>Member since September 28, 2018</small>
                            </p>
                          </li>

                          <!-- Menu Footer-->
                          <li class="user-footer">
                            <div class="pull-left">
                              <a href="{{ url('/profile') }}" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                              <a href="{{ route('logout') }}" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                          </li>
                        </ul>
                      </li>
                    </ul>
                  </div>
                </nav>

              </header>

              <!-- Navbar End -->

              <!-- =============================================== -->

              <!-- Main Menu Start -->

              <!-- Left side column. contains the sidebar -->
              <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                  <!-- Sidebar user panel -->
                  <div class="user-panel">
                    <div class="pull-left image">
                      <!-- profile picture default & update-->
                      @if(auth()->user()->avatar)
                      <img src="{{ asset('storage/' . auth()->user()->avatar) }}" class="img-circle" alt="User Image">
                      @else
                      <img src="{{ asset('beranda/dist/img/profilepicture.png') }}" class="img-circle" alt="User Image">
                      @endif
                    </div>
                    <div class="pull-left info">
                      <br>
                      <p>{{Auth::User()->name}}</p>
                    </div>
                  </div>

                  <!-- sidebar menu: : style can be found in sidebar.less -->

                  <ul class="sidebar-menu" data-widget="tree">

                    <li class="header">MAIN MENU</li>
                    <!-- <li>
                      <a href="{{ url('/dashboard/admin') }}">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                      </a>
                    </li> -->

                    <li>
                      <a href="{{ url('/upload') }}">
                        <i class="fa fa-upload"></i> <span>Unggah Surat</span>
                      </a>
                    </li>

                    <li>
                      <a href="{{ url('/pimpinan_document_approval') }}">
                        <i class="fa fa-file-text"></i> <span>Surat Masuk</span>
                      </a>
                    </li>

                    <li>
                      <a href="{{ url('/document_archived') }}">
                        <i class="fa fa-folder"></i> <span>Disposisi dan Arsip</span>
                      </a>
                    </li>

                    <!-- <li>
                      <a href="{{ url('/recent_activity') }}">
                        <i class="fa fa-exchange"></i> <span>Recent Activity</span>
                      </a>
                    </li> -->

                  </ul>

                </section>
                <!-- /.sidebar -->
              </aside>

              <!-- Main Menu End -->
              <!-- =============================================== -->

              <!-- Content Start -->

              <!-- Content Wrapper. Contains page content -->
              <div class="content-wrapper">
                @yield('content')
              </div>
              <!-- /.content-wrapper -->

              <!-- Content End -->

              <!-- =============================================== -->

            </div>

            <!-- ./wrapper -->

            <!-- Section End -->

            <!-- =============================================== -->

            <!-- Script Start -->

            <!-- jQuery 3 -->
            <script src="{{ asset('beranda/bower_components/jquery/dist/jquery.min.js') }}"></script>

            <!-- Bootstrap 3.3.7 -->
            <script src="{{ asset('beranda/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

            <!-- SlimScroll -->
            <script src="{{ asset('beranda/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>

            <!-- FastClick -->
            <script src="{{ asset('beranda/bower_components/fastclick/lib/fastclick.js') }}"></script>

            <!-- DataTables -->
            <script src="{{ asset('beranda/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
            <script src="{{ asset('beranda/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

            <!-- AdminLTE App -->
            <script src="{{ asset('beranda/dist/js/adminlte.min.js') }}"></script>

            <script>
              $(document).ready(function () {
                $('.sidebar-menu').tree()
              })
            </script>

            <!-- JQuery -->
            <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script> -->
            <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>

            <!-- ChartJS -->
            <script src="{{ asset('beranda/bower_components/chart.js/Chart.js') }}"></script>

            <!-- Chart Javascript Graphic Animation-->
            <script src="{{ asset('beranda/dist/js/pages/dashboard2.js') }}"></script>

            <!-- Loading Screen Animation -->

            <script>
                $(window).load(function() {
                    $(".se-pre-con").fadeOut("slow");;
                });
            </script>

            <!-- page script Document-approval-->
            <script>
              $(function () {
                $('#example1').DataTable()
                $('#example2').DataTable()
                $('#example3').DataTable()
                $('#example4').DataTable()
              })
            </script>
            <script src="{{ asset('beranda/upload-file.js') }}"></script>
            <!-- Script End -->

          </body>
          </html>
