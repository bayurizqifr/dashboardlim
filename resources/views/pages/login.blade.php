<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Fiber Academy</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="/admin-assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="/admin-assets/vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="/admin-assets/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="/images/thumbnail.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            @if (session('gagal-masuk'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {!! session('gagal-masuk') !!}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="auth-form-light text-center py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="/images/logo.png" alt="logo">
              </div>
              <h4>Sign in User</h4>
              {{-- <h6 class="font-weight-light">Sign in to continue.</h6> --}}
              <form action="" method="post" class="pt-3">
                @csrf
                <div class="form-group">
                  <input type="text" name="username" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username">
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="/upload">SIGN IN</button>
                </div>
                <p class="mt-4 mb-0">Go to <a href="/home">home</a></p>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="/admin-assets/vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="/admin-assets/js/off-canvas.js"></script>
  <script src="/admin-assets/js/hoverable-collapse.js"></script>
  <script src="/admin-assets/js/template.js"></script>
  <!-- endinject -->
</body>

</html>
