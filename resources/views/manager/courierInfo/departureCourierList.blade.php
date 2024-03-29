@extends('manager.layouts.master')
@section('content')
<div class="content p-4">
    <h2 class="mb-4" style="text-transform: uppercase;">Liste des colis traités
    </h2>
    <div class="card mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-8 col-sm-6 col-xs-12">
                    <form method="GET" action="{{ route('departure.manager') }}" class="form-inline">
                        @csrf
                        <div class="form-group mb-1">
                            <label for="date1">Date de début :</label>
                            &nbsp;<input type="text" class="form-control" name="start_date" id="date1" placeholder="yyyy-mm-dd" value="{{request()->start_date}}">
                        </div>&nbsp;
                        <div class="form-group mb-1">
                            <label for="date2">Date de fin :</label>
                            &nbsp;<input type="text" class="form-control" name="end_date" id="date2" placeholder="yyyy-mm-dd" value="{{request()->end_date}}">
                        </div>&nbsp;
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Afficher</button>
                    </form>
                </div>
                <div class="col-md-4  mb-2">
                    <form method="GET" action="{{ route('departure.manager') }}" class="form-inline float-right">
                        @csrf
                        <div class="form-group">
                            &nbsp;<input type="text" class="form-control" name="search" placeholder="rechercher" value="{{request()->search}}">
                        </div>&nbsp;
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Rechercher</button>
                    </form>
                </div>
            </div>
            <table id="table" class="table table-hover table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>No de facture du colis</th>
                        <th>Date du Colis</th>
                        <th>Nom de l'expéditeur</th>
                        <th>Entrepôt</th>
                        <th>Nom du destinataire</th>
                        <th>Statut</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($courierList as $key=>$courier)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $courier->invoice_id }}</td>
                        <td>{{ $courier->created_at->toDateString() }}</td>
                        <td>{{ $courier->sender_name }}</td>
                        <td>{{ $courier->receiver_branch->name }}</td>
                        <td>{{ $courier->receiver_name }}</td>

                        <td>
                            @if($courier->status  == 'Non reçu')
                            <span class="btn btn-sm btn-danger text-uppercase">{{ $courier->status }}</span>
                            @elseif ($courier->status  == 'Retiré')
                            <span class="btn btn-sm btn-success text-uppercase">{{ $courier->status }}</span>
                            @else
                            <span class="btn btn-sm btn-info text-uppercase">{{ $courier->status }}</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('manager.departure.invoice',$courier->invoice_id) }}"><button class="btn btn-primary btn-sm"> <i class="fa fa-eye"></i> Facture de colis</button></a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">Aucune Information</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $courierList->appends(['search'=>request()->search,'start_date'=>request()->start_date,'end_date'=>request()->end_date])->links() }}
        </div>
    </div>
</div>
<script type="text/javascript">
    $("#courierInfo").addClass("show");
    $("#courierInfo li:nth-child(1)").addClass("active");

</script>
@endsection
