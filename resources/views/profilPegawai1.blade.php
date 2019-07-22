@extends('layouts.majestic_dash')

@section('content')

<div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Profil</h4>
                  <p class="card-description">
                    Profil
                  </p>
                  <form class="forms-sample">
                    <div class="form-group">
                      <label>Foto</label>
                      <input type="file" name="image" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Unggah</button>
                        </span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Nama lengkap</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="nama_pegawai" placeholder="No. Surat" value="{{Session::get('data')->nama_pegawai}}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">NIP</label>
                      <input type="text" class="form-control" id="exampleInputEmail3" name="nip" placeholder="Instansi Pengirim" value="{{Session::get('data')->nip}}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">Email</label>
                      <input type="text" class="form-control" id="exampleInputPassword4" name="email_pegawai" placeholder="Bidang" value="{{Session::get('data')->email_pegawai}}">
                    </div>
                    <div class="form-group">
                      <label for="exampleSelectGender">No. Telepon</label>
                        <input type="text" class="form-control" id="exampleSelectGender" name="no_telp_pegawai" placeholder="Perihal" value="{{Session::get('data')->no_telp_pegawai}}">
                      </div>
                    <div class="form-group">
                      <label for="exampleInputCity1">Sektor</label>
                      <input type="date" class="form-control" id="exampleInputCity1" name="sektor_pegawai" placeholder="Sektor" value="">
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>

@endsection
