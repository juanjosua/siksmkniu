@extends('layouts.admin')

@section('content')

<!-- Main content -->
<section class="content">

  <!-- Navigation Tab Start -->

  <div class="col-md-12">
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#unggah" data-toggle="tab">Unggahan</a></li>
      </ul>
      <div class="tab-content">

        <!-- Baru diunggah Tab Start -->

        <div class="active tab-pane" id="unggah">

          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Surat Baru</h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
              <div class="table-responsive">
                <table id="example1" class="table no-margin" style="white-space: nowrap;">
                  <thead>
                  <tr>
                    <th>Nomor</th>
                    <th>Instansi</th>
                    <th>Perihal</th>
                    <th>Tanggal Surat</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <!-- kondisi jika surat tidak ada di database -->
                  @if($jumlahsuratbaru !== 0 || $jumlahsurattinjau !== 0)
                          @foreach($suratbaru->sortByDesc('created_at') as $surat)
                            <tr>
                                <td>{{str_limit($surat->no_surat, 11, '...')}}</td>
                                <td>{{str_limit($surat->instansi->nama_instansi, 21, '...')}}</td>
                                <td>{{str_limit($surat->perihal_surat, 25, '...')}}</td>
                                <td>{{date('d M Y', strtotime($surat->tanggal_surat))}}</td>
                                <td>
                                  <!-- proses surat untuk di tinjau pimpinan -->
                                  <a href="{{ url('/surat/proses/' . $surat->id_surat) }}">
                                  <!-- <input onclick="change(); this.onclick=null;" id="proses" class="btn btn-danger" value="Proses"> -->
                                  <button type="button" class="btn btn-sm btn-primary btn-flat">Proses</button>
                                  </a>

                                  <!-- melihat detail surat -->
                                  <a href="{{ url('/surat/detail/' . $surat->id_surat) }}">
                                  <button type="button" class="btn btn-sm btn-warning btn-flat">Rincian</button>
                                  </a>
                                  
                                  <button type="button" class="open-HapusModal btn btn-sm btn-danger btn-flat" data-toggle="modal" data-target="#modal-danger" data-id="{{ $surat->id_surat }}">Hapus</button>
                                </td>
                            </tr>
                          @endforeach
                        @else
                          <tr><td>Tidak ada surat masuk</td></tr>
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

        <!-- Baru diunggah Tab End -->

      </div>
      <!-- /.tab-content -->
    </div>
    <!-- /.nav-tabs-custom -->
  </div>

  <!-- Navigation Tab End -->

  <!-- Modal Hapus Surat Start -->
<form action="{{ url('/surat/destroy/') }}" method="POST">
  {{ csrf_field() }}
  {{ method_field('DELETE') }}
  <div class="modal modal-danger fade" id="modal-danger">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><b>Hapus</b> Surat</h4>
        </div>
        <div class="modal-body">
          <p>Apakah Anda yakin akan <b>Menghapus Permanen</b> Surat ini ?</p>
          <small>Surat yang sudah dihapus <b>TIDAK DAPAT</b> dikembalikan.</small>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-outline">Ya</button>
          <button type="button" class="btn btn-outline" data-dismiss="modal">Tidak</button>
          <input type="hidden" name="id_surat" id="id_surat" value=""/>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
</form>
  <!-- Modal End -->

</section>
<!-- /.content -->
@endsection