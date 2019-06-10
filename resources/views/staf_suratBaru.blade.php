@extends('layouts.staf')

@section('content')

<!-- Main content -->
<section class="content">

  <!-- Navigation Tab Start -->

  <div class="col-md-12">
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#unggah" data-toggle="tab">Unggahan</a></li>
        <li><a href="#tinjau" data-toggle="tab">Menunggu Tinjauan</a></li>
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
                <table id="example1" class="table no-margin">
                  <thead>
                  <tr>
                    <th>No. Surat</th>
                    <th>Pengirim</th>
                    <th>Tujuan</th>
                    <th>Perihal</th>
                    <th>Tanggal Surat</th>
                    <th>Tanggal Unggah</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <!-- kondisi jika surat tidak ada di database -->
                  @if($jumlahsuratbaru !== 0)
                    <!-- foreach untuk memanggil seluruh surat yang ada di database dan looping -->
                    @foreach($surats as $surat)
                      <!-- kondisi if untuk menentukan surat yang statusnya fresh dan not archived -->
                      @if($surat->status_surat == 'baru')
                        <tr>
                          <td>{{$surat->no_surat}}</td>
                          <td>{{$surat->instansi->nama_instansi}}</td>
                          <td>{{$surat->sektor->nama_sektor}}</td>
                          <td>{{$surat->perihal_surat}}</td>
                          <td>{{date('d M Y', strtotime($surat->tanggal_surat))}}</td>
                          <td>{{$surat->created_at->format('d M Y')}}</td>
                          <td>

                          	<!-- proses surat untuk di tinjau pimpinan -->
                            <a href="{{ url('/surat/proses/' . $surat->id_surat) }}">
                            <button type="button" class="btn btn-sm btn-primary btn-flat">Proses</button>
                            </a>

                            <!-- melihat detail surat -->
                            <a href="{{ url('/surat/detail/' . $surat->id_surat) }}">
                            <button type="button" class="btn btn-sm btn-warning btn-flat">Details</button>
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

        <!-- Baru diunggah Tab End -->

        <!-- Tinjau Tab Start -->

        <div class="tab-pane" id="tinjau">

          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">On Progress</h3>
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
                    <th>Tanggal Surat</th>
                    <th>Tanggal Unggah</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  @if($jumlahsurattinjau !== 0)
                    @foreach($surats as $surat)
                    <!-- kondisi if untuk menentukan surat yang statusnya review dan not archived -->
                      @if($surat->status_surat == 'tinjau')
                        <tr>
                          <td>{{$surat->no_surat}}</td>
                          <td>{{$surat->instansi->nama_instansi}}</td>
                          <td>{{$surat->sektor->nama_sektor}}</td>
                          <td>{{$surat->perihal_surat}}</td>
                          <td>{{date('d M Y', strtotime($surat->tanggal_surat))}}</td>
                          <td>{{$surat->created_at->format('d M Y')}}</td>
                          <td>

                          	<!-- cancel peninjauan atasan -->
                            <a href="{{ url('/surat/cancel/' . $surat->id_surat) }}">
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