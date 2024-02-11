@extends('admin.layouts.master')
@section('content')
<div class="content p-4">
    <h2 class="mb-4" style="text-transform: uppercase;">Modifier l'entrepôt
        <a href="{{ route('branch.index') }}" class="btn btn-primary btn-md float-right">
            <i class="fa fa-list"></i>   Voir l'entrepôt
        </a>
    </h2>
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('branch.update',$branch->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="col-md-12  container-fluid">
                    <div class="form-group">
                        <label for="name" style="text-transform: uppercase;"><strong>Nom&nbsp;<span class="mark">*</span></strong></label>
                        <input class="form-control form-control-lg mb-3" type="text" name="name"  value="{{ $branch->name ?? old('name') }}" placeholder="Nom de l'entrepôt ">
                    </div>
                </div>
                <div class="col-md-12 container-fluid">
                    <div class="form-group">
                        <label for="image" style="text-transform: uppercase;"><strong>Image</strong></label>
                        <input class="form-control form-control-lg mb-3" type="file" name="image">
                        @if($branch->image)
                        <img style="width: 100px;height: 100px;" class="thumbnail img-responsive" src="{{asset('assets/admin/img/branch/'.$branch->image)}}"/>
                        @else
                        <div class="col-md-12 bg-danger p-2">
                            <span class="text-white">
                                Aucune image fournie
                            </span>
                        </div>
                        @endif
                        <p style="color: red;"><strong>Note: </strong>Le format de l'image de l'entrepôt  doit être JPG, JPEG, PNG</p>
                    </div>
                </div>
                <div class="col-md-12 container-fluid">
                    <div class="form-group">
                        <label for="email" style="text-transform: uppercase;"><strong>Email</strong></label>
                        <input class="form-control form-control-lg mb-3" type="email" name="email"  value="{{ $branch->email ?? old('email') }}" placeholder="Email de l'entrepôt ">
                    </div>
                </div>
                <div class="col-md-12 container-fluid">
                    <div class="form-group">
                        <label for="phone" style="text-transform: uppercase;"><strong>Téléphone</strong></label>
                        <input class="form-control form-control-lg mb-3" type="text" name="phone"  value="{{ $branch->phone ?? old('phone') }}" placeholder="Téléphone de l'entrepôt ">
                    </div>
                </div>
                <div class="col-md-12 container-fluid">
                    <div class="form-group">
                        <label for="address" style="text-transform: uppercase;"><strong>Adresse</strong></label>
                        <textarea class="form-control" rows="3" name="address" placeholder="Adresse de l'entrepôt ">{{ $branch->address ?? old('address') }}</textarea>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="status" style="text-transform: uppercase;"><strong>Statut</strong></label>
                        <input type="checkbox" data-onstyle="success" data-offstyle="danger" data-width="100%" data-on="Actif" data-off="Inactif" data-toggle="toggle" name="status" {{ $branch->status=='Active' ? 'checked' : '' }}>
                    </div>
                </div>
                <br>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary btn-block btn-lg">Mettre à jour l'entrepôt </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    $("#branch").addClass("show");
    $("#branch li:nth-child(2)").addClass("active");
</script>
@endsection
