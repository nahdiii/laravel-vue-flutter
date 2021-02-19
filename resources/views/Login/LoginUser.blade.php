<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Login</title>
    <link rel="shortcut icon" href="#" />
    <!-- Tell the browser to be responsive to screen width -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">


</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <div class="login-logo">

                <img src="#" width="60%">

            </div>
        </div>
        <!-- /.login-logo -->
        <div class="card" id="app">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Silahkan Login Dengan Memasukkan Email & Kata Sandi</p>

                <form action="{{route('postLogin')}}" method="post">
                    {{ csrf_field() }}
                    <div class="input-group mb-3">
                        <input type="mail" class="form-control" name="email" placeholder="Email" required autofocus>
                        <div class="input-group-append">
                            <span class="fa fa-envelope input-group-text"></span>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Kata Sandi" required
                            autofocus>
                        <div class="input-group-append">
                            <span class="fa fa-lock input-group-text"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="checkbox icheck">
                                <label>

                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit"
                                class="btn btn-primary btn-block btn-flat button-prevent-multiple-submits">
                                <i class="fas fa-sign-in-alt"></i> Masuk</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>



                <!--<p class="mb-1">
        <a href="#">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p>-->
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <script src="../js/app.js"></script>
</body>

</html>