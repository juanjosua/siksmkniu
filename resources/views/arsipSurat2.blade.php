@extends('layouts.majestic_dash')

@section('content')

<div class="col-lg-12 grid-margin stretch-card">
  	<div class="card">
        <div class="card-body">
	        <h4 class="card-title">Arsip</h4>
                <div class="table-responsive">
                    <table class="table table-striped">
                      	<thead>
	                        <tr>
		                        <th>
	                            	Perihal
	                          	</th>
	                          	<th>
	                            	Instansi
	                          	</th>
	                          	<th>
	                            	Bidang
	                          	</th>
	                          	<th>
	                            	Tanggal Unggah
	                          	</th>
	                          	<th>
	                           		Tanggal Arsip
	                          	</th>
	                          	<th>
	                            	Aksi
	                          	</th>
                        	</tr>
                      	</thead>
                      	<tbody>
                      	@if($jumlaharsip !== 0)
                      		@foreach($arsips as $arsip)
		                        <tr>
		                          	<td>
		                            	{{str_limit($arsip->surat->perihal_surat, 15, '...')}}
		                          	</td>
		                          	<td>
		                            	{{$arsip->surat->instansi->nama_instansi}}
		                          	</td>
		                          	<td>
			                            {{$arsip->surat->sektor->nama_sektor}}
		                          	</td>
		                          	<td>
		                            	{{$arsip->surat->created_at->format('d M Y')}}
		                          	</td>
		                          	<td>
		                            	{{$arsip->created_at->format('d M Y')}}
		                          	</td>
		                          	<td>
		                            	<!-- detail surat -->
			                            <a href="{{ url('/arsip/detail/' . $arsip->id_arsip) }}">
			                            <button type="button" class="btn btn-sm btn-warning btn-flat">Detail</button>
			                            </a>

			                            <!-- hapus arsip -->
			                            @if(Session::get('data')->jabatanable_type == "App\Pimpinan")
			                            <button type="button" class="open-HapusModal btn btn-sm btn-danger btn-flat" data-toggle="modal" data-target="#modal-danger" data-id="{{ $arsip->id_arsip }}">Hapus</button>
			                            @else
			                            <button type="button" class="open-HapusModal btn btn-sm btn-danger btn-flat" disabled>Hapus</button>
			                            @endif
		                          	</td>
		                    @endforeach
	                    @else
	                      <tr><td>Tidak ada arsip.</td></tr>
	                    @endif
		                        </tr>
                      	</tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

@endsection