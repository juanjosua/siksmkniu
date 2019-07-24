@extends('layouts.staf')

@section('content')

<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Verifikasi email anda!</h4>
                  
                  	@if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Tautan verifikasi email telah terkirim ke surel anda.') }}
                        </div>
                    @endif

                    {{ __('Sebelum melanjutkan, mohon periksa surel anda.') }}
                    {{ __('Jika anda tidak menerima email') }}, <a href="{{ route('verification.resend') }}">{{ __('klik disini untuk menerima tautan baru') }}</a>.

                </div>
              </div>
            </div>

@endsection