@extends(Session::get('data')->jabatanable_type == "App\Staf" ? 'layouts.staf' : 
        (Session::get('data')->jabatanable_type == "App\Pimpinan" ? 'layouts.pimpinan' : 'layouts.admin'))

@section('content')

<!-- Main content -->
<section class="content">

  <!-- Navigation Tab Start -->

  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Disposisi</h3>

          <div class="box-tools pull-right">
          </div>
        </div>
            <!-- /.box-header -->

            <div class="box-body">
              <div class="table-responsive">
                <table id="example1" class="table no-margin">
                  <thead>
                  <tr>
                    <th>Pimpinan</th>
                    <th>Perihal</th>
                    <th>Bidang</th>
                    <th>Pesan</th>
                    <th>Tanggal Unggah</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    @if($jumlahdisposisi !== 0)
                          @foreach($disposisis as $disposisi)
                            <!-- untuk menampilkan disposisi yang belum selesai saja -->
                            @if($disposisi->surat->status_surat != 'arsip')
                            <tr>
                                <td class="py-1">
                                  <!-- <img src="../../images/faces/face1.jpg" alt="image"/> -->
                                  <div style="display: none;">
                                  {{ $foto_pimpinan = $pimpinans->where('jabatanable_id', $disposisi->id_pimpinan) }}
                                  </div>
                                  @foreach($foto_pimpinan as $foto)
                                  {{ $foto->nama_pegawai }}
                                  @endforeach
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
                                      <button type="button" class="open-HapusModal btn btn-sm btn-danger btn-flat" data-toggle="modal" data-target="#modal-danger" data-id="{{ $disposisi->id_disposisi }}">Batal</button>
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

  <!-- Modal Hapus Disposisi Start -->
<form action="{{ url('/disposisi/destroy/')}}" method="POST">
  {{ csrf_field() }}
  {{ method_field('DELETE') }}
  <div class="modal modal-danger fade" id="modal-danger">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><b>Batal</b> Disposisi</h4>
        </div>
        <div class="modal-body">
          <p>Apakah Anda yakin akan <b>membatalkan</b> disposisi ini ?</p>
          <small>Disposisi yang dihapus akan kembali pada tabel surat masuk.</small>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-outline">Ya</button>
          <button type="button" class="btn btn-outline" data-dismiss="modal">Tidak</button>
          <input type="hidden" name="id_disposisi" id="id_disposisi" value=""/>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
</form>
  <!-- Modal End -->

  <!-- Modal PDF Start -->
<form action="{{ url('/disposisi/tambah/surat/') }}" method="POST" enctype="multipart/form-data">
  {{ csrf_field() }}
  <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Dokumen</h4>
              </div>
              <div class="modal-body">
                <!-- <input type="file" value="" name="image" class="form-control" id="uploadPDF"> -->

                    <div class="dropzone-wrapper">
                      <div class="dropzone-desc">
                      <i class="glyphicon glyphicon-download-alt"></i>
                      <p>Pilih berkas PDF atau seret berkas ke sini.</p>
                      </div>
                      <input id="uploadPDF" value="" type="file" name="image" class="dropzone">
                    </div>

                    <br>

                    <div class="preview-zone hidden">
                      <div class="box box-solid">

                        <!-- PDF Preview Start -->

                        <input class="btn btn-primary center-block" name="image" type="button" value="Preview" onclick="PreviewImage();">
                        <br>

                        <div id="preview" style="clear:both; display: none;">
                          <iframe target="_blank" id="viewer" frameborder="0" scrolling="no" width="100%" height="500"></iframe>
                        </div>

                        <!-- PDF Preview End -->

                        <!-- nama berkas -->
                        <div class="box-body"></div> 

                      </div>

                    </div>

                <!-- <small style="color: red">Max File Size = 2MB</small> -->
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <input type="hidden" name="id_surat" id="id_surat" value=""/>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

  <!-- Modal PDF End -->
</form>
</section>
<!-- /.content -->
@endsection
