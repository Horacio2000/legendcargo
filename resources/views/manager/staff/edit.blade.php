@extends('manager.layouts.master')
@section('content')
<div class="content p-4">
    <h2 class="mb-4" style="text-transform: uppercase;">Modifier le personnel de la succursale
        <a href="{{ route('branchstaff.index') }}" class="btn btn-primary btn-md float-right">
            <i class="fa fa-list"></i>   Voir le personnel de la succursale
        </a>
    </h2>
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('branchstaff.update',$branchstaff->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12  container-fluid">
                        <div class="form-group">
                            <label for="name" style="text-transform: uppercase;"><strong>Nom&nbsp;<span class="mark">*</span></strong></label>
                            <input class="form-control form-control-lg mb-3" type="text" name="name"  value="{{ $branchstaff->name ?? old('name') }}" placeholder="Nom">
                        </div>
                    </div>
                    <div class="col-md-12  container-fluid">
                        <div class="form-group">
                            <label for="firstname" style="text-transform: uppercase;"><strong>Prénom&nbsp;<span class="mark">*</span></strong></label>
                            <input class="form-control form-control-lg mb-3" type="text" name="firstname"  value="{{ $branchstaff->name ?? old('firstname') }}" placeholder="Prénom">
                        </div>
                    </div>
                    <div class="col-md-12 container-fluid">
                        <div class="form-group">
                            <label for="email" style="text-transform: uppercase;"><strong>Email&nbsp;<span class="mark">*</span></strong></label>
                            <input class="form-control form-control-lg mb-3" type="email" name="email"  value="{{ $branchstaff->email ?? old('email') }}" placeholder="Email">
                        </div>
                    </div>
                    <div class="col-md-12 container-fluid">
                        <div class="form-group">
                            <label for="phone" style="text-transform: uppercase;"><strong>Téléphone</strong></label>
                            <input class="form-control form-control-lg mb-3" type="text" name="phone"  value="{{ $branchstaff->phone ?? old('phone') }}" placeholder="Téléphone">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="status" style="text-transform: uppercase;"><strong>Statut</strong></label>
                            <input type="checkbox" data-onstyle="success" data-offstyle="danger" data-width="100%" data-on="Actif" data-off="Inactif" data-toggle="toggle" name="status" {{ $branchstaff->status=='Active' ? 'checked' : '' }}>
                        </div>
                    </div> 
                </div> 
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary btn-block btn-lg">Modifier</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    $("#branchStaff").addClass("show");
    $("#branchStaff li:nth-child(2)").addClass("active");
</script>
@endsection