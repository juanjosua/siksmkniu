@extends(Session::get('data')->jabatan_pegawai == "staff" ? 'layouts.staff' : 'layouts.pimpinan')

@section('content')

<form action="{{ url('/surat/edit/update/' . $surat->surat_id) }}" method="POST">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    <div class="container">
      <div class="row">
      <div class="col-md-12">
        <div class="form-group">
        <div class="preview-zone">

          <!-- Document Description Form Start -->

          <h3>Detail Surat</h3>
          <br>
          <div class="form-group">
            <h4>Form Deskripsi Surat</h4>
            <label class="pull-left">No. Surat</label>
            <input type="text" name="no_surat" class="form-control" placeholder="no. surat" value="{{$surat->no_surat}}">
          </div>

          <div class="form-group">
            <label class="pull-left">Pengirim Surat</label>
            <input type="text" name="pengirim_surat" class="form-control" placeholder="sumber surat" value="{{$surat->pengirim_surat}}">
          </div>

          <div class="form-group">
            <label class="pull-left">Tujuan Surat</label>
            <input type="text" name="tujuan_surat" class="form-control" placeholder="tujuan surat" value="{{$surat->tujuan_surat}}">
          </div>

          <div class="form-group">
            <label class="pull-left">Perihal Surat</label>
            <input type="text" name="perihal_surat" class="form-control" placeholder="perihal surat" value="{{$surat->perihal_surat}}">
          </div>

          <div class="form-group">
            <label class="pull-left">Jenis Surat</label>
            <input class="form-control" name="jenis_surat" rows="5" placeholder="jenis surat" value="{{$surat->jenis_surat}}">
          </div>

           <div class="form-group">
            <label class="pull-left">Tanggal Pembuatan Surat</label>
            <input type="text" name="tanggal_pembuatan_surat" class="form-control" placeholder="tanggal pembuatan surat" value="{{$surat->tanggal_pembuatan_surat}}">
          </div>

          <!-- Document Description Form End -->

        </div>

        </div>
      </div>
      </div>
      <div class="row">
      <div class="col-md-12">
        <button type="submit" class="btn btn-primary center-block">Update</button>
      </div>
      </div>
    </div>
  </form>
@endsection
