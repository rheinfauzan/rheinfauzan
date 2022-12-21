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
          <div class="col-md-12">
            <!-- DONUT CHART -->
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Donut Chart</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>
          </div>
        </div>
        <!-- /.col -->
    </section>

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
                <button class="btn btn-success btn-xs list-inline-item" type="button" data-toggle="modal" data-placement="top" data-target="#tambahDataMahasiswa">Tambah</button>
                <table id="tbmahasiswa" class="table table-bordered table-striped" width="100%">
                    <thead>
                      <tr>
                        <th width="40%" class="text-center">Angkatan</th>
                        <th width="40%" class="text-center">Jumlah Mahasiswa</th>
                        <th width="7%" class="text-center">Aksi</th>
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
  {{-- Modal tambah --}}
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
              <label for="tahunAngkatan">Tahun Angkatan</label>
              <input type="text" id="angkatanAdd" name="nama" class="form-control" placeholder="Tahun Angkatan" maxlength="4">
              <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-title"></div>
            </div>
        <div class="form-grub">
          <label for="jumlahMahasiswa">Jumlah Mahasiswa</label>
          <input type="text" id="jml_mhsAdd" name="jml_mahasiswa" class="form-control" placeholder="Jumlah Mahasiswa" maxlength="10">
          <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-jml_mhs"></div>
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
  <!-- ChartJS -->
  <script src="/plugins/chart.js/Chart.min.js"></script>
@endpush

@push('scripts')
    <script>
  $(function () {
    var areaChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines : {
            display : false,
          }
        }]
      }
    }



    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: {{ $angkatan }},
      datasets: [
        {
          data: {{ $jml_mhs }},
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })
   })
  </script>
@endpush

@push('scripts')
<script>
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $(document).ready(function() {
        var mahasiswa = $("#tbmahasiswa").DataTable({
                  "paging": false,
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
                      { "data": "angkatan" },
                      { "data": "jml_mhs" },
                      { "data": "aksi"},
                  ],
                  "columnDefs": [
                    { className: "text-center", "targets": [ 0, 1, 2] },
                  ]
        });


            //action create post
    $('#simpanData').click(function(e) {
        e.preventDefault();

        //define variable
        let angkatan   = $('#angkatanAdd').val();
        let jml_mhs = $('#jml_mhsAdd').val();
        let token   = $("meta[name='csrf-token']").attr("content");
        
        //ajax
        $.ajax({

            url: `store`,
            type: "POST",
            cache: false,
            data: {
                "angkatan": angkatan,
                "jml_mhs": jml_mhs,
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
                $('#angkatanAdd').val('');
                $('#jml_mhsAdd').val('');

                //close modal
                $('#tambahDataMahasiswa').modal('hide');
                mahasiswa.draw();
            },
            

            error:function(error){

              if(error.responseJSON.angkatan[0]) {
                      //show alert
                      $('#alert-title').removeClass('d-none');
                      $('#alert-title').addClass('d-block');

                      //add message to alert
                      $('#alert-title').html(error.responseJSON.angkatan[0]);
                      } 
              
              if(error.responseJSON.jml_mhs[0]) {
                      //show alert
                      $('#alert-jml_mhs').removeClass('d-none');
                      $('#alert-jml_mhs').addClass('d-block');

                      //add message to alert
                      $('#alert-jml_mhs').html(error.responseJSON.jml_mhs[0]);
                      }
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
                url: `/delete`,
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
                          mahasiswa.ajax.reload();
                      },
            });
          }
        })
      })
      // end delete
        

})
</script>
@endpush