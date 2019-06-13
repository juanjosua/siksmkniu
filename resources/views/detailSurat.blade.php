@extends(Session::get('data')->jabatanable_type == "App\Staf" ? 'layouts.staf' : 'layouts.pimpinan')

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
        <small class="pull-right">Tanggal Unggah : {{$surat->created_at->format('d-m-Y') }}</small>
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
        <strong>{{$surat->instansi->nama_instansi}}</strong><br>
      </address>
    </div>
    <!-- /.col -->
    <div class="col-sm-3 invoice-col">
      To Sektor
      <br>
      <address>
        <strong>{{$surat->sektor->nama_sektor}}</strong><br>
      </address>
    </div>
    <!-- /.col -->
    <div class="col-sm-3 invoice-col">
      Details
      <br>
      <address>
      <strong>Nomor Surat :</strong> {{$surat->no_surat}}<br>
      <strong>Tanggal Surat :</strong> {{$surat->tanggal_surat}}<br>
      <?php if ($surat->id_pimpinan == NULL): ?>
        @foreach($staf as $s)
        <strong>Pengunggah :</strong> {{$s->nama_pegawai}}<br>
        @endforeach
      <?php else: ?>
        @foreach($pimpinan as $p)
        <strong>Pengunggah :</strong> {{$p->nama_pegawai}}<br>
        @endforeach
      <?php endif ?>
    </address>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

  <hr>
  <!-- Download & Download Button -->
  <div class="row no-print">
    <div class="col-xs-12">

    <!-- user yang unggah -->
    @if($id_current_user == $surat->id_staf)
    <a href="{{ url('surat/edit/' . $surat->id_surat) }}" class="btn btn-warning pull-left"><i class="fa fa-edit"></i> Edit</a>
    <!-- pimpinan -->
    @elseif(Session::get('data')->jabatanable_type == 'App\Pimpinan')
    <a href="{{ url('surat/edit/' . $surat->id_surat) }}" class="btn btn-warning pull-left"><i class="fa fa-edit"></i> Edit</a>
    <!-- bukam ke2nya -->
    @else
    <a class="btn btn-dark pull-left" disabled="disabled"><i class="fa fa-edit"></i> Edit</a>
    @endif

    <!-- tombol download -->
    <a href="{{ url('surat/download/' . $surat->id_surat) }}" target="_blank" class="btn btn-success pull-right"><i class="fa fa-download"></i>Download</a>
    </div>
  </div>

</section>
<!-- /.content -->
@endsection
