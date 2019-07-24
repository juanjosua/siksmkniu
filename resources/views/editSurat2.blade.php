@extends('layouts.majestic_dash')

@section('content')

<div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Ubah Surat</h4>
                  <p class="card-description">
                    Form ubah surat
                  </p>
                  <form class="forms-sample">
                    <div class="form-group">
                      <label for="exampleInputName1">Nomor</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="no_surat" placeholder="No. Surat" value="{{$surat->no_surat}}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Instansi</label>
                      <input type="text" class="form-control" id="exampleInputEmail3" name="pengirim_surat" placeholder="Instansi Pengirim" value="{{$surat->instansi->nama_instansi}}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">Bidang</label>
                      <input type="text" class="form-control" id="exampleInputPassword4" name="tujuan_surat" placeholder="Bidang" value="{{$surat->sektor->nama_sektor}}">
                    </div>
                    <div class="form-group">
                      <label for="exampleSelectGender">Perihal</label>
                        <input type="text" class="form-control" id="exampleSelectGender" name="perihal_surat" placeholder="Perihal" value="{{$surat->perihal_surat}}">
                      </div>
                    <div class="form-group">
                      <label for="exampleInputCity1">Tanggal Surat</label>
                      <input type="date" class="form-control" id="exampleInputCity1" name="tanggal_surat" placeholder="dd/mm/yyyy" value="{{date('d M Y', strtotime($surat->tanggal_surat))}}">
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>

@endsection