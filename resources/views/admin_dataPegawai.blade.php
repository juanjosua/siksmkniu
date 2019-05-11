@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <i class="fa fa-file-text"></i>
    Surat Masuk
  </h1>
  <!-- <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-file-text"></i> Document Approval Status</a></li>
  </ol> -->
</section>

<!-- Main content -->
<section class="content">

  <!-- Navigation Tab Start -->

  <div class="col-md-12">
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#fresh" data-toggle="tab">Unggahan</a></li>
        <li><a href="#review" data-toggle="tab">Menunggu Tinjauan</a></li>
      </ul>
      <div class="tab-content">


        <!-- EDIT HERE !!! -->

        <!-- Fresh Tab Start -->

        <div class="active tab-pane" id="fresh">

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
                    <th>Nomor Surat</th>
                    <th>Sumber</th>
                    <th>Tujuan</th>
                    <th>Perihal</th>
                    <th>Tanggal Dibuat</th>
                    <th>Tanggal Unggah</th>
                    <!-- <th>Status</th> -->
                    <th>Tinjauan</th>
                  </tr>
                  </thead>
                  <tbody>
                  <!-- kondisi jika surat tidak ada di database -->
                  @if($jumlahsuratfresh !== 0)
                    <!-- foreach untuk memanggil seluruh surat yang ada di database dan looping -->
                    @foreach($surats as $surat)
                      <!-- kondisi if untuk menentukan surat yang statusnya fresh dan not archived -->
                      @if($surat->Status == NULL && $surat->archived_status == 1)
                        <tr>
                          <td>{{$surat->no_surat}}</td>
                          <td>{{$surat->sumber_surat}}</td>
                          <td>{{$surat->tujuan_surat}}</td>
                          <td>{{$surat->perihal}}</td>
                          <td>{{$surat->tanggal_dibuat}}</td>
                          <td>{{$surat->created_at->format('d-m-Y') }}</td>
                          <!-- <td><span class="label label-info">Fresh</span></td> -->
                          <td>
                              <a href="{{ url('/status/reviewed/' . $surat->id) }}">
                              <button type="button" class="btn btn-sm btn-primary btn-flat">Proses</button>
                              </a>
                              <a href="{{ url('/document_detail/' . $surat->id) }}">
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

        <!-- Fresh Tab End -->

        <!-- On Progress Tab Start -->

        <div class="tab-pane" id="review">

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
                    <th>Nomor Surat</th>
                    <th>Sumber</th>
                    <th>Tujuan</th>
                    <th>Perihal</th>
                    <th>Tanggal Dibuat</th>
                    <th>Upload Date</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @if($jumlahsuratreview !== 0)
                    @foreach($surats as $surat)
                    <!-- kondisi if untuk menentukan surat yang statusnya review dan not archived -->
                      @if($surat->Status == 1 && $surat->archived_status == 1)
                        <tr>
                          <!-- <td><a href="{{ url('/document_detail/'. $surat->id) }}">{{$surat->id}}</a></td> -->
                          <td>{{$surat->no_surat}}</td>
                          <td>{{$surat->sumber_surat}}</td>
                          <td>{{$surat->tujuan_surat}}</td>
                          <td>{{$surat->perihal}}</td>
                          <td>{{$surat->tanggal_dibuat}}</td>
                          <td>{{$surat->created_at->format('d-m-Y') }}</td>
                          <!-- <td><span class="label label-warning">On Progress</span></td> -->
                          <td>
                            <a href="{{ url('/status/cancel/' . $surat->id) }}">
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

        <!-- On Progress Tab End -->

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
