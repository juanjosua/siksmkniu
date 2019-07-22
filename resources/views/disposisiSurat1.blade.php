@extends('layouts.majestic_dash')

@section('content')

<div class="col-lg-12 grid-margin stretch-card" style="margin-top: 10px;">
  	<div class="card">
        <div class="card-body">
	        <h4 class="card-title">Disposisi</h4>
                <div class="table-responsive">
                    <table class="table table-striped">
                      	<thead>
	                        <tr>
		                        <th>
	                            	Pimpinan
	                          	</th>
	                          	<th>
	                            	Perihal
	                          	</th>
	                          	<th>
	                            	Bidang
	                          	</th>
	                          	<th>
	                            	Pesan
	                          	</th>
	                          	<th>
	                           		Tanggal Unggah
	                          	</th>
	                          	<th>
	                            	Aksi
	                          	</th>
                        	</tr>
                      	</thead>
                      	<tbody>
                      	@if($jumlahdisposisi !== 0)
                      		@foreach($disposisis as $disposisi)
                      			<!-- untuk menampilkan disposisi yang belum selesai saja -->
                        		@if($disposisi->surat->status_surat != 'arsip')
		                        <tr>
		                          	<td class="py-1">
		                            	<img src="../../images/faces/face1.jpg" alt="image"/>
		                          	</td>
		                          	<td>
		                            	{{str_limit($disposisi->surat->perihal_surat, 15, '...')}}
		                          	</td>
		                          	<td>
			                            {{$disposisi->surat->sektor->nama_sektor}}
		                          	</td>
		                          	<td>
		                            	{{str_limit($disposisi->pesan_disposisi, 35, '...')}}
		                          	</td>
		                          	<td>
		                            	{{$disposisi->surat->created_at->format('d M Y')}}
		                          	</td>
		                          	<td>
		                            	<a href="{{ url('/disposisi/detail/' . $disposisi->id_disposisi) }}">
		                                <button type="button" class="btn btn-sm btn-warning btn-flat">Rincian</button>
		                              	</a>

			                            @if(Session::get('data')->jabatanable_type == 'App\Staf')
			                                <button type="button" class="open-Disposisi btn btn-sm btn-primary btn-flat" data-toggle="modal" data-target="#modal-default" data-id="{{ $disposisi->surat->id_surat }}"><b>+</b> Dokumen</button>
			                            @endif

			                            <!-- tombol selesai PIMPINAN -->
			                            @if(Session::get('data')->jabatanable_type == 'App\Pimpinan')

			                              @if($disposisi->surat->status_surat != 'selesai')
			                              <!-- tombol selesai pimpinan ketika belum selesai dikerjakan staf -->
			                                <button type="button" disabled class="btn btn-sm btn-dark btn-flat">Selesai</button>
			                              @else
			                              <!-- tombol selesai pimpinan ketika sudah selesai dikerjakan staf -->
			                              <a href="{{ url('/arsip/baru/' . $disposisi->surat->id_surat) }}">
			                                <button type="button" class="btn btn-sm btn-success btn-flat">Selesai</button>
			                              </a>
			                              @endif

			                            @else
			                              <!-- tombol selesai STAF -->
			                              @if($disposisi->surat->status_surat != 'selesai')
			                              <!-- tombol selesai staf ketika belum selesai dikerjakan -->
			                              <a href="{{ url('/disposisi/selesai/' . $disposisi->id_disposisi) }}">
			                                <button type="button" class="btn btn-sm btn-success btn-flat">Selesai</button>
			                              </a>
			                              @else
			                              <!-- tombol selesai staf ketika sudah selesai dikerjakan -->
			                                <button type="button" disabled class="btn btn-sm btn-dark btn-flat">Selesai</button>
			                              @endif

			                            @endif

			                            @if((Session::get('data')->jabatanable_type == 'App\Pimpinan') && ($disposisi->surat->status_surat != 'selesai'))
			                                <button type="button" class="open-HapusModal btn btn-sm btn-danger btn-flat" data-toggle="modal" data-target="#modal-danger" data-id="{{ $disposisi->id_disposisi }}">Hapus</button>
			                            @endif
		                          	</td>
		                        </tr>

		                        @else
                          		<tr><td>Tidak ada disposisi.</td></tr>
	                    		@endif
	                      	@endforeach
	                    @else
	                      <tr><td>Tidak ada disposisi.</td></tr>
	                    @endif

                      	</tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

@endsection