@extends('staff.layouts.master')
@section('content')
<div class="content p-4">
    <h2 class="mb-4" style="text-transform: uppercase;">Changer le mot de passe</h2>
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('staff.changepassword') }}" method="post">
                @csrf
                @method('PUT')
                <div class="col-md-12  container-fluid">
                    <div class="form-group">
                        <label for="oldword" style="text-transform: uppercase;"><strong>Mot de passe actuel</strong></label>
                        <input type="password" class="form-control form-control-lg mb-3"  id="oldword" name="oldword" placeholder="Mot de passe actuel">
                    </div>
                </div>
                <div class="col-md-12  container-fluid">
                    <div class="form-group">
                        <label for="newword" class="text-uppercase"><strong>Nouveau Mot de passe</strong></label>
                        <input type="password" class="form-control form-control-lg mb-3" id="newword" name="newword" placeholder="Nouveau Mot de passe">
                    </div>
                </div>
                <div class="col-md-12  container-fluid">
                    <div class="form-group">
                        <label for="newword_confirmation" class="text-uppercase"><strong>Confirmer le Mot de passe</strong></label>
                        <input type="password" class="form-control form-control-lg mb-3"  id="newword_confirmation" name="newword_confirmation" placeholder="Confirmer le Mot de passe">
                    </div>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary btn-block btn-lg text-uppercase">Modifier</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
