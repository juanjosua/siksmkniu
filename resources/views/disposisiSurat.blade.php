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
                            <td>{{$disposisi->surat->perihal_surat}}</td>
                            <td>{{date('d M Y', strtotime($disposisi->surat->created_at))}}</td>
                            <td>{{$disposisi->surat->sektor->nama_sektor}}</td>
                            <div style="display: none;">
                            {{ $nama_pimpinan = $pimpinans->where('jabatanable_id', $disposisi->id_pimpinan) }}
                            </div>
                            @foreach($nama_pimpinan as $np)
                            <td>{{$np->nama_pegawai}}</td>
                            @endforeach
                            <td>{{$disposisi->pesan_disposisi}}</td>
                            <td>
                              <a href="{{ url('/disposisi/detail/' . $disposisi->id_disposisi) }}">
                                <button type="button" class="btn btn-sm btn-warning btn-flat">Details</button>
                              </a>
                              <a href="{{ url('/disposisi/selesai/' . $disposisi->id_disposisi) }}">
                                <button type="button" class="btn btn-sm btn-success btn-flat">Selesai</button>
                              </a>
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

  <!-- Modal Start -->

  <div class="modal modal-danger fade" id="modal-danger">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><b>Delete</b> This Document</h4>
        </div>
        <div class="modal-body">
          <p>Do You Want to <b>Permanently Delete</b> this Document ?</p>
        </div>
        <div class="modal-footer">
          <a href="../document-archieved/document-archieved.html"><button type="button" class="btn btn-outline">Yes</button></a>
          <button type="button" class="btn btn-outline" data-dismiss="modal">No</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

  <!-- Navigation Tab End -->

</section>
<!-- /.content -->
@endsection
