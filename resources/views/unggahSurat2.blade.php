@extends('layouts.majestic_dash')

@section('content')

<div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Unggah Surat</h4>
                  <p class="card-description">
                    Form Unggah Surat
                  </p>
                  <form class="forms-sample" action="{{ url('/unggah/baru') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label>PDF Surat</label>

                        <div>
                          <input id="uploadPDF" type="file" name="image" onclick="timeFunction();"/>
                        </div>
                        <br>
                        <div id="prevButton" style="display: none;" >
                          <input class="btn btn-sm btn-primary" type="button" value="Preview" name="image" onclick="PreviewImage();" />

                          <div id="preview" style="clear:both; display: none;">
                             <iframe target="_blank" id="viewer" frameborder="0" scrolling="no" width="100%" height="600"></iframe>
                          </div>
                        </div>

                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Nomor</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="no_surat" placeholder="No. Surat">
                    </div>
                    <div class="form-group">
                      <label>Instansi</label>
                      <input type="text" list="instansis" name="pengirim_surat" class="form-control" placeholder="Masukkan nama instansi pengirim" />
                        <datalist id="instansis">
                          @foreach($instansis as $instansi)
                            <option>{{ $instansi->nama_instansi }}</option>
                          @endforeach
                        </datalist>
                    </div>
                    <div class="form-group">
                      <label>Bidang</label>
                      <!-- <input type="text" list="sektors" name="tujuan_surat" class="form-control" placeholder="Masukkan nama sektor" /> -->
                        <!-- <datalist id="sektors"> -->
                          @foreach($sektors as $sektor)
                            <!-- <option>{{ $sektor->nama_sektor }}</option> -->
                            <!-- <input type="checkbox" name="tujuan_surat" value="{{ $sektor->nama_sektor }}">{{ $sektor->nama_sektor }} -->
                            <div class="form-check form-check-primary">
                              <label class="form-check-label">
                                <input name="tujuan_surat" type="checkbox" class="form-check-input" value="{{ $sektor->nama_sektor }}">
                                {{ $sektor->nama_sektor }}
                              </label>
                            </div>
                          @endforeach
                        <!-- </datalist> -->
                    </div>
                    <div class="form-group">
                      <label for="exampleSelectGender">Perihal</label>
                        <input type="text" class="form-control" id="exampleSelectGender" name="perihal_surat" placeholder="Perihal">
                      </div>
                    <div class="form-group">
                      <label for="exampleInputCity1">Tanggal Surat</label>
                      <input type="date" class="form-control" id="exampleInputCity1" name="tanggal_surat" placeholder="dd/mm/yyyy">
                    </div>

                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>

@endsection