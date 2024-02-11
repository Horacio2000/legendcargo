@extends('staff.layouts.master')
@section('content')
<div class="content p-4">
    <h2 class="mb-4" style="text-transform: uppercase;">Profil</h2>
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('staff.profile') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row container-fluid">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="type" style="text-transform: uppercase;"><strong>Succursale</strong></label>
                            <input class="form-control form-control-lg mb-3" type="text" readonly="" value="{{ Auth::user()->branch->name }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="type" style="text-transform: uppercase;"><strong>Type</strong></label>
                            <input class="form-control form-control-lg mb-3" type="text" readonly="" value="{{ Auth::user()->role }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" style="text-transform: uppercase;"><strong>Nom</strong></label>
                            <input class="form-control form-control-lg mb-3" type="text" name="name" placeholder="Nom" value="{{ Auth::user()->name }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="firstname" style="text-transform: uppercase;"><strong>Prénom</strong></label>
                            <input class="form-control form-control-lg mb-3" type="text" name="firstname" placeholder="Prénom" value="{{ Auth::user()->firstname }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email" style="text-transform: uppercase;"><strong>Email</strong></label>
                            <input class="form-control form-control-lg mb-3" type="text" name="email" placeholder="Email" value="{{ Auth::user()->email }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone" style="text-transform: uppercase;"><strong>Téléphone</strong></label>
                            <input class="form-control form-control-lg mb-3" type="text" name="phone" placeholder="Téléphone" value="{{ Auth::user()->phone }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="image" style="text-transform: uppercase;"><strong>Image</strong></label>
                            <input class="form-control form-control-lg mb-3" type="file" name="image" >
                        </div>
                    </div>
                </div>
                <div class="col-md-12 offset-md-6 container-fluid">
                    <div class="form-group">
                        @if(Auth::user()->image)
                        <img style="width: 100px;height: 100px;" class="thumbnail img-responsive" src="{{asset('assets/staff/img/profile/'.Auth::user()->image)}}"/>
                        @else
                        <div class="col-md-3 bg-danger p-2">
                            <span class="text-white">
                                Aucune image fournie
                            </span>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary btn-block btn-lg">Modifier</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
