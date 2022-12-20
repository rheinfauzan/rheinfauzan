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
        
        {{-- <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <div class="row">
                    <div class="form-group col-3">
                      <label for="guru_filter">Angkatan</label>
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
        </div> --}}
        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <!-- BAR CHART -->
                <div class="card card-success">
                  <div class="card-header">
                    <h3 class="card-title">Bar Chart</h3>
    
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="chart">
                      <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
              <!-- /.col (RIGHT) -->
            </div>
            <!-- /.row -->
          </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->

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
                        <th width="50%" class="text-center">Angkatan</th>
                        <th width="45%" class="text-center">Jumlah Mahasiswa</th>
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
              <input type="date" id="angkatan" name="nama" class="form-control" placeholder="Tahun Angkatan" maxlength="4">
              <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-title"></div>
            </div>
        <div class="form-grub">
          <label for="jumlahMahasiswa">Jumlah Mahasiswa</label>
          <input type="text" id="jml_mahasiswa" name="jml_mahasiswa" class="form-control" placeholder="Jumlah Mahasiswa" maxlength="10">
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
    $(function() {
        let jml_mhs = $(this).data('jml_mhs');
        // Get context with jQuery - using jQuery's .get() method
        var areaChartData = {
          labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
          datasets: [
            {
              label               : 'Digital Goods',
              backgroundColor     : 'rgba(60,141,188,0.9)',
              borderColor         : 'rgba(60,141,188,0.8)',
              pointRadius          : false,
              pointColor          : '#3b8bba',
              pointStrokeColor    : 'rgba(60,141,188,1)',
              pointHighlightFill  : '#fff',
              pointHighlightStroke: 'rgba(60,141,188,1)',
              data                : {
                    'jml_mhs': jml_mhs,
              }
            },
            {
              label               : 'Electronics',
              backgroundColor     : 'rgba(210, 214, 222, 1)',
              borderColor         : 'rgba(210, 214, 222, 1)',
              pointRadius         : false,
              pointColor          : 'rgba(210, 214, 222, 1)',
              pointStrokeColor    : '#c1c7d1',
              pointHighlightFill  : '#fff',
              pointHighlightStroke: 'rgba(220,220,220,1)',
              data                : [65, 59, 80, 81, 56, 55, 40]
            },
          ]
        }


          //-------------
          //- BAR CHART -
          //-------------
          var barChartCanvas = $('#barChart').get(0).getContext('2d')
          var barChartData = $.extend(true, {}, areaChartData)
          var temp0 = areaChartData.datasets[0]
          var temp1 = areaChartData.datasets[1]
          barChartData.datasets[0] = temp1
          barChartData.datasets[1] = temp0

          var barChartOptions = {
            responsive              : true,
            maintainAspectRatio     : false,
            datasetFill             : false
          }

          new Chart(barChartCanvas, {
            type: 'bar',
            data: barChartData,
            options: barChartOptions
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

        

})
</script>
@endpush