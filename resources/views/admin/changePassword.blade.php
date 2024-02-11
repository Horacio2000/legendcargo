@extends('admin.layouts.master')
@section('content')
<div class="content p-4">
    <h2 class="mb-4" style="text-transform: uppercase;">Modifier le mot de passe</h2>
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ url('admin/changePassword') }}" method="post">
                @csrf
                @method('PUT')
                <div class="col-md-12  container-fluid">
                    <div class="form-group">
                        <label for="oldword" style="text-transform: uppercase;"><strong>Mot de passe actuel</strong></label>
                        <input type="password" class="form-control form-control-lg mb-3"  id="oldword" name="oldword" placeholder="Entrer le mot de passe actuel">
                    </div>
                </div>
                <div class="col-md-12  container-fluid">
                    <div class="form-group">
                        <label for="newword" class="text-uppercase"><strong>Nouveau mot de passe</strong></label>
                        <input type="password" class="form-control form-control-lg mb-3" id="newword" name="newword" placeholder="Nouveau mot de passe">
                    </div>
                </div>
                <div class="col-md-12  container-fluid">
                    <div class="form-group">
                        <label for="newword_confirmation" class="text-uppercase"><strong>Confirmer le mot de passe</strong></label>
                        <input type="password" class="form-control form-control-lg mb-3"  id="newword_confirmation" name="newword_confirmation" placeholder="Confirmer le mot de passe">
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
