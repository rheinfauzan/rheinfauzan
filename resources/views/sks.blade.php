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

               <table id="tabel-sks" class="table table-bordered table-striped" width="100%">
                  <thead>
                    <tr>
                      <th width="30%" class="text-center">SKS</th>
                      <th class="text-center">Mata Kuliah</th>
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
              <input type="text" id="tambahSks" name="nama" class="form-control" placeholder="SKS">
              <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-title"></div>
            </div>
        <div class="form-grub">
          <label for="namaMatkul">NIM</label>
          <input type="text" id="tambahMatkul" name="matkul" class="form-control" placeholder="Mata Kuliah">
          <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nim"></div>
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
                  { "data": "action" },                   
              ],
              "columnDefs": [
                { className: "text-center", "targets": [ 2 ] },
              ]
        });

        // Tambah data
        $("#simpanDataSks").click(function(e) {
            e.preventDefault();

            let tambahsks    = $("#tambahSks").val();
            let tambahmatkul = $("#tambahMatkul").val();
            let token        = $("meta[name='csrf-token']").attr("content");


            $.ajax({
                url: "/addsks",
                type: "POST",
                cache: false,
                data: {
                    "sks": tambahsks,
                    "nm_matkul": tambahmatkul,
                    "_token": token,
                },
                success:function(response){
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

                    //close modal
                    $('#tambahData').modal('hide');
                    // refresh page
                    sks.draw();
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
        $('body section table thead tr tb').on("click", ".edit", function() {
            let id = $(this).data('id');
        })
        // end show data dor edit

    }) // End Document //
</script>
@endpush