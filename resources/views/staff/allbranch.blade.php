@extends('staff.layouts.master')
@section('content')
<div class="content p-4">
    <h2 class="mb-4" style="text-transform: uppercase;">Toutes les succursales </h2>
    <div class="card mb-4">
        <div class="card-body">
            <table id="table" class="table table-hover table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Adresse</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($branchList as $key=>$branch)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $branch->name }}</td>
                        <td>{{ $branch->email ?? ''}}</td>
                        <td>{{ $branch->phone ?? ''}}</td>
                        <td>{{ $branch->address ?? '' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
    $("#allbranch").addClass("active");
    $(document).ready(function () {
        $('#table').DataTable();
    });
</script>
@endsection
