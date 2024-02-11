@extends('staff.layouts.master')
@section('content')
    <div class="content p-4">
        <h2 class="mb-4" style="text-transform: uppercase;">Liste de tous les colis
            <!--<a href="" class="btn btn-primary btn-md float-right">
                <i class="fa fa-list"></i> Ajouter un colis
            </a>-->
        </h2>
        <div class="card mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <form method="GET" action="{{ route('courier.index') }}" class="form-inline">
                            @csrf
                            <div class="form-group mb-1">
                                <label for="date1">Date de début :</label>
                                &nbsp;<input type="text" class="form-control" name="start_date" id="date1"
                                    placeholder="yyyy-mm-dd" value="{{ request()->start_date }}">
                            </div>&nbsp;
                            <div class="form-group mb-1">
                                <label for="date2">Date de fin:</label>
                                &nbsp;<input type="text" class="form-control" name="end_date" id="date2"
                                    placeholder="yyyy-mm-dd" value="{{ request()->end_date }}">
                            </div>&nbsp;
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Afficher</button>
                        </form>
                    </div>
                    <div class="col-md-4  mb-2">
                        <form method="GET" action="{{ route('courier.index') }}" class="form-inline float-right">
                            @csrf
                            <div class="form-group">
                                &nbsp;<input type="text" class="form-control" name="search" placeholder="rechercher"
                                    value="{{ request()->search }}">
                            </div>&nbsp;
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Rechercher</button>
                        </form>
                    </div>
                </div>
                <table id="table" class="table table-hover table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>No de suivi</th>
                            <th>Nom de l'expéditeur</th>
                            <th>Tél de l'expéditeur</th>
                            <th>Nom du destinataire</th>
                            <th>Tél du destinataire</th>
                            <th>Date</th>
                            <th>Statut</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($courierList as $key=>$courier)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>
                                    {{ App\Models\CourierProductInfo::where('courier_info_id', $courier->id)->first()->courier_code }}
                                </td>
                                <td>{{ $courier->sender_name }}</td>
                                <td>{{ $courier->sender_phone }}</td>
                                <td>{{ $courier->receiver_name }}</td>
                                <td>{{ $courier->receiver_phone }}</td>

                                <td class="text-center">{{ $courier->created_at->toDateString() }}</td>
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
                                    <a href="{{ route('courier.invoice', $courier->invoice_id) }}"><button
                                            class="btn btn-primary btn-sm"> <i class="fa fa-eye"></i> Facture du
                                            colis</button></a>
                                            <a href="{{ route('courier.edit',$courierInfo = $courier->id) }}"><button class="btn btn-info btn-sm"> <i class="fa fa-edit"></i> Modifier</button></a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="15" class="text-center">Aucune Information</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                {{ $courierList->appends(['search' => request()->search, 'start_date' => request()->start_date, 'end_date' => request()->end_date])->links() }}
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $("#courierInfo").addClass("show");
        $("#courierInfo li:nth-child(2)").addClass("active");
    </script>
@endsection
