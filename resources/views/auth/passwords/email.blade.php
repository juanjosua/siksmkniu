@extends('layouts.template')

@section('content')

    <!-- Main content -->
<section class="content">

  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Lupa Sandi</h3>

          <div class="box-tools pull-right">
          </div>
        </div>

        <!-- /.box-header -->
        <div class="box-body graphic">
          <div class="row">
            <div class="col-md-12">

                @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email_pegawai" class="col-md-4 col-form-label text-md-right">{{ __('Alamat Surel') }}</label>

                            <div class="col-md-6">
                                <input id="email_pegawai" type="email" class="form-control @error('email_pegawai') is-invalid @enderror" name="email_pegawai" value="{{ old('email_pegawai') }}" required autocomplete="email_pegawai" autofocus>

                                @error('email_pegawai')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Kirim tautan ubah sandi') }}
                                </button>
                            </div>
                        </div>
                    </form>

            </div>
          </div>
          <!-- /.row -->
        </div>
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>

@endsection
