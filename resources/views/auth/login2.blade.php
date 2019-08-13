@extends('layouts.majestic')

@section('content')

<h4>Selamat Datang!</h4>
<h6 class="font-weight-light">Silakan masuk.</h6>
<form method="POST" class="pt-3" action="{{ route('login') }}">
	@csrf
	<!-- input email -->
	<div class="form-group">
 		<input type="email" name="email_pegawai" id="email_pegawai" placeholder="Surel anda" class="form-control form-control-lg @error('email_pegawai') is-invalid @enderror" value="{{ old('email_pegawai') }}" required autocomplete="email_pegawai" autofocus/>

        @error('email_pegawai')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
	</div>
	<!-- input password -->
	<div class="form-group">
    	<input type="password" name="password" id="password" placeholder="kata sandi" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"/>
                                
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
	</div>
	<!-- tombol masuk -->
	<div class="mt-3">
		<input type="submit" name="signin" id="signin" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" value="MASUK"/>
	</div>
	<div class="my-2 d-flex justify-content-between align-items-center">
     	<div class="form-check">
			<label class="form-check-label text-muted">
          	<!-- <input type="checkbox" class="form-check-input"> -->
                <!-- Tetap masuk -->
            </label>
		</div>
		<!-- lupa password -->
		<a href="{{ route('password.request') }}" class="auth-link text-black">Lupa kata sandi?</a>
    </div>
	<!-- <div class="mb-2">
		<button type="button" class="btn btn-block btn-facebook auth-form-btn">
            <i class="mdi mdi-facebook mr-2"></i>Connect using facebook
        </button>
	</div> -->
	<div class="text-center mt-4 font-weight-light">
        <a href="{{ route('register') }}" class="text-primary">Buat akun</a>
	</div>
</form>

@endsection