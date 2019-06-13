@extends(Session::get('data')->jabatanable_type == "App\Staf" ? 'layouts.staf' : 'layouts.pimpinan')

@section('content')

<!-- Main content -->
<section class="content">

  <!-- Navigation Tab Start -->

  <div class="col-md-12">
    <div class="nav-tabs-custom">
      <div class="tab-content">

        <!-- Disposisi Tab Start -->

        <div class="active tab-pane" id="disposisi">

          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Disposisi</h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
              <div class="table-responsive">
                <table id="example1" class="table no-margin">
                  <thead>
                  <tr>
                    <th>No. Surat</th>
                    <th>Perihal Surat</th>
                    <th>Tanggal Unggah</th>
                    <th>Sektor</th>
                    <th>Pemberi Disposisi</th>
                    <th>Pesan Disposisi</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    @if($jumlahdisposisi !== 0)
                      @foreach($disposisis as $disposisi)
                          <tr>
                            <td>{{$disposisi->surat->no_surat}}</td>
                            <td>{{str_limit($disposisi->surat->perihal_surat, 15, '...')}}</td>
                            <td>{{$disposisi->surat->created_at->format('d M Y')}}</td>
                            <td>{{$disposisi->surat->sektor->nama_sektor}}</td>
                            <div style="display: none;">
                            {{ $nama_pimpinan = $pimpinans->where('jabatanable_id', $disposisi->id_pimpinan) }}
                            </div>
                            @foreach($nama_pimpinan as $np)
                            <td>{{$np->nama_pegawai}}</td>
                            @endforeach
                            <td>{{str_limit($disposisi->pesan_disposisi, 35, '...')}}</td>
                            <td>
                              <a href="{{ url('/disposisi/detail/' . $disposisi->id_disposisi) }}">
                                <button type="button" class="btn btn-sm btn-warning btn-flat">Details</button>
                              </a>
                            @if(Session::get('data')->jabatanable_type == 'App\Pimpinan')

                              @if($disposisi->surat->status_surat != 'selesai')
                            <!-- tombol selesai pimpinan ketika belum selesai dikerjakan staf -->
                                <button type="button" disabled class="btn btn-sm btn-dark btn-flat">Selesai</button>
                              @else
                              <!-- tombol selesai pimpinan ketika sudah selesai dikerjakan staf -->
                              <a href="{{ url('/arsip/baru/' . $disposisi->id_disposisi) }}">
                                <button type="button" class="btn btn-sm btn-success btn-flat">Selesai</button>
                              </a>
                              @endif

                            @else

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
                            @if(Session::get('data')->jabatanable_type == 'App\Pimpinan')
                                <button type="button" class="btn btn-sm btn-danger btn-flat" data-toggle="modal" data-target="#modal-danger">Hapus</button>
                            @endif
                            </td>
                          </tr>
                      @endforeach
                    @else
                      <tr><td>Tidak ada disposisi.</td></tr>
                    @endif
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>

          </div>

          <!-- TABLE : Document End -->

        </div>
        <!-- /.tab-pane -->

        <!-- Disposisi Tab End -->

      </div>
      <!-- /.tab-content -->
    </div>
    <!-- /.nav-tabs-custom -->
  </div>

@if($jumlahdisposisi !== 0)
@foreach($disposisis as $disposisi)
  <!-- Modal Hapus Disposisi Start -->
<form action="{{ url('/disposisi/destroy/' . $disposisi->id_disposisi) }}" method="POST">
  {{ csrf_field() }}
  {{ method_field('DELETE') }}
  <div class="modal modal-danger fade" id="modal-danger">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><b>Hapus/b> Disposisi</h4>
        </div>
        <div class="modal-body">
          <p>Apakah Anda yakin akan <b>Menghapus Permanen</b> Disposisi ini ?</p>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-outline">Ya</button>
          <button type="button" class="btn btn-outline" data-dismiss="modal">Tidak</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
</form>
  <!-- Modal End -->
@endforeach
@endif

  <!-- Modal Start -->

  <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Default Modal</h4>
              </div>
              <div class="modal-body">
                <p>One fine body&hellip;</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

  <!-- Modal End -->

</section>
<!-- /.content -->
@endsection
