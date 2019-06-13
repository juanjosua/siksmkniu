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
        <small class="pull-right">Tanggal Disposisi : {{$disposisi->created_at->format('d-m-Y') }}</small>
      </h2>
    </div>
    <!-- /.col -->
  </div>

  <!-- info row -->
  <div class="row invoice-info">
    <!-- /.col Info Surat -->
    <div class="col-sm-3 invoice-col">
      Info Surat
      <br>
    <address>
      <strong>Nomor Surat :</strong> {{$surat->no_surat}}<br>
      <strong>Perihal Surat :</strong> {{$surat->tanggal_surat}}<br>
      <strong>Instansi :</strong> {{$surat->instansi->nama_instansi}}<br>
      <strong>Sektor :</strong> {{$surat->sektor->nama_sektor}}<br>
      <strong>Tanggal Surat :</strong> {{date('d M Y', strtotime($surat->tanggal_surat))}}<br>
    </address>
    </div>
    <!-- /.col -->
    <!-- /.col Info Disposisi -->
    <div class="col-sm-6 invoice-col">
      Info Disposisi
      <br>
    <address>
    <div style="display: none;">
      {{ $nama_pimpinan = $pimpinans->where('jabatanable_id', $disposisi->id_pimpinan) }}
      {{ $nama_staf = $stafs->where('jabatanable_id', $disposisi->id_staf) }}
    </div>
    @foreach($nama_pimpinan as $np)
      <strong>Pemberi Disposisi :</strong> {{$np->nama_pegawai}}<br>
    @endforeach
    @foreach($nama_staf as $ns)
      <strong>Penerima Disposisi :</strong> {{$ns->nama_pegawai}}<br>
    @endforeach
      <strong>Pesan Disposisi :</strong> {{$disposisi->pesan_disposisi}}<br>
    </address>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

  <hr>
  <!-- Download & Download Button -->
  <div class="row no-print">
    <div class="col-xs-12">

    <!-- tombol download -->
    <a href="{{ url('/disposisi') }}" class="btn btn-success pull-right"><i class="fa fa-arrow-left"></i>Kembali</a>
    </div>
  </div>

</section>
<!-- /.content -->
@endsection
