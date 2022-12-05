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
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables 2</li>
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
              <div class="card-header">
                <h3 class="card-title">Latihan</h3>
              </div>
               
              <!-- /.card-header -->
              <div class="card-body">
              <button class="btn btn-success btn-xs list-inline-item" type="button" data-toggle="modal" data-placement="top" data-target="#tambahDataGuru">Tambah</button>
               <table id="showGuru" class="table table-bordered table-striped" width="100%">
                  <thead>
                    <tr>

                      <th width="30%" class="text-center">Nama Guru</th>
                      <th width="20%" class="text-center">NIP Guru</th>
                      <th width="30" class="text-center">Jabatan</th>
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
  <div class="modal fade" id="tambahDataGuru" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
              <label for="namaGuru">Nama Guru</label>
              <input type="text" id="tambahGuru" name="nama" class="form-control" placeholder="Nama Guru" maxlength="25">
              <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nama"></div>
            </div>
            <div class="form-grub">
              <label for="nipGuru">NIP Guru</label>
              <input type="text" id="tambahNip" name="nip" class="form-control" placeholder="NIP Guru" maxlength="10">
              <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nip"></div>
            </div>
            <div class="form-grub">
              <label for="jabatan">Jabatan</label>
              <select name="nip" id="tambahJabatan" class="form-control" >
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
@endpush

@push('scripts')
<script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });

    // get 
    $(document).ready(function () {
    var data = $("#showGuru").DataTable({
              "paging": true,
              "lengthChange": false,
              "searching": false,
              "ordering": true,
              "info": true,
              "autoWidth": true,
              "responsive": true,
              "processing": true,
              "serverSide": true,
              "pageLength": 10,
              "ajax": {url:"gettabel2"},
              "columns": [       
                  { "data": "nama_guru" },
                  { "data": "nip_guru" },
                  { "data": "jabatan" },
                  { "data": "action" },                   
              ],
              "columnDefs": [
                { className: "text-center", "targets": [ 3 ] },
              ]
    });

    // add data //
    $('#simpanData').click(function(e) {
        e.preventDefault();

        //define variable
        let nama   = $('#tambahGuru').val();
        let nip = $('#tambahNip').val();
        let jabatan = $('#tambahJabatan').val();
        let token   = $("meta[name='csrf-token']").attr("content");
        
        //ajax
        $.ajax({

            url: `tabel2`,
            type: "POST",
            cache: false,
            data: {
                "nama": nama,
                "nip": nip,
                "jabatan": jabatan,
                "_token": token,
            },
            success:function(response){
              swal.fire({
                            type: 'success',
                            icon: 'success',
                            title: `${response.message}`,
                            showConfirmButton: true,
                            timer: 1500,
                });

                //clear form
                $('#tambahGuru').val('');
                $('#tambahNip').val('');
                $('#tambahJabatan').val('');

                //close modal
                $('#tambahDataGuru').modal('hide');
                // refresh page
                data.draw();
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
                      $('#alert-nip').removeClass('d-none');
                      $('#alert-nip').addClass('d-block');

                      //add message to alert
                      $('#alert-nip').html(error.responseJSON.nip[0]);
                      } 
            }
        });

    });
    // end add

    // edit
      // show edit
        $('body section table tbody').on('click', '.edit', function(){
          let id = $(this).data('id');

          $.ajax({
            url: `/getupdate`,
            type: 'GET',
            cache: false,
            data: {
              'id': id,
            },
              success:function(response){
                  $('#id').val(response.data.id);
                  $('#editNama').val(response.data.nama_guru);
                  $('#editNip').val(response.data.nip_guru);
                  $('#editJabatan').val(response.data.jabatan);
              },
          })
        })

      // update edit
      $('#simpanDataTerbaru').click(function(e) {
        e.preventDefault();

        //define variable
        let id = $('#id').val();
        let nama   = $('#editNama').val();
        let nip = $('#editNip').val();
        let jabatan = $('#editJabatan').val();
        let token   = $("meta[name='csrf-token']").attr("content");
        
        //ajax
        $.ajax({

            url: `updateData`,
            type: "POST",
            cache: false,
            data: {
                "id": id,
                "nama": nama,
                "nip": nip,
                "jabatan": jabatan,
                "_token": token,
            },
            success:function(response){
              swal.fire({
                            type: 'success',
                            icon: 'success',
                            title: `${response.message}`,
                            showConfirmButton: true,
                            timer: 1500,
                });

                //clear form
                $('#editNama').val('');
                $('#editNip').val('');
                $('#editJabatan').val('');

                // hide modal
                $('#editData').modal('hide');
                // refresh page
                data.draw();
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
                      $('#alert-nip').removeClass('d-none');
                      $('#alert-nip').addClass('d-block');

                      //add message to alert
                      $('#alert-nip').html(error.responseJSON.nip[0]);
                      } 
            }
        });

    });
    // end edit
})
</script>
@endpush