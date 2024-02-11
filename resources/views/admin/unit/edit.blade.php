@extends('admin.layouts.master')
@section('content')
<div class="content p-4">
    <h2 class="mb-4" style="text-transform: uppercase;">Modifier l'unité
        <a href="{{ route('unit.index') }}" class="btn btn-primary btn-md float-right">
            <i class="fa fa-list"></i>   Voir l'unité
        </a>
    </h2>
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('unit.update',$unit->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="col-md-12  container-fluid">
                    <div class="form-group">
                        <label for="name" style="text-transform: uppercase;"><strong>Nom&nbsp;<span class="mark">*</span></strong></label>
                        <input class="form-control form-control-lg mb-3" type="text" name="name" readonly="" value="{{ $unit->name ?? old('name') }}" placeholder="Nom de l'unité">
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="status" style="text-transform: uppercase;"><strong>Statut</strong></label>
                                <input type="checkbox" data-onstyle="success" data-offstyle="danger" data-width="100%" data-on="Actif" data-off="Inactif" data-toggle="toggle" name="status"  {{ $unit->status=='Active' ? 'checked' : '' }}>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary btn-block btn-lg">Modifier</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    $("#courierSetting").addClass("show");
    $("#courierSetting li:nth-child(1)").addClass("active");
</script>
@endsection
