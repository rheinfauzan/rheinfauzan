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
              <input type="text" id="tambahNama" name="nama" class="form-control" placeholder="Nama">
            </div>
          <div class="form-grub">
            <label for="namaSiswa">Kelas</label>
            <input type="text" id="tambahKelas" name="kelas" class="form-control" placeholder="Kelas">
          </div>
        <div class="form-grub">
          <label for="namaSiswa">NIM</label>
          <input type="text" id="tambahNim" name="nim" class="form-control" placeholder="NIM">
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
            <input type="text" id="editKelas" class="form-control" placeholder="Siswa">
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

{{-- Modal hapus --}}
<div class="modal fade" id="hapusData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2>Apakah anda yakin?</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Hapus</button>
      </div>
    </div>
  </div>
</div>
{{-- end Modal hapus --}}
@endsection
@push('styles')
  <link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
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
                //clear form
                $('#tambahNama').val('');
                $('#tambahKelas').val('');
                $('#tambahNim').val('');

                //close modal
                $('#tambahData').modal('hide');
                t.draw();
            },
            

            error:function(error){
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

    // 
   //action create post
   $('#simpanPerubahan').click(function(e) {
        e.preventDefault();

        //define variable
        let nama   = $('#editNama').val();
        let kelas = $('#editKelas').val();
        let nim = $('#editNim').val();
        let token   = $("meta[name='csrf-token']").attr("content");
        
        //ajax
        $.ajax({

            url: `tabel`,
            type: "PATCH",
            cache: false,
            data: {
                "nama": nama,
                "kelas": kelas,
                "nim": nim,
                "_token": token,
            },
            success:function(response){
                //clear form
                $('#editNama').val('');
                $('#editKelas').val('');
                $('#editNim').val('');

                //close modal
                $('#simpanPerubahan').modal('hide');
                // .draw();
            },
            

            error:function(error){
            }
        });

    });
    // end add

})
</script>
@endpush