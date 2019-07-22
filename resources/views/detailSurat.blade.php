@extends('layouts.majestic_dash')

@section('content')

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      	<div class="card">
            <div class="card-body">
              	<p class="card-title">Rincian surat</p>
                <p class="mb-4">Berikut merupakan tampilan PDF, serta informasi mengenai detil surat.
                @foreach($images as $image)
                 	<div>
            <embed src="{{ asset('storage/' . $image->image) }}" type="application/pdf" height="600px" width="100%">
          </div>
				@endforeach
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      	<div class="card">
            <div class="card-body dashboard-tabs p-0">
                <ul class="nav nav-tabs px-4" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="overview-tab" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Surat</a>
                    </li>
                </ul>
	            <div class="tab-content py-0 px-0">
	                <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
	                  	<div class="d-flex flex-wrap justify-content-xl-between">
	                        <div class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
	                        <i class="mdi mdi-information-variant icon-lg mr-3 text-primary"></i>
	                          	<!-- <div class="d-flex flex-column justify-content-around">
	                            	<small class="mb-1 text-muted">Perihal Surat</small>
		                            <div class="dropdown">
		                              	<a class="btn btn-secondary dropdown-toggle p-0 bg-transparent border-0 text-dark shadow-none font-weight-medium" href="#" role="button" id="dropdownMenuLinkA" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		                                <h5 class="mb-0 d-inline-block">tanggal</h5>
		                              	</a>
		                             	<div class="dropdown-menu" aria-labelledby="dropdownMenuLinkA">
			                                <p class="dropdown-item">tanggal</a>
		                              	</div>
		                            </div>
	                          	</div> -->
	                          	<div class="d-flex flex-column justify-content-around">
	                            	<small class="mb-1 text-muted">Perihal Surat</small>
	                            	<h5 class="mr-2 mb-0">{{$surat->perihal_surat}}</h5>
	                          	</div>
	                        </div>
	                        <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
	                          	<i class="mdi mdi-counter mr-3 icon-lg text-danger"></i>
	                          	<div class="d-flex flex-column justify-content-around">
	                            	<small class="mb-1 text-muted">Nomor Surat</small>
	                            	<h5 class="mr-2 mb-0">{{$surat->no_surat}}</h5>
	                          	</div>
	                        </div>
	                        <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
	                          	<i class="mdi mdi-home mr-3 icon-lg text-success"></i>
	                          	<div class="d-flex flex-column justify-content-around">
	                            	<small class="mb-1 text-muted">Instansi Pengirim</small>
	                            <h5 class="mr-2 mb-0">{{$surat->instansi->nama_instansi}}</h5>
	                        	</div>
	                        </div>
	                        <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
	                          	<i class="mdi mdi-buffer mr-3 icon-lg text-warning"></i>
	                          	<div class="d-flex flex-column justify-content-around">
	                            	<small class="mb-1 text-muted">Bidang</small>
	                            <h5 class="mr-2 mb-0">{{$surat->sektor->nama_sektor}}</h5>
	                          	</div>
	                        </div>
	                        <div class="d-flex py-3 border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
	                          	<i class="mdi mdi-calendar mr-3 icon-lg text-danger"></i>
	                          	<div class="d-flex flex-column justify-content-around">
	                            	<small class="mb-1 text-muted">Tanggal Surat</small>
	                            <h5 class="mr-2 mb-0">{{date('d M Y', strtotime($surat->tanggal_surat))}}</h5>
	                          	</div>
	                        </div>
	                    </div>
	                </div>
            	</div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      	<div class="card">
            <div class="card-body">
            	@if($id_current_user == $surat->id_admin)
		        <a href="{{ url('surat/edit/' . $surat->id_surat) }}" class="btn btn-warning mr-2">Ubah</a>
		        @else
		        <a href="" class="btn btn-dark mr-2" disabled>Ubah</a>
		        @endif
            	<a href="" class="btn btn-info mr-2">Unduh</a>
            </div>
        </div>
    </div>
</div>        
@endsection