@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->


<!-- Main content -->
<section class="content">

  <!-- Navigation Tab Start -->

  <div class="col-md-12">
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#surat" data-toggle="tab">Daftar Surat</a></li>
        <!-- <li><a href="#review" data-toggle="tab">Menunggu Tinjauan</a></li> -->
      </ul>
      <div class="tab-content">


        <!-- EDIT HERE !!! -->

        <!-- Surat Tab Start -->

        <div class="active tab-pane" id="surat">

          <div class="box box-info">
            <!-- /.box-header -->

            <div class="box-body">
              <div class="table-responsive">
                <table id="example1" class="table no-margin">
                  <thead>
                  <tr>
                    <th>Nomor</th>
                    <th>Peihal</th>
                    <th>Pengirim</th>
                    <th>Tanggal Dibuat</th>
                    <th>Tanggal Unggah</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
                  <!-- kondisi jika tidak ada user di database -->
                  @if($dataSurat !== 0)
                    <!-- foreach untuk memanggil seluruh surat yang ada di database dan looping -->
                    @foreach($dataSurat as $surat)
                        <tr>
                          <td>{{$surat->nomor_surat}}</td>
                          <td>{{$surat->perihal_surat}}</td>
                          <td>{{$surat->pengirim_surat}}</td>
                          <td>{{$surat->tanggal_pembuatan_surat}}</td>
                          <td>{{$surat->created_at}}</td>
                          <td>{{$surat->status_surat}}</td>
                        </tr>
                    @endforeach
                  @else
                    <tr><td>Tidak ada surat</td></tr>
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

        <!-- Surat Tab End -->

        <!-- EDIT DONE HERE!!!! -->

      </div>
      <!-- /.tab-content -->
    </div>
    <!-- /.nav-tabs-custom -->
  </div>

  <!-- Navigation Tab End -->

</section>
<!-- /.content -->
@endsection
