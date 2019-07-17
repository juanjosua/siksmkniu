<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

    <!-- Main Section -->
    <section class="main-section">
        <!-- Add Your Content Inside -->
        <div class="content">
            <!-- Remove This Before You Start -->
            <h1>Anak IT -  Tutorial Login, Register, Validasi dengan Laravel 5.4</h1>
            <p>Hallo, {{Session::get('nama_pegawai')}}. Apakabar?</p>

            <h2>* Email kamu : {{Auth::user()->email_pegawai}}</h2>
            <h2>* Session status : {{Session::get('data')}} </h2>
            
            <h2></h2>
            <h2></h2>
            
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>

        </div>
        <!-- /.content -->
    </section>
    <!-- /.main-section -->

</body>
</html>
    
