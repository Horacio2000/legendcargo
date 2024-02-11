<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!--Favicon-->
        <link rel="shortcut icon" type="image/png" href="{{  asset('images/favicon.jpg')}}" />
        <link rel="stylesheet" href="{{asset('assets/admin/css/morris.css')}}">
        <link rel="stylesheet" href="{{asset('assets/user/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/user/css/fontawesome-all.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/user/css/bootadmin.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/user/css/bootstrap-toggle.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/user/css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/user/css/owl.theme.default.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/user/css/datatables.min.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <link rel="stylesheet" href="{{asset('assets/user/css/custom.css')}}">
        <script src="{{asset('assets/user/js/jquery.min.js')}}"></script>
        <script src="{{asset('assets/user/js/nicEdit.js')}}"></script>
        <script src="{{asset('assets/user/js/bootstrap-toggle.min.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script src="{{asset('assets/user/js/datatables.min.js')}}"></script>
        <script src="{{asset('assets/admin/js/morris.min.js')}}"></script>
        <script src="{{asset('assets/admin/js/raphael.min.js')}}"></script>
        <title>{{ $gs->title }}</title>
    </head>
    <body class="bg-light" id="test">
        <nav class="navbar navbar-expand navbar-dark bg-custom-background">
            <a class="sidebar-toggle mr-3" href="#"><i class="fa fa-bars"></i></a>
            <a class="navbar-brand" href="#">Panneau du Gestionnaire</a>

            <div class="navbar-collapse collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a href="#" id="dd_user" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>&nbsp; {{ Auth::user()->name }}</a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd_user">
                            <a href="{{ route('manager.profile') }}" class="dropdown-item"><i class="fa fa-user"></i> Profil</a>
                            <a href="{{ route('manager.changepassword') }}" class="dropdown-item"><i class="fa fa-cog"></i> Modifier le Mot de Passe</a>
                            <a href="#"  class="dropdown-item"onclick="event.preventDefault();
    document.getElementById('logout-form').submit();"><i class="fa fa-angle-left"></i> Se déconnecter</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
