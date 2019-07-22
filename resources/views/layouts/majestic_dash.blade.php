<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>SIKSM KNIU</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('majestic/vendors/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('majestic/vendors/base/vendor.bundle.base.css') }}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="{{ asset('majestic/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('majestic/css/style.css') }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('majestic/images/favicon2.jpg') }}" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">  
          <a class="navbar-brand brand-logo" href="index.html"><img src="{{ asset('majestic/images/logo.svg') }}" alt="logo"/></a>
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{ asset('majestic/images/logo-mini.svg') }}" alt="logo"/></a>
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-sort-variant"></span>
          </button>
        </div>  
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav mr-lg-4 w-100">
          <li class="nav-item nav-search d-none d-lg-block w-100">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="search">
                  <i class="mdi mdi-magnify"></i>
                </span>
              </div>
              <input type="text" class="form-control" placeholder="Search now" aria-label="search" aria-describedby="search">
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <!-- <li class="nav-item dropdown mr-1">
            <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center" id="messageDropdown" href="#" data-toggle="dropdown">
              <i class="mdi mdi-message-text mx-0"></i>
              <span class="count"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="messageDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">Messages</p>
              <a class="dropdown-item">
                <div class="item-thumbnail">
                    <img src="{{ asset('majestic/images/faces/face4.jpg') }}" alt="image" class="profile-pic">
                </div>
                <div class="item-content flex-grow">
                  <h6 class="ellipsis font-weight-normal">David Grey
                  </h6>
                  <p class="font-weight-light small-text text-muted mb-0">
                    The meeting is cancelled
                  </p>
                </div>
              </a>
              <a class="dropdown-item">
                <div class="item-thumbnail">
                    <img src="{{ asset('majestic/images/faces/face2.jpg') }}" alt="image" class="profile-pic">
                </div>
                <div class="item-content flex-grow">
                  <h6 class="ellipsis font-weight-normal">Tim Cook
                  </h6>
                  <p class="font-weight-light small-text text-muted mb-0">
                    New product launch
                  </p>
                </div>
              </a>
              <a class="dropdown-item">
                <div class="item-thumbnail">
                    <img src="{{ asset('majestic/images/faces/face3.jpg') }}" alt="image" class="profile-pic">
                </div>
                <div class="item-content flex-grow">
                  <h6 class="ellipsis font-weight-normal"> Johnson
                  </h6>
                  <p class="font-weight-light small-text text-muted mb-0">
                    Upcoming board meeting
                  </p>
                </div>
              </a>
            </div>
          </li> -->
          <li class="nav-item dropdown mr-4">
            <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center notification-dropdown" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="mdi mdi-bell mx-0"></i>
              <span class="count"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="notificationDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">Notifikasi</p>
              <a class="dropdown-item">
                <div class="item-thumbnail">
                  <div class="item-icon bg-success">
                    <i class="mdi mdi-information mx-0"></i>
                  </div>
                </div>
                <div class="item-content">
                  <h6 class="font-weight-normal">Application Error</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    Just now
                  </p>
                </div>
              </a>
              <a class="dropdown-item">
                <div class="item-thumbnail">
                  <div class="item-icon bg-warning">
                    <i class="mdi mdi-settings mx-0"></i>
                  </div>
                </div>
                <div class="item-content">
                  <h6 class="font-weight-normal">Settings</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    Private message
                  </p>
                </div>
              </a>
              <a class="dropdown-item">
                <div class="item-thumbnail">
                  <div class="item-icon bg-info">
                    <i class="mdi mdi-account-box mx-0"></i>
                  </div>
                </div>
                <div class="item-content">
                  <h6 class="font-weight-normal">New user registration</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    2 days ago
                  </p>
                </div>
              </a>
            </div>
          </li>
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <!-- <img src="{{ asset('majestic/images/faces/face5.jpg') }}" alt="profile"/> -->
              @if(Session::get('data')->foto_pegawai)
              <img src="{{ asset('storage/' . Session::get('data')->foto_pegawai) }}" alt="profile">
              @else
              <img src="{{ asset('beranda/dist/img/profilepicture.png') }}" alt="profile">
              @endif
              <span class="nav-profile-name">{{Session::get('data')->nama_pegawai}}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="{{ url('/profil/edit') }}">
                <i class="mdi mdi-settings text-primary"></i>
                Profil
              </a>
              <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                  <i class="mdi mdi-logout text-primary"></i>
                  Keluar
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="index.html">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Dasbor</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/unggah') }}">
              <i class=" mdi mdi-cloud-upload menu-icon"></i>
              <span class="menu-title">Unggah Surat</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/surat') }}">
              <i class=" mdi mdi-new-box menu-icon"></i>
              <span class="menu-title">Surat Baru</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/disposisi') }}">
              <i class="mdi mdi-account-switch menu-icon"></i>
              <span class="menu-title">Disposisi</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/arsip') }}">
              <i class="mdi mdi-archive menu-icon"></i>
              <span class="menu-title">Arsip</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
        
      	@yield('content')

        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2019 <a href="https://www.ipb.ac.id/" target="_blank">IPB</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="{{ asset('majestic/vendors/base/vendor.bundle.base.js') }}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="{{ asset('majestic/vendors/chart.js/Chart.min.js') }}"></script>
  <script src="{{ asset('majestic/vendors/datatables.net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('majestic/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{ asset('majestic/js/off-canvas.js') }}"></script>
  <script src="{{ asset('majestic/js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('majestic/js/template.js') }}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{ asset('majestic/js/dashboard.js') }}"></script>
  <script src="{{ asset('majestic/js/data-table.js') }}"></script>
  <script src="{{ asset('majestic/js/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('majestic/js/dataTables.bootstrap4.js') }}"></script>
  <!-- preview img -->
  <script src="{{ asset('beranda/upload-file.js') }}"></script>
  <!-- change prose to pending -->
  <script type="text/javascript">
    function change() // no ';' here
    {
        var element = document.getElementById("proses");
        element.classList.toggle("badge badge-danger");
        if (element.value=="Proses") element.value = "Pending";
        else element.value = "Pending";
    }
  </script>
  <script type="text/javascript">
    function PreviewButton() // no ';' here
    {
        $('#prevButton').css({
        'display' : 'block'
      });
    }
  </script>
  <script type="text/javascript">
    function timeFunction() {
            setTimeout(function() { PreviewButton(); }, 3000);
         }
  </script>
  <!-- HAPUS SURAT -->
  <script type="text/javascript">
    $(document).on("click", ".open-HapusModal", function () { //target tombol modalnya
    var id_surat = $(this).data('id'); //masukin id surat di data-id ke variable js id_surat
    $(".modal-footer #id_surat").val( id_surat );  //msk var tadi ke input hidden di dalam class modal-footer dgn id id_surat
    // As pointed out in comments, 
    // it is unnecessary to have to manually call the modal.
    // $('#addBookDialog').modal('show');
  });
  </script>
  <!-- End custom js for this page-->
</body>

</html>