@extends('layouts.regform')

@section('content')
<!-- Sing in  Form -->
        <section class="sign-in" style="margin-bottom: 0px;">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="{{ asset('regform/images/signin-image.jpg') }}" alt="sign in image"></figure>
                        <a href="{{ route('register') }}" class="signup-image-link">Buat akun</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Masuk</h2>
                        <form method="POST" class="login-form" id="login-form" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email_pegawai"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="email" name="email_pegawai" id="email_pegawai" placeholder="Surel anda" class="form-control @error('email_pegawai') is-invalid @enderror" value="{{ old('email_pegawai') }}" required autocomplete="email_pegawai" autofocus/>

                                @error('email_pegawai')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="kata sandi" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"/>
                                
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Masuk"/>
                            </div>
                        </form>
                        <div class="social-login">
                            <span class="social-label">Or login with</span>
                            <ul class="socials">
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection