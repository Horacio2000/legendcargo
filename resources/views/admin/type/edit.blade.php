@extends('admin.layouts.master')
@section('content')
<div class="content p-4">
    <h2 class="mb-4" style="text-transform: uppercase;">Modifier le type
        <a href="{{ route('type.index') }}" class="btn btn-primary btn-md float-right">
            <i class="fa fa-list"></i>   Voir le Type
        </a>
    </h2>
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('type.update',$type->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="col-md-12  container-fluid">
                    <div class="form-group">
                        <label for="shipment_mode_id" style="text-transform: uppercase;"><strong>Type d'expédition&nbsp;<span class="mark">*</span></strong></label>
                        <input class="form-control form-control-lg mb-3" type="text" name="shipment_mode_id" readonly=""  value="{{ $type->shipmentMode->name }}" placeholder="Type d'expédition">
                    </div>
                </div>
                <div class="col-md-12  container-fluid">
                    <div class="form-group">
                        <label for="name" style="text-transform: uppercase;"><strong>Nom&nbsp;<span class="mark">*</span></strong></label>
                        <input class="form-control form-control-lg mb-3" type="text" name="name" readonly=""  value="{{ $type->name }}" placeholder="Nom">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="unit_id" style="text-transform: uppercase;"><strong>Unité&nbsp;<span class="mark">*</span></strong></label>
                        <input class="form-control form-control-lg mb-3" type="text" name="unit_id" readonly=""  value="{{ $type->unit->name }}" placeholder="Unité">
                    </div>
                </div>
                <div class="col-md-12  container-fluid">
                    <div class="form-group">
                        <label for="price" style="text-transform: uppercase;"><strong>Prix&nbsp;<span class="mark">*</span></strong></label>
                        <input class="form-control form-control-lg mb-3" type="text" name="price"   value="{{ $type->price ?? old('price') }}" placeholder="Prix">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="status" style="text-transform: uppercase;"><strong>Statut</strong></label>
                        <input type="checkbox" data-onstyle="success" data-offstyle="danger" data-width="100%" data-on="Actif" data-off="Inactif" data-toggle="toggle" name="status"  {{ $type->status=='Active' ? 'checked' : '' }}>
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
    $("#courierSetting li:nth-child(2)").addClass("active");
</script>
@endsection
