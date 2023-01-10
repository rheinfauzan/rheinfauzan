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

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-6">
            {{-- jumlah mahasiswa --}}
            <div class="small-box bg-info">
              <div class="inner">
                <h3 id="jumlah-total">{{ json_encode($card_mhs) }}</h3>
                <p>Mahasiswa</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{ url('mahasiswa') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>  
          </div>
          <div class="col-lg-3 col-6">
            {{-- jumlah mahasiswa --}}
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $jmlgurus }}</h3>
                <p>Jumlah Dosen</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>  
          </div>
          <div class="col-lg-3 col-6">
            {{-- jumlah mahasiswa --}}
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>150</h3>
                <p>New Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>  
          </div>
          <div class="col-lg-3 col-6">
            {{-- jumlah mahasiswa --}}
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>150</h3>
                <p>New Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>  
          </div>
        </div>
      </div>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row"> 
          <div class="col-md-12">
            <!-- DONUT CHART -->
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Mahasiswa</h3>
                </div>
                <div class="card-body">
                  <canvas id="bar-chart"  height="100"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>
          </div>
        </div>
        <!-- /.col -->
    </section>
@endsection

@push('styles')
  <link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endpush

@push('scripts')
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <!-- ChartJS -->
  <script src="/plugins/chart.js/Chart.min.js"></script>
@endpush

@push('scripts')
  <script>
 // Bar chart
  new Chart(document.getElementById("bar-chart"), {
      type: 'bar',
      data: {
        labels: {{ json_encode($angkatan) }},
        datasets: [
          {
            label: "Jumlah Mahasiswa",
            backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
            data: {{ json_encode($jml_mhs) }}
          }
        ]
      },
      options: {
        legend: { display: false },
        title: {
          display: true,
          text: 'Jumlah Mahasiswa '
        }
      }
  });

  </script>
@endpush
