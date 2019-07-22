@extends('layouts.majestic')

@section('content')

<h4>Belum memiliki akun?</h4>
<h6 class="font-weight-light">Ikuti beberapa langkah di bawah!</h6>
  	<form method="POST" class="pt-3" action="{{ route('register') }}">
  		@csrf
  	<!-- input nama -->
    <div class="form-group">
      	<input type="text" name="nama_pegawai" id="nama_pegawai" placeholder="Nama lengkap Anda" class="form-control form-control-lg @error('nama_pegawai') is-invalid @enderror" value="{{ old('nama_pegawai') }}" required autocomplete="nama_pegawai" autofocus/>

        @error('nama_pegawai')
       		<span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <!-- input email -->
    <div class="form-group">
      	<input type="email" name="email_pegawai" id="email_pegawai" placeholder="Surel Anda" class="form-control form-control-lg @error('email_pegawai') is-invalid @enderror" value="{{ old('email_pegawai') }}" required autocomplete="email_pegawai"/>

    	@error('email_pegawai')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
	</div>
	<!-- input password -->
    <div class="form-group">
	    <input type="password" name="password" id="password" placeholder="Kata sandi" class="form-control form-control-lg @error('password') is-invalid @enderror" required autocomplete="new-password"/>

	    @error('password')
	        <span class="invalid-feedback" role="alert">
		        <strong>{{ $message }}</strong>
	        </span>
	    @enderror
    </div>
    <!-- ulangi password -->
    <div class="form-group">
      <input type="password" name="password_confirmation" id="password-confirm" class="form-control form-control-lg" placeholder="Ulangi kata sandi" required autocomplete="new-password"/>
    </div>

    <!-- <div class="mb-4">
      <div class="form-check">
        <label class="form-check-label text-muted">
          <input type="checkbox" class="form-check-input">
	          I agree to all Terms & Conditions
        </label>
      </div>
	</div> -->
    <div class="mt-3">
      <input type="submit" name="signup" id="signup" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" value="DAFTAR"/>
    </div>
    <div class="text-center mt-4 font-weight-light">
      Sudah memiliki akun? <a href="{{ route('login') }}" class="text-primary">Masuk</a>
    </div>
  	</form>

@endsection