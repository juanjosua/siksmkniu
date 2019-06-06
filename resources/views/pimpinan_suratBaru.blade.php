@extends('layouts.pimpinan')

@section('content')

<!-- Main content -->
<section class="content">

  <!-- Navigation Tab Start -->

  <div class="col-md-12">
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li><a href="#unggah" data-toggle="tab">Unggahan</a></li>
        <li class="active"><a href="#tinjau" data-toggle="tab">Perlu Tinjauan</a></li>
      </ul>
      <div class="tab-content">

        <!-- Baru diunggah Tab Start -->

        <div class="tab-pane" id="unggah">

          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Surat Baru</h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
              <div class="table-responsive">
                <table id="example1" class="table no-margin">
                  <thead>
                  <tr>
                    <th>Nomor</th>
                    <th>Pengirim</th>
                    <th>Tujuan</th>
                    <th>Perihal</th>
                    <th>Tanggal Pembuatan</th>
                    <th>Tanggal Unggah</th>
                    <th>Tinjauan</th>
                  </tr>
                  </thead>
                  <tbody>
                    @if($jumlahsuratunggah !== 0)
                      @foreach($surats as $surat)
                      <!-- kondisi if untuk menentukan surat yang statusnya fresh dan not archived -->
                        @if($surat->status_surat == 1)
                          <tr>
                            <td>{{$surat->no_surat}}</td>
                            <td>{{$surat->pengirim_surat}}</td>
                            <td>{{$surat->tujuan_surat}}</td>
                            <td>{{$surat->perihal_surat}}</td>
                            <td>{{$surat->tanggal_pembuatan_surat}}</td>
                            <td>{{$surat->created_at->format('d-m-Y') }}</td>
                            <td>
                                <a href="{{ url('/surat/proses/' . $surat->surat_id) }}">
                              <button type="button" class="btn btn-sm btn-primary btn-flat">Proses</button>
                              </a>
                              <a href="{{ url('/surat/detail/' . $surat->surat_id) }}">
                              <button type="button" class="btn btn-sm btn-warning btn-flat">Details</button>
                              </a>
                            </td>
                          </tr>
                        @endif
                      @endforeach
                    @else
                      <tr><td>Tidak ada surat masuk</td></tr>
                    @endif
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>

          </div>

          <!-- TABLE : Document End -->

        </div>
        <!-- /.tab-pane -->

        <!-- Baru diunggah Tab End -->

        <!-- Tinjau Tab Start -->

        <div class="active tab-pane" id="tinjau">

          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Perlu Tinjauan</h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
              <div class="table-responsive">
                <table id="example2" class="table no-margin">
                  <thead>
                  <tr>
                    <th>Nomor</th>
                    <th>Pengirim</th>
                    <th>Tujuan</th>
                    <th>Perihal</th>
                    <th>Tanggal Pembuatan</th>
                    <th>Upload Date</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @if($jumlahsurattinjau !== 0)
                      @foreach($surats as $surat)
                      <!-- kondisi if untuk menentukan surat yang statusnya review dan not archived -->
                        @if($surat->status_surat == 2)
                          <tr>
                            <td>{{$surat->no_surat}}</td>
                            <td>{{$surat->pengirim_surat}}</td>
                            <td>{{$surat->tujuan_surat}}</td>
                            <td>{{$surat->perihal_surat}}</td>
                            <td>{{$surat->tanggal_pembuatan_surat}}</td>
                            <td>{{$surat->created_at->format('d-m-Y') }}</td>
                            <td>
                                <a data-target="#myModal" role="button" data-toggle="modal">
                                  <button type="button" class="btn btn-sm btn-primary btn-flat">Disposisi</button>
                                </a>
                                      <!-- dropdown disposisi start -->
                                      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h3 id="myModalLabel">Disposisi ke :</h3>
                                            </div>
                                            <div class="modal-body">
                                                    <select>
                                                        @foreach($pegawais as $pegawai)
                                                        <option value="{{ $pegawai->nama_pegawai }}">{{ $pegawai->nama_pegawai }}</option>
                                                        @endforeach
                                                    </select>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-sm btn-dark btn-flat" data-dismiss="modal" aria-hidden="true">Close</button>
                                              <a href="{{ url('/status/approved/' . $surat->id) }}">
                                                <button class="btn btn-sm btn-primary btn-flat">Save changes</button>
                                              </a>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <!-- dropdown disposisi end -->

                                <a href="{{ url('/surat/arsip/' . $surat->surat_id) }}">
                                  <button type="button" class="btn btn-sm btn-success btn-flat">Arsip</button>
                                </a>

                                <a href="{{ url('/surat/detail/' . $surat->surat_id) }}">
                                  <button type="button" class="btn btn-sm btn-warning btn-flat">Details</button>
                                </a>
                                
                                <a href="{{ url('/surat/cancel/' . $surat->surat_id) }}">
                                  <button type="button" class="btn btn-sm btn-danger btn-flat">Cancel</button>
                                </a>
                            </td>
                          </tr>
                        @endif
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

        <!-- Tinjau Tab End -->

      </div>
      <!-- /.tab-content -->
    </div>
    <!-- /.nav-tabs-custom -->
  </div>

  <!-- Navigation Tab End -->

</section>
<!-- /.content -->
@endsection
