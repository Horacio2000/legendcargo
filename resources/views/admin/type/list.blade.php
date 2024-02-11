@extends('admin.layouts.master')
@section('content')
<div class="content p-4">
    <h2 class="mb-4" style="text-transform: uppercase;">Liste de tous les types
        <a href="{{ route('type.create') }}" class="btn btn-primary btn-md float-right">
            <i class="fa fa-list"></i>   Ajouter un type
        </a>
    </h2>
    <div class="card mb-4">
        <div class="card-body">
            <table id="table" class="table table-hover table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Type d'expédition</th>
                        <th>Nom</th>
                        <th>Unité</th>
                        <th>Prix</th>
                        <th>Statut</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($courierTypeList as $courierType)
                    <tr>
                        <td>{{ $courierType->shipmentMode->name }}</td>
                        <td>{{ $courierType->name }}</td>
                        <td>{{ $courierType->unit->name }}</td>
                        <td>{{ $courierType->price }}</td>
                        <td>
                            @if($courierType->status  == 'Active')
                            <span class="badge badge-success">Actif</span>
                            @else
                            <span class="badge badge-danger">Inactif</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('type.edit',$courierType->id) }}"><button class="btn btn-primary btn-sm"> <i class="fa fa-edit"></i> MODIFIER</button></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
    $("#courierSetting").addClass("show");
    $("#courierSetting li:nth-child(2)").addClass("active");
    $(document).ready(function () {
        $('#table').DataTable();
    });
</script>
@endsection
