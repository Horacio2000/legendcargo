<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!--Favicon-->
        <link rel="shortcut icon" type="image/png" href="{{  asset('assets/frontend/images/favicon.png')}}" />
        <link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{asset('assets/admin/css/fontawesome-all.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/admin/css/bootadmin.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/admin/css/style.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <title>Admin | LegendCargo</title>
    </head>
    <body class="bg-info">
        <div class="container h-100">
            <div class="row h-100 justify-content-center align-items-center">
                <div class="col-md-5">
                    <div class="logo">
                        <a href="{{route('welcome')}}" class=""><img src="{{ asset('images/logo.png') }}" height="160" width="180" /></a>
                    </div>
                    <div class="card border border-success">
                        <div class="card-header text-white text-uppercase h4 bg-custom-background text-center">Admin | Connexion</div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.authenticate') }}">
                                @csrf
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                                    </div>
                                    <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Email" value="admin@legendecargo.com">
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-key"></i></span>
                                    </div>
                                    <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Mot de passe" value="password">
                                </div>
                                <div class="row">
                                    <div class="col pr-2">
                                        <button type="submit" class="btn btn-block btn-primary text-uppercase h4 font-weight-bold">Se connecter</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{asset('assets/admin/js/jquery.min.js')}}"></script>
        <script src="{{asset('assets/admin/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('assets/admin/js/bootadmin.min.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script>
        @if (Session::has('error'))
        toastr.error("{{ Session::get('error') }}");
        @endif
        @if (count($errors) > 0)
        @foreach($errors -> all() as $error)
        toastr.error("{{ $error }}");
        @endforeach
        @endif
        </script>
    </body>
</html>
