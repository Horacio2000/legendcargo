@extends('admin.layouts.master')
@section('content')
<div class="content p-4">
    <h2 class="mb-4" style="text-transform: uppercase;">{{ $branchName->name }} Branch Income List
        <a href="{{ route('admin.company.income') }}" class="btn btn-primary btn-md float-right">
            <i class="fa fa-arrow-circle-left"></i>  Retour
        </a>
    </h2>
    <div class="card mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <form method="GET" action="{{ route('admin.branch.income',$branch) }}" class="form-inline">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="date1">Date de début :</label>
                            &nbsp;<input type="text" class="form-control" name="start_date" id="date1" placeholder="yyyy-mm-dd" value="{{request()->start_date}}">
                        </div>&nbsp;
                        <div class="form-group mb-2">
                            <label for="date2">Date de fin :</label>
                            &nbsp;<input type="text" class="form-control" name="end_date" id="date2" placeholder="yyyy-mm-dd" value="{{request()->end_date}}">
                        </div>&nbsp;
                        <div class="form-group mb-1">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>Afficher le revenu de la succursale</button>
                        </div>
                        <div class="form-group mb-1 ml-4">
                            <select class="form-control" name="staff_id">
                                <option value="">Tout</option>
                                @foreach($branchStaff as $staff)
                                <option value="{{ $staff->id }}" {{ request()->staff_id==$staff->id ? 'selected' : '' }}>{{ $staff->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-1">
                            <button type="submit" class="btn btn-primary">Choisissez le personnel</button>
                        </div>
                    </form>
                </div>
            </div>
            <table id="table" class="table table-hover table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Date</th>
                        <th>Revenu de la succursale</th>
                    </tr>
                </thead>
                <tbody class="branch_income">
                    @forelse($branchIncomeList as $key=>$branchIncome)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td><a href="{{ route('admin.branch.income.date',[$branch,$branchIncome->payment_date]) }}">{{ $branchIncome->payment_date }}</a></td>
                        <td>{{ $branchIncome->total_balance }}&nbsp;{{ $gs->base_currency }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">Aucune Information</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $branchIncomeList->appends(['start_date'=>request()->start_date,'end_date'=>request()->end_date])->links() }}
        </div>
    </div>
</div>
<script type="text/javascript">
    $("#companyIncomeList").addClass("active");
</script>
@endsection