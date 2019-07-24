@extends('layouts.majestic_superadmin')

@section('content')

<div class="col-lg-12 grid-margin stretch-card" style="margin-top: 10px">
  	<div class="card">
        <div class="card-body">
	        <h4 class="card-title">Data Pegawai</h4>
                <div class="table-responsive">
                    <table class="table table-striped" style="text-align: center;">
                      	<thead>
	                        <tr>
		                        <th>Foto</th>
	                          	<th>Nama</th>
	                          	<th>NIP</th>
	                          	<th>Bidang</th>
	                          	<th>Ubah Jabatan</th>
	                          	<th>Hapus</th>
                        	</tr>
                      	</thead>
                      	<tbody>
                      	<!-- kondisi jika tidak ada user di database -->
		                @if($dataPegawai !== 0)
		                    <!-- foreach untuk memanggil seluruh surat yang ada di database dan looping -->
		                    @foreach($dataPegawai as $pegawai)
		                        <tr>
		                          	<td class="py-1">
		                            	
		                          	</td>
		                          	<td>
		                            	{{$pegawai->nama_pegawai}}
		                          	</td>
		                          	<td>
			                            {{$pegawai->nip}}
		                          	</td>
		                          	<td>
		                            	
		                          	</td>
		                          	<td>
		                            	<!-- check admin -->
			                              @if($pegawai->jabatanable_type == 'App\Admin')
			                              <button disabled type="button" class="btn btn-sm btn-primary btn-flat">Admin</button>
			                              @else
			                              <a href="{{ url('/superadmin_dataPegawai/setadmin/' . $pegawai->id_pegawai) }}">
			                              <button type="button" class="btn btn-sm btn-primary btn-flat">Admin</button>
			                              </a>
			                              @endif

			                              <!-- check pimpinan -->
			                              @if($pegawai->jabatanable_type == 'App\Pimpinan')
			                              <button disabled type="button" class="btn btn-sm btn-primary btn-flat">Pimpinan</button>
			                              @else
			                              <a href="{{ url('/superadmin_dataPegawai/setpimpinan/' . $pegawai->id_pegawai) }}">
			                              <button type="button" class="btn btn-sm btn-primary btn-flat">Pimpinan</button>
			                              </a>
			                              @endif

			                              <!-- check staf -->
			                              @if($pegawai->jabatanable_type == 'App\Staf')
			                              <button disabled type="button" class="btn btn-sm btn-primary btn-flat">Staf</button>
			                              @else
			                              <a href="{{ url('/superadmin_dataPegawai/setstaf/' . $pegawai->id_pegawai) }}">
			                              <button type="button" class="btn btn-sm btn-primary btn-flat">Staf</button>
			                              </a>
			                              @endif
		                          	</td>
		                          	<td>
		                            	<!-- hapus user -->
			                            <form action="{{ url('/superadmin_dataPegawai/delete/' . $pegawai->id_pegawai) }}" method="POST">
			                                {{ csrf_field() }}
			                                {{ method_field('DELETE') }}
			                                  <button type="submit" class="btn btn-sm btn-danger btn-flat">Hapus</button>
			                            </form>
		                          	</td>
		                        </tr>

		                    @endforeach
				        @else
		                    <tr><td>Tidak ada pegawai</td></tr>
	                  	@endif
                      	</tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

@endsection