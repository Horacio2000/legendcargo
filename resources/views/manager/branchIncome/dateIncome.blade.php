@extends('manager.layouts.master')
@section('content')
<div class="content p-4">
    <h2 class="mb-4" style="text-transform: uppercase;">{{ Auth::user()->branch->name }} Liste des revenus
        <a href="{{ route('manager.branch.income') }}" class="btn btn-primary btn-md float-right">
            <i class="fa fa-backward"></i>   Retour
        </a>
    </h2>
    <div class="card mb-4">
        <div class="card-body">

            <table id="table" class="table table-hover table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Revenu</th>
                        <th>Nom du receveur de trésorerie</th>
                    </tr>
                </thead>
                <tbody class="branch_income">
                    @forelse($branchIncomeList as $key=>$branchIncome)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $branchIncome->payment_date }}</td>
                        <td>{{ $branchIncome->total_balance }}&nbsp;{{ $gs->base_currency }}</td>
                         <td><a href="{{ route('manager.branch.income.staff',$branchIncome->payment_receiver_id) }}">{{ $branchIncome->payment_receiver->name }} [ {{ $branchIncome->payment_receiver->type }} ]</a></td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center">Aucune Information</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $branchIncomeList->appends(['start_date'=>request()->start_date,'end_date'=>request()->end_date])->links() }}
        </div>
    </div>
</div>
<script type="text/javascript">
    $("#branchIncome").addClass("active");
</script>
@endsection
