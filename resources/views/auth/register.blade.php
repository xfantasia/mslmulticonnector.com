
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MS-MultiConnector | Registration Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{!! url('assets/plugins/fontawesome-free/css/all.min.css'); !!}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{!! url('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css'); !!}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{!! url('assets/dist/css/adminlte.min.css'); !!}">
  <style>	  
    body  {
    background-image: url("assets/dist/img/backgroundx.jpg");
    background-color: #ffffff;
    background-size:     cover;                      /* <------ */
    background-repeat:   no-repeat;
    background-position: center center;
  }
  </style> 
</head>
<body class="hold-transition register-page">
<div class="register-box">

<div class="card">
  <div class="login-logo">
    <img src="{!! url('assets/dist/img/msl-logo2.png'); !!}" height="70px" />
    <a href="{!! url('assets/dist/img/msl-logo2.png'); !!}"><b><small>MicrowareSolutions</small> </b><br>MSL-Multi-Connector</a>
  </div>
</div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Customer Registration</p>

      <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="input-group mb-3">
            <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" placeholder="First Name" autofocus>

          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>

            @error('first_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>


        
        <div class="input-group mb-3">
            <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" placeholder="Last Name" autofocus>

          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
            @error('last_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>


        <div class="input-group mb-3">
            <input id="company_name" type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" value="{{ old('last_name') }}" required autocomplete="last_name" placeholder="Company Name" autofocus>
                
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-server"></span>
            </div>
          </div>
            @error('company_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>


        <div class="input-group mb-3">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Company Contact Email">

          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>




        <div class="input-group mb-3">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>


        <div class="input-group mb-3">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>


        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree" required>
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>

          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Register') }}
            </button>
          </div>
          <!-- /.col -->
        </div>



      </form>

        <hr>

      <a href="{{ route('login') }}" class="text-center">I already have an account</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="{!! url('assets/plugins/jquery/jquery.min.js'); !!}"></script>
<!-- Bootstrap 4 -->
<script src="{!! url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js'); !!}"></script>
<!-- AdminLTE App -->
<script src="{!! url('assets/dist/js/adminlte.min.js'); !!}"></script>
</body>
</html>
