@extends('layouts.majestic_dash')

@section('content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
          <h4 class="card-title">Surat Baru</h4>
                <div class="table-responsive">
                    <table class="table table-striped" style="text-align: center;">
                        <thead>
                          <tr>
                            <th>Nomor</th>
                            <th>Instansi</th>
                            <th>Bidang</th>
                            <th>Perihal</th>
                            <th>Tanggal Surat</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                        <!-- kondisi jika surat tidak ada di database -->
                        @if($jumlahsuratbaru !== 0 || $jumlahsurattinjau !== 0)
                          @foreach($surats as $surat)
                            <tr>
                                <td>{{str_limit($surat->no_surat, 11, '...')}}</td>
                                <td>{{str_limit($surat->instansi->nama_instansi, 21, '...')}}</td>
                                <td>{{$surat->sektor->nama_sektor}}</td>
                                <td>{{str_limit($surat->perihal_surat, 25, '...')}}</td>
                                <td>{{date('d M Y', strtotime($surat->tanggal_surat))}}</td>
                                <td>
                                  <!-- proses surat untuk di tinjau pimpinan -->
                                  <a href="{{ url('/surat/proses/' . $surat->id_surat) }}">
                                  <!-- <input onclick="change(); this.onclick=null;" id="proses" class="btn btn-danger" value="Proses"> -->
                                  @if($surat->status_surat == 'baru')
                                  <button type="button" class="btn btn-sm btn-primary btn-flat">Proses</button>
                                  @else
                                  <button type="button" class="btn btn-sm btn-dark btn-flat" disabled>Proses</button>
                                  @endif
                                  </a>

                                  <!-- melihat detail surat -->
                                  <a href="{{ url('/surat/detail/' . $surat->id_surat) }}">
                                  <button type="button" class="btn btn-sm btn-warning btn-flat">Rincian</button>
                                  </a>
                                  
                                  <button type="button" class="open-HapusModal btn btn-sm btn-danger btn-flat" data-toggle="modal" data-target="#modal-danger" data-id="{{ $surat->id_surat }}">Hapus</button>
                                </td>
                            </tr>
                          @endforeach
                        @else
                          <tr><td>Tidak ada surat masuk</td></tr>
                        @endif
                        </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

            <!-- Modal Hapus Surat Start -->
              <form action="{{ url('/surat/destroy/') }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <div class="modal modal-danger fade" id="modal-danger">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title"><b>Hapus</b> Surat</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                      </div>
                      <div class="modal-body">
                        <p>Apakah Anda yakin akan <b>Menghapus Permanen</b> Surat ini ?</p>
                        <small>Surat yang sudah dihapus <b>TIDAK DAPAT</b> dikembalikan.</small>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">Ya</button>
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Tidak</button>
                        <input type="hidden" name="id_surat" id="id_surat" value=""/>
                      </div>
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>
              </form>
            <!-- Modal End -->

@endsection