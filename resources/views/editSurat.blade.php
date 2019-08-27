@extends(Session::get('data')->jabatanable_type == "App\Staf" ? 'layouts.staf' : 
        (Session::get('data')->jabatanable_type == "App\Pimpinan" ? 'layouts.pimpinan' : 'layouts.admin'))

@section('content')

<form action="{{ url('/surat/edit/update/' . $surat->id_surat) }}" method="POST">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    <div class="container">
      <div class="row">
      <div class="col-md-12">
        <div class="form-group">
        <div class="preview-zone">

          <!-- Document Description Form Start -->

          <h3>Rincian Surat</h3>
          <br>

          <div class="form-group">
            <div class="row">
              @foreach($images as $image)
                <div>
                  <embed src="{{ asset('storage/' . $image->image) }}" type="application/pdf" height="500px" width="100%">
                </div>
              @endforeach
            </div>
          </div>

          <div class="form-group">
            <h4>Deskripsi Surat</h4>
            <label class="pull-left">No. Surat</label>
            <input type="text" name="no_surat" class="form-control" placeholder="{{$surat->no_surat}}" value="{{$surat->no_surat}}">
          </div>

          <div class="form-group">
            <label class="pull-left">Pengirim Surat</label>
            <input type="text" list="instansis" name="pengirim_surat" class="form-control" placeholder="{{$surat->instansi->nama_instansi}}" value="{{$surat->instansi->nama_instansi}}">
                <datalist id="instansis">
                    @foreach($instansis as $instansi)
                        <option>{{ $instansi->nama_instansi }}</option>
                    @endforeach
                </datalist>
          </div>

          <div class="form-group">
            <label class="pull-left">Perihal Surat</label>
            <input type="text" name="perihal_surat" class="form-control" placeholder="{{$surat->perihal_surat}}" value="{{$surat->perihal_surat}}">
          </div>

           <div class="form-group">
            <label class="pull-left">Tanggal Surat</label>
            <input type="date" name="tanggal_surat" class="form-control" placeholder="{{date('d M Y', strtotime($surat->tanggal_surat))}}" value="{{$surat->tanggal_surat}}">
          </div>

          <!-- Document Description Form End -->

        </div>

        </div>
      </div>
      </div>
      <div class="row">
      <div class="col-md-12" style="text-align: center;">
        <button type="submit" class="btn btn-primary">Perbarui</button>
        <a href="{{ url('/surat/detail/' . $surat->id_surat) }}" class="btn btn-primary">Kembali</a>
      </div>
      </div>
    </div>
  </form>
@endsection
