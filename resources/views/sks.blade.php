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
              <li class="breadcrumb-item"><a href="#">Kurikulum</a></li>
              <li class="breadcrumb-item active">SKS</li>
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

               <table id="tabel-sks" class="table table-bordered table-striped" width="100%">
                  <thead>
                    <tr>
                      <th width="30%" class="text-center">SKS</th>
                      <th class="text-center">Mata Kuliah</th>
                      <th width="20%" class="text-center">Bobot</th>
                      <th width="12%" class="text-left">Action</th>
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
                <label for="sks">SKS</label>
                <input type="text" id="tambahSks" name="sks" class="form-control" placeholder="SKS">
              </div>
              <div class="form-grub">
                <label for="namaMatkul">Mata Kuliah</label>
                <input type="text" id="tambahMatkul" name="nm_matkul" class="form-control" placeholder="Mata Kuliah">
              </div>
              <div class="form-grub">
                <label for="bobot">Bobot SKS</label>
                <input type="text" id="tambahBobot" name="bobot" class="form-control" placeholder="Bobot SKS">
              </div>
          </form>
          {{-- .form --}}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="simpanDataSks">Simpan</button>
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
            <form id="formEdit">
              <input type="hidden" id="id">
              <div class="form-grub">
                <label for="editsks">SKS</label>
                <input type="text" id="editSks" name="sks" class="form-control" placeholder="SKS">
              </div>
              <div class="form-grub">
                <label for="editNim">NIM</label>
                <input type="text" id="editMatkul" name="matkul" class="form-control" placeholder="Mata Kuliah">
              </div>
              <div class="form-grup">
                <label for="editBobot">Bobot SKS</label>
                <input type="text" name="bobot" id="editBobot" class="form-control" placeholder="Bobot SKS">
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

    $(document).ready(function() {
        var sks = $("#tabel-sks").DataTable({
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
              "ajax": {url:"/skstabel"},
              "columns": [
                  { "data": "sks" },
                  { "data": "nm_matkul" },
                  { "data": "bobot" },
                  { "data": "action" },                   
              ],
              "columnDefs": [
                { className: "text-center", "targets": [ 3 ] },
              ]
        });

        // Tambah data
        $("#simpanDataSks").click(function(e) {
            e.preventDefault();

            let tambahsks    = $("#tambahSks").val();
            let tambahmatkul = $("#tambahMatkul").val();
            let tambahbobot  = $("#tambahBobot").val();
            let token        = $("meta[name='csrf-token']").attr("content");

            let form = "#formTambah";


            $.ajax({
                url: "/addsks",
                type: "POST",
                cache: false,
                data: {
                    "sks": tambahsks,
                    "nm_matkul": tambahmatkul,
                    "bobot": tambahbobot,
                    "_token": token,
                },
                success:function(response){
                  if (response.status == false) {
                    
                        $(form+" .invalid-feedback").remove()
                        $(form+" input, "+form+"  select, "+form+" textbox").removeClass("is-invalid")
                        jQuery.each(response.data, function(i, val) {
                            $(form + ' [name="' + i + '"]').addClass('is-invalid').after('<div class="invalid-feedback">' + val + '</div>');
                        })
                        Swal.fire("Gagal!", response.message,"error"); 
                        sks.ajax.reload();

                  } else {
                    
                    Swal.fire({
                                type: 'success',
                                icon: 'success',
                                title: `${response.message}`,
                                showConfirmButton: true,
                                timer: 3000,
                    });

                    //clear form
                    $('#tambahSks').val('');
                    $('#tambahMatkul').val('');
                    $('#tambahBobot').val('');

                    //close modal
                    $('#tambahData').modal('hide');
                    // refresh page
                    sks.ajax.reload();

                  }
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
        // end Tambah data

        // Show data for edit
        $('body section table tbody').on("click", ".edit", function() {
            let id = $(this).data('id');

            $.ajax({
              url: "/getupdate",
              type: "GET",
              cache: false,
              data: {
                'id' : id,
              },
                success:function(response){
                      $('#id').val(response.data.id);
                      $('#editSks').val(response.data.sks);
                      $('#editMatkul').val(response.data.nm_matkul);
                      $('#editBobot').val(response.data.bobot);
                  },
            })
        })
        // end show data for edit

        // edit
        $('#simpanPerubahan').click(function(e) {
            e.preventDefault();

            //define variable
            let id = $('#id').val();
            let editsks   = $('#editSks').val();
            let editmatkul = $('#editMatkul').val();
            let editbobot = $('#editBobot').val();
            let token   = $("meta[name='csrf-token']").attr("content");

            let formedit = "#formEdit";
            
            //ajax
            $.ajax({

                url: `/updatedata`,
                type: "POST",
                cache: false,
                data: {
                    "id": id,
                    "sks": editsks,
                    "matkul": editmatkul,
                    "bobot": editbobot,
                    "_token": token,
                },
                success:function(response){

                    if (response.status == false) {

                        $(formedit+" .invalid-feedback").remove()
                        $(formedit+" input, "+formedit+"  select, "+formedit+" textbox").removeClass("is-invalid")
                        jQuery.each(response.data, function(i, val) {
                            $(formedit + ' [name="' + i + '"]').addClass('is-invalid').after('<div class="invalid-feedback">' + val + '</div>');
                        })
                        Swal.fire("Gagal!", response.message,"error"); 
                        sks.ajax.reload();

                    } else {
                        swal.fire({
                                    type: 'success',
                                    icon: 'success',
                                    title: `${response.message}`,
                                    showConfirmButton: true,
                                    timer: 1500,
                        });

                        // hide modal
                        $('#editData').modal('hide');
                        // refresh page
                        sks.ajax.reload();
                      }
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

        // soft delete
        $('body section table tbody').on('click', '.forceDelete', function() {
          let delete_id = $(this).data('id');
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
                            url: `forcedelete`,
                            type: "POST",
                            cache: false,
                            data: {
                                "id": delete_id,
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

                                // refresh web
                                sks.ajax.reload();
                            },
                        });
                      };
                    })
        })  
        // end soft delete

    }) // End Document //
</script>
@endpush