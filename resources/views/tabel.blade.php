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
              <li class="breadcrumb-item active">DataTables</li>
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
              <button class="btn btn-success btn-sm list-inline-item" type="button" data-toggle="modal" data-placement="top" data-target="#tambahData">Tambah</button>
               <table id="show" class="table table-bordered table-striped" width="100%">
                  <thead>
                    <tr>
                      <th width="30%" class="text-center">Nama</th>
                      <th width="20%" class="text-center">Kelas</th>
                      <th width="30" class="text-center">NIM</th>
                      <th width="20%" class="text-left">Action</th>
                    </tr>
                  </thead>
                  <tbody>
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
  {{-- Modal tambah --}}
  <div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
              <label for="namaSiswa">Nama</label>
              <input type="text" id="tambahNama" name="nama" class="form-control" placeholder="Nama" maxlength="25">
              <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-title"></div>
            </div>
          <div class="form-grub">
            <label for="namaSiswa">Kelas</label>
            <select name="kelas" id="tambahKelas" class="form-control" >
              <option selected>Kelas</option>
              <option value="11">11</option>
              <option value="12">12</option>
              <option value="13">13</option>
            </select>
          </div>
        <div class="form-grub">
          <label for="namaSiswa">NIM</label>
          <input type="text" id="tambahNim" name="nim" class="form-control" placeholder="NIM" maxlength="4">
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
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          {{-- form --}}
 
          <form>
            <input type="hidden" id="post_id">
            <div class="form-grub">
              <label for="namaSiswa">Nama</label>
              <input type="text" id="editNama" class="form-control" placeholder="Nama">
            </div>
          </form>
          <div class="form-grub">
            <label for="namaSiswa">Kelas</label>
            <select name="editkelas" id="editKelas" class="form-control" >
              <option value="11">11</option>
              <option value="12">12</option>
              <option value="13">13</option>
            </select>
          </div>
        </form>
        <div class="form-grub">
          <label for="namaSiswa">NIM</label>
          <input type="text" id="editNim" class="form-control" placeholder="Nama">
        </div>
      </form>
          {{-- .form --}}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="simpanPerubahan">Save changes</button>
        </div>
      </div>
    </div>
  </div>
{{-- end modal edit --}}
{{-- detail data --}}
@include('components.show')
{{-- end detail data --}}
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
    var t = $("#show").DataTable({
              "paging": true,
              "lengthChange": false,
              "searching": false,
              "ordering": true,
              "info": true,
              "autoWidth": true,
              "responsive": true,
              "processing": true,
              "serverSide": true,
              "pageLength": 5,
              "ajax": {url:"/gettabel"},
              "columns": [
                  { "data": "nama_kelas" },
                  { "data": "kelas" },
                  { "data": "nim_kelas" },
                  { "data": "action" },                   
              ],
              "columnDefs": [
                { className: "text-center", "targets": [ 3 ] },
              ]
    });


    //action create post
    $('#simpanData').click(function(e) {
        e.preventDefault();

        //define variable
        let nama   = $('#tambahNama').val();
        let kelas = $('#tambahKelas').val();
        let nim = $('#tambahNim').val();
        let token   = $("meta[name='csrf-token']").attr("content");
        
        //ajax
        $.ajax({

            url: `tabel`,
            type: "POST",
            cache: false,
            data: {
                "nama": nama,
                "kelas": kelas,
                "nim": nim,
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
                $('#tambahNama').val('');
                $('#tambahKelas').val('');
                $('#tambahNim').val('');

                //close modal
                $('#tambahData').modal('hide');
                t.draw();
            },
            

            error:function(error){

              if(error.responseJSON.nama[0]) {
                      //show alert
                      $('#alert-title').removeClass('d-none');
                      $('#alert-title').addClass('d-block');

                      //add message to alert
                      $('#alert-title').html(error.responseJSON.nama[0]);
                      } 
              
              if(error.responseJSON.nim[0]) {
                      //show alert
                      $('#alert-nim').removeClass('d-none');
                      $('#alert-nim').addClass('d-block');

                      //add message to alert
                      $('#alert-nim').html(error.responseJSON.nim[0]);
                      }
            }
        });

    });
    // end add

    // get data for edit
    $('body section table tbody').on('click', ".edit", function(){
      let post_id = $(this).data('id');


      $.ajax({
          url: `/show`,
          type: "GET",
          cache: false,
          data: {
            "id": post_id,
          },
          success:function(response){

              //fill data to form
              $('#post_id').val(response.data.id);
              $('#editNama').val(response.data.nama_kelas);
              $('#editKelas').val(response.data.kelas);
              $('#editNim').val(response.data.nim_kelas);
          },
      });
    })
    // end get data for edit

   //edit  post
   $('#simpanPerubahan').click(function(e) {
        e.preventDefault();

        //define variable
        let id = $('#post_id').val();
        let nama   = $('#editNama').val();
        let kelas = $('#editKelas').val();
        let nim = $('#editNim').val();
        let token   = $("meta[name='csrf-token']").attr("content");
        
        //ajax
        $.ajax({

            url: `update`,
            type: "POST",
            cache: false,
            data: {
                "id": id,
                "nama": nama,
                "kelas": kelas,
                "nim": nim,
                "_token": token,
            },
            success:function(response){
                // success update data
                Swal.fire({
                            type: 'success',
                            icon: 'success',
                            title: `${response.message}`,
                            showConfirmButton: true,
                            timer: 1500,
                });

                //clear form
                $('#editNama').val('');
                $('#editKelas').val('');
                $('#editNim').val('');

                //close modal
                $('#editData').modal('hide');
                t.draw();
            },
            

            error:function(error){

            }
        });

    });
    // end add

  // delete
  $('body section table tbody').on('click', '.delete', function(){
    let post_id = $(this).data('id');
    let token   = $("meta[name='csrf-token']").attr("content");

    Swal.fire({
      title: 'Apakah kamu yakin ?',
      text: 'ingin menghapus data ini!',
      icon: "warning",
      showCancelButton: true,
      cancelButtonText: 'TIDAK',
      confirmButtonText: 'YA!',
    }).then((result) => {
      if (result.isConfirmed){

        // fetch to delete
        $.ajax({
              url: `delete`,
              type: "POST",
              cache: false,
              data: {
                  "id": post_id,
                  "_token": token,
              },
                    success:function(response){
                        Swal.fire({
                          type: 'success',
                          icon: 'success',
                          title: `${response.message}`,
                          showConfirmButton: false,
                          timer: 1500,
                        });

                        //remove data from table
                        $(`#index_${post_id}`).remove();
                        t.draw();
                    },
          });
        }
      })
    // end delete
    })

    $('body section table tbody').on('click', ".show", function(){
      let post_id = $(this).data('id');


      $.ajax({
          url: `/show`,
          type: "GET",
          cache: false,
          data: {
            "id": post_id,
          },
          success:function(response){

              //fill data to form
              $('#post_id').val(response.data.id);
              $('#showNama').val(response.data.nama_kelas);
              $('#showKelas').val(response.data.kelas);
              $('#showNim').val(response.data.nim_kelas);
          },
      });
    })
})
</script>
@endpush