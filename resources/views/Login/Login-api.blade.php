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
            <login-api></login-api>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <script src="{{asset('js/app.js')}}"></script>
</body>

</html>