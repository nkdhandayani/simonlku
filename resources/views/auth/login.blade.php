<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/formLogin.css">
    <link rel="icon" type="img/png" href="../../assets/images/Logo Dinas Pariwisata.png">
    <!-- Toast css -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <title>Login | Dinas Pariwisata Provinsi Bali</title>
</head>

<body>
    
<div class="container-fluid">
    <div class="row no-gutter">
        <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
            <div class="col-md-8 col-lg-6">
                <div class="login d-flex align-items-center py-5">
                    <div class="container">
                      <div class="row">
                        <div class="col-md-9 col-lg-8 mx-auto">
                            <h2 class="login-heading mb-4 logo-dinas" style="padding-top: 140px">SISTEM INFORMASI MONITORING LKU BIRO PERJALANAN WISATA</h2>
                           
                                <form action="/postlogin" method="POST">
                                @csrf
                                    <div class="form-label-group">
                                        <input type="text" name="username" id="inputUsername" class="form-control" placeholder="Username" required autofocus>
                                        <label for="inputUsername">Username</label>
                                    </div>

                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    <div class="form-label-group">
                                        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
                                        <label for="inputPassword">Password</label>
                                    </div>

                                    <div class="form-label-group">
                                        <select class="form-control" name="login_as" id="inputLoginAs" style="border-radius: 2rem;" required>
                                            <option value="">-- Login As --</option>
                                            <option value="jasa_pariwisata">Jasa Pariwisata</option>
                                            <option value="biro_perjalanan_wisata">Biro Perjalanan Wisata</option>
                                        </select>
                                    </div>

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">Remember password</label>
                                    </div>
                                    
                                    <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Log In</button>
                                </form>                       
                        </div>
                    </div>
                </div>
            </div>
        
    </div>
</div>
<!-- Toast js -->
<script src="{{url('adminLTE/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" type="text/javascript"></script>

<script>
  @if(session()->has('error'))
    toastr.error('{{ session()->get('error') }}');
  @endif
</script>
</body>
</html>