    <!-- BUAT NAMPILIN ERROR -->

    <!-- @if ($message = Session::get('error'))
       <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
       </div>
    @endif

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif -->

<html>
    <head>

        <meta name="description" content="Ancient Archieve is a website to Archieve and store your Docs" />
        <meta name="author" content="The Unsung Heroes">

        <!-- Mobile Webs -->
        <meta name="viewport" content="width=device-width, minimum-scale=1.0, initial-scale=1.0, user-scalable=yes">
        <meta name="mobile-web-app-capable" content="yes">

        <title>
            Login | Arsip Surat
        </title>

        <!-- Website Theme -->
        <meta id="theme-color" name="theme-color" content="#1869a0">
        <link rel="stylesheet" href="{{ asset('beranda/css/login.css') }}" />
    </head>

    <body>
        <div class="se-pre-con"></div>

        <div class="container-head">
            <img class="icon" href="{{ url('/') }}" src="{{ asset('beranda/icon/unesco.png') }}" alt="Login-icon">
        </div>

        <div class="container-body">

            <div class="container-card">
                <p>&nbsp;</p>
                <div class="login-header">
                    <img class="icon" src="{{ asset('beranda/icon/login.png') }}" alt="Login-icon">
                    <h2>Login</h2>
                </div>

                <!-- login error -->
                @if(\Session::has('alert'))
                <div class="alert alert-danger">
                    <div>{{Session::get('alert')}}</div>
                </div>
                @endif
                <!-- login berhasil -->
                @if(\Session::has('alert-success'))
                    <div class="alert alert-success">
                        <div>{{Session::get('alert-success')}}</div>
                    </div>
                @endif

                <form action="{{ url('/loginPost') }}" method="POST">
                  @csrf
                    <div>
                        <label for="email_pegawai" ><b>Email</b></label>
                        <br>
                        <input name="email_pegawai" type="email" autofocus>
                    </div>
                    <div>
                        <label for="password" ><b>Password</b></label>
                        <br>
                        <input name="password" type="password">
                    </div>
                    <button class="button">Login</button>
                </form>

            </div>

            <h1>Arsip Surat <br> KNIU.</h1>
            <p>Make Your Archive More Secure!</p>
        </div>


        <!-- JQuery -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>

        <script>
            $(window).load(function() {
                $(".se-pre-con").fadeOut("slow");;
            });
        </script>

    </body>
</html>