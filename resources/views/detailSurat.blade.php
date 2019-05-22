@extends(Session::get('data')->jabatan_pegawai == "staff" ? 'layouts.staff' : 'layouts.pimpinan')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
</section>

<section class="invoice">

    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <i class="fa fa-file-text"></i> Gambar
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div style="clear: both;">
            <embed src="{{ asset('storage/' . $surat->image) }}" type="application/pdf" height="700px" width="500px">
          </div>
        </div>
      </div>
    </div>
</section>

<!-- Main content -->
<section class="invoice">

  <!-- title row -->
  <div class="row">
    <div class="col-xs-12">
      <h2 class="page-header">
        <i class="fa fa-file-text"></i> {{$surat->perihal_surat}}
        <small class="pull-right">Date: {{$surat->created_at->format('d-m-Y') }}</small>
      </h2>
    </div>
    <!-- /.col -->
  </div>

  <!-- info row -->
  <div class="row invoice-info">
    <div class="col-sm-3 invoice-col">
      From
      <br>
      <address>
        <strong>{{$surat->pengirim_surat}}</strong><br>
      </address>
    </div>
    <!-- /.col -->
    <div class="col-sm-3 invoice-col">
      To
      <br>
      <address>
        <strong>{{$surat->tujuan_surat}}</strong><br>
      </address>
    </div>
    <!-- /.col -->
    <div class="col-sm-3 invoice-col">
      Details
      <br>
      <address>
      <strong>Jenis:</strong> {{$surat->jenis_surat}}<br>
      <strong>Nomor Surat:</strong> {{$surat->no_surat}}<br>
      <strong>Tanggal Pembuatan:</strong> {{$surat->tanggal_pembuatan_surat}}<br>
      <strong>Pengunggah:</strong> {{$surat->pegawai->nama_pegawai}}<br>
    </address>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

  <hr>
  <!-- Download & Download Button -->
  <div class="row no-print">
    <div class="col-xs-12">
    <!-- untuk kondisi memunculkan button edit -->
    @if(Session::get('data')->jabatan_pegawai == "pimpinan" && $surat->status_surat == 1 || $surat->status_surat == 2)
    <a href="{{ url('surat/edit/' . $surat->surat_id) }}" class="btn btn-warning pull-left"><i class="fa fa-edit"></i> Edit</a>
    @elseif(Session::get('data')->jabatan_pegawai == "staff" && $surat->status_surat == 3)
    <a class="btn btn-warning pull-left" disabled="disabled"><i class="fa fa-edit"></i> Edit</a>
    @elseif(Session::get('data')->jabatan_pegawai == "pimpinan")
    <a href="{{ url('surat/edit/' . $surat->surat_id) }}" class="btn btn-warning pull-left"><i class="fa fa-edit"></i> Edit</a>
    @else
    <a class="btn btn-dark pull-left" disabled="disabled"><i class="fa fa-edit"></i> Edit</a>
    @endif
      <a href="#" target="_blank" class="btn btn-success pull-right"><i class="fa fa-download"></i> Download</a>
    </div>
  </div>

</section>
<!-- /.content -->
@endsection
