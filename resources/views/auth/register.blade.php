@extends('layouts.regform')

@section('content')
<!-- Sign up form -->
        <section class="signup" style="margin-bottom: 0px;">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Daftar</h2>
                        <form method="POST" class="register-form" id="register-form" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group">
                                <label for="nama_pegawai"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="nama_pegawai" id="nama_pegawai" placeholder="Nama lengkap Anda" class="form-control @error('nama_pegawai') is-invalid @enderror" value="{{ old('nama_pegawai') }}" required autocomplete="nama_pegawai" autofocus/>

                                @error('nama_pegawai')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email_pegawai"><i class="zmdi zmdi-email"></i></label>
                                <input type="email_pegawai" name="email_pegawai" id="email_pegawai" placeholder="Surel Anda" class="form-control @error('email_pegawai') is-invalid @enderror" value="{{ old('email_pegawai') }}" required autocomplete="email_pegawai"/>

                                @error('email_pegawai')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Kata sandi" class="form-control @error('password') is-invalid @enderror" required autocomplete="new-password"/>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password-confirm"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="password_confirmation" id="password-confirm" class="form-control" placeholder="Ulangi kata sandi" required autocomplete="new-password"/>
                            </div>

                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>

                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Daftar"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="{{ asset('regform/images/signup-image.jpg') }}" alt="sing up image"></figure>
                        <a href="{{ route('login') }}" class="signup-image-link">Sudah memiliki akun</a>
                    </div>
                </div>
            </div>
        </section>
@endsection