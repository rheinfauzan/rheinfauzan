@extends('master')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('profile') }}">Home</a></li>
              <li class="breadcrumb-item active">Mahasiswa</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <div class="row">
                    <div class="form-group col-3">
                      <label for="guru_filter">Nama</label>
                      <input type="text" name="guru_filter" class="form-control" id="guru_filter">
                    </div>
                    <div class="form-group col-3">
                      <label for="nip_filter">NIP</label>
                      <input type="text" name="nip_filter" class="form-control" id="nip_filter">
                    </div>
                    <div class="form-group col-3">
                      <label for="jabatan_filter">Jabatan</label>
                      <select name="jabatan_filter" id="jabatan_filter" class="form-control" class="form-control" >
                        <option value=""></option>
                        <option value="Kepala Sekolah">Kepala Sekolah</option>
                        <option value="Guru">Guru</option>
                        <option value="Staff">Staff</option>
                      </select> 
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Latihan</h3>
              </div>
               
              <!-- /.card-header -->
              <div class="card-body">
                <button class="btn btn-success btn-xs list-inline-item" type="button" data-toggle="modal" data-placement="top" data-target="#tambahDataMahasiswa">Tambah</button>
                <table id="tbmahasiswa" class="table table-bordered table-striped" width="100%">
                    <thead>
                      <tr>
                        <th width="30%" class="text-center">Nama Mahasiswa</th>
                        <th width="20%" class="text-center">NIM Mahasiswa</th>
                        <th width="20%" class="text-left">Action</th>
                      </tr>
                    </thead>
                    <tbody id="delete">
                    </tbody>
                  </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  {{-- modal tambah --}}
  <div class="modal fade" id="tambahDataMahasiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          {{-- form --}}
          <form id="formTambah">
            <div class="form-grub">
              <label for="namaMahasiswa">Nama Mahasiswa</label>
              <input type="text" id="tambahMahasiswa" name="nama" class="form-control" placeholder="Nama Mahasiswa" maxlength="25">
              <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nama"></div>
            </div>
            <div class="form-grub">
              <label for="nimMahasiswa">NIM Mahasiswa</label>
              <input type="text" id="tambahNim" name="nip" class="form-control" placeholder="NIM Mahasiswa" maxlength="10">
              <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nim"></div>
            </div>
          </form>
          {{-- .form --}}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="simpanData">Simpan</button>
        </div>
      </div>
    </div>
  </div>
  {{-- end Modal tambah --}}

  {{-- Modal edit --}}
  <div class="modal fade" id="editData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          {{-- form --}}
 
          <form>
            <input type="hidden" id="id">
            <div class="form-grub">
              <label for="editNama">Nama</label>
              <input type="text" id="editNama" class="form-control" placeholder="Nama">
            </div>
            <div class="form-grub">
              <label for="nipGuru">NIP Guru</label>
              <input type="text" id="editNip" name="nip" class="form-control" placeholder="NIP Guru" maxlength="10">
              <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nip"></div>
            </div>
            <div class="form-grub">
              <label for="jabatan">Jabatan</label>
              <select name="nip" id="editJabatan" class="form-control" >
                <option value="Kepala Sekolah">Kepala Sekolah</option>
                <option value="Guru">Guru</option>
                <option value="Staff">Staff</option>
              </select>
              <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-jabatan"></div>
            </div>
          </form>
          {{-- .form --}}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="simpanDataTerbaru">Save changes</button>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('styles')
  <link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
@endpush

@push('scripts')
  <script src="/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="/plugins/jszip/jszip.min.js"></script>
  <script src="/plugins/pdfmake/pdfmake.min.js"></script>
  <script src="/plugins/pdfmake/vfs_fonts.js"></script>
  <script src="/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="/plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <script src="/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <!-- SweetAlert2 -->
  <script src="/plugins/sweetalert2/sweetalert2.min.js"></script>
  {{-- Input mask --}}
  <script src="/plugins/inputmask/jquery.inputmask.js"></script>
  <script src="/plugins/inputmask/inputmask.js"></script>
@endpush

@push('scripts')
<script>
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $(document).ready(function() {
        $('#tambahNim').inputmask({
          'mask': '9',
          'repeat': 10,
          'greedy': false,
        });

        var mahasiswa = $("#tbmahasiswa").DataTable({
                  "paging": true,
                  "lengthChange": true,
                  "searching": false,
                  "ordering": true,
                  "info": true,
                  "autoWidth": true,
                  "responsive": true,
                  "processing": true,
                  "serverSide": true,
                  "pageLength": 10,
                  "ajax": {
                      url:"/get" 
                      },
                  "columns": [       
                      { "data": "nama_mhs" },
                      { "data": "nim_mhs" },
                      { "data": "action" },                   
                  ],
                  "columnDefs": [
                    { className: "text-center", "targets": [ 2 ] },
                  ]
        });


        $('#simpanData').on('click', function(e) {

          let nama = $('#tambahMahasiswa').val();
          let nim   = $('#tambahNim').val();
          let token   = $("meta[name='csrf-token']").attr("content");

          $.ajax({
            url: '/store',
            type: "POST",
            cache: false,
                data: {
                    "nama_mhs": nama,
                    "nim_mhs": nim,
                    "_token": token,
                },
                success:function(response){
                  Swal.fire({
                                type: 'success',
                                icon: 'success',
                                title: `${response.message}`,
                                showConfirmButton: true,
                                timer: 1000,
                    });

                    //clear form
                    $('#tambahMahasiswa').val('');
                    $('#tambahNim').val('');

                    //close modal
                    $('#tambahDataMahasiswa').modal('hide');
                    // refresh page
                    mahasiswa.ajax.reload();
                },
                

                error:function(error){

                  if(error.responseJSON.nama[0]) {
                          //show alert
                          $('#alert-nama').removeClass('d-none');
                          $('#alert-nama').addClass('d-block');

                          //add message to alert
                          $('#alert-nama').html(error.responseJSON.nama[0]);
                          }

                  if(error.responseJSON.nip[0]) {
                          //show alert
                          $('#alert-nim').removeClass('d-none');
                          $('#alert-nim').addClass('d-block');

                          //add message to alert
                          $('#alert-nim').html(error.responseJSON.nim[0]);
                          } 
                }
            });
          })


})
</script>
@endpush