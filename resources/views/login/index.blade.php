<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Login Tabel</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/dist/css/adminlte.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="" class="h1"><b>Admin</b>LTE</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form>
        @csrf 
        <div class="input-group mb-3">
          <input id="emailLogin" type="email" class="form-control" placeholder="Email" autofocus>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input id="passwordLogin" type="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button id="userLogin" type="button" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      {{-- <div class="social-auth-links text-center mt-2 mb-3">
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div> --}}
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="{{ url('forgotpassword') }}">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="{{ url('register') }}" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/adminlte.min.js"></script>
<!-- SweetAlert2 -->
<script src="/plugins/sweetalert2/sweetalert2.min.js"></script>

<script>
  $(document).ready(function() {
    $("#userLogin").click(function() {
      var email = $("#emailLogin").val();
      var password = $('#passwordLogin').val();
      var token = $("meta[name='csrf-token']").attr("content");

      if(email.length == "") {

              Swal.fire({
                  type: 'warning',
                  title: 'Oops...',
                  text: 'Alamat Email Wajib Diisi !'
              });

      } else if(password.length == "") {

              Swal.fire({
                  type: 'warning',
                  title: 'Oops...',
                  text: 'Password Wajib Diisi !'
              });

      } else {

              $.ajax({

                    url: '/login-check',
                    type: 'POST',
                    dataType: 'json',
                    cache: false,
                    data: {
                      "email": email,
                      "password": password,
                      "_token": token
                    },

                    success:function(response){

                            if (response.success) {

                                Swal.fire({
                                    type: 'success',
                                    icon: 'success',
                                    title: 'Login Berhasil!',
                                    timer: 3000,
                                    showCancelButton: false,
                                    showConfirmButton: false
                                })
                                    .then (function() {
                                        window.location.href = "{{ url('profile') }}";
                                    });

                            } else {

                                console.log(response.success);

                                Swal.fire({
                                    type: 'error',
                                    title: 'Login Gagal!',
                                    text: 'silahkan coba lagi!'
                                });

                            }

                            console.log(response);

                            },

                    error:function(response){

                    Swal.fire({
                        type: 'error',
                        icon: 'error',
                        title: 'Opps!',
                        text: 'server error!'
                    });

                    console.log(response);

                    }


              })
      }

    })
  })
</script>
</body>
</html>
