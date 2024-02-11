@extends('admin.layouts.master')
@section('content')
<div class="content p-4">
    <h2 class="mb-4" style="text-transform: uppercase;">{{ $branchName->name }} Liste des revenus de la succursale
        <a href="{{ route('admin.company.income') }}" class="btn btn-primary btn-md float-right">
            <i class="fa fa-arrow-circle-left"></i>  Retour
        </a>
    </h2>
    <div class="card mb-4">
        <div class="card-body">
            <table id="table" class="table table-hover table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Date</th>
                        <th>Revenu de la succursale</th>
                        <th>Nom du receveur de trésorerie</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($branchIncomeList as $key=>$branchIncome)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $branchIncome->payment_date }}</td>
                        <td>{{ $branchIncome->total_balance }}&nbsp;{{ $gs->base_currency }}</td>
                        <td>{{ $branchIncome->payment_receiver->name }} [{{ $branchIncome->payment_receiver->type }}]</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">Aucune Information</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $branchIncomeList->links() }}
        </div>
    </div>
</div>
<script type="text/javascript">
    $("#companyIncomeList").addClass("active");
</script>
@endsection