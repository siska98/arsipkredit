
<!DOCTYPE html>
<html>
<head>
  <title>E-Arsip Kredit Bank BJB</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- CSRF Token -->
  <meta name="_token" content="2mA8sv4SerRnHJGME5UDYamw1GWDfy3FXzp2VzWq">
  
  <link rel="shortcut icon" href="{{ asset('/images/bjb.ico') }}">

  <!-- plugin css -->
  <link media="all" type="text/css" rel="stylesheet" href="https://demo.bootstrapdash.com/star-laravel-pro/template/assets/plugins/@mdi/font/css/materialdesignicons.min.css">
  <link media="all" type="text/css" rel="stylesheet" href="https://demo.bootstrapdash.com/star-laravel-pro/template/assets/plugins/perfect-scrollbar/perfect-scrollbar.css">
  <!-- end plugin css -->

  <!-- plugin css -->
    <!-- end plugin css -->

  <!-- common css -->
  <link media="all" type="text/css" rel="stylesheet" href="https://demo.bootstrapdash.com/star-laravel-pro/template/css/app.css">
  <!-- end common css -->

  </head>
<body data-base-url="https://demo.bootstrapdash.com/star-laravel-pro/template">

  <div class="container-scroller" id="app">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      
<div class="content-wrapper d-flex align-items-center justify-content-center auth theme-one" style="background-image: url({{ url('images/background.jpg') }}); background-size: cover;">
  <div class="row w-100">
    <div class="col-lg-4 mx-auto">
      <div class="auto-form-wrapper" style="opacity : 85%;">
      <div class="text-center">
          <img src="{{ url('images/bjblogo.svg') }}" alt="Logo" style="900px"; width="100">
          <div style="margin-top: 10px; font-size: 18px; font-weight: bold; color: #0072CE;">E-Arsip Kredit</div>
        </div>
        @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
        <form class="forms-sample" method="post" action="{{ route('login') }}">
        {{ csrf_field() }}
          <div class="form-group">
            <label class="label">Username</label>
            <div class="input-group">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
              <div class="input-group-append">
                <span class="input-group-text">
                </span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="label">Password</label>
            <div class="input-group">
            <input type="password" class="form-control" id="password" name="password" placeholder="*********">
              <div class="input-group-append">
                <span class="input-group-text">
                </span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <button class="btn btn-primary submit-btn btn-block">Login</button>
          </div>
            </form>
      </div>
      <ul class="auth-footer">
       
      </ul>
    </div>
  </div>
</div>

    </div>
  </div>

    <!-- base js -->
    <script src="https://demo.bootstrapdash.com/star-laravel-pro/template/js/app.js"></script>
    <!-- end base js -->

    <!-- plugin js -->
        <!-- end plugin js -->

    </body>
</html>