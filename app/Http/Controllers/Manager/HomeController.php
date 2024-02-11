<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CourierInfo;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->role != "Manager") {
            Auth::logout();
            return redirect()->intended('manager')->with('error', "Vous n'êtes pas autorisé à visiter cette page...");
        }

    $totalStaff = User::where([['role', 'Staff'], ['branch_id', Auth::user()->branch_id]])->count();
    $totalCourierInfo = CourierInfo::where([
        ['receiver_branch_id', Auth::user()->branch_id],
        ['status', '!=', 'Non reçu']
    ])->whereNotNull('status')->count();

    $totalUpcomingCourierInfo = CourierInfo::where([
        ['receiver_branch_id', Auth::user()->branch_id],
        ['status', '=', 'Non reçu']
    ])->whereNotNull('status')->count();
    $total_chart = $this->chartData();
    return view('manager.dashboard', compact('totalStaff','totalCourierInfo', 'totalUpcomingCourierInfo', 'total_chart'));
    }

    public function chartData() {

        $companyIncomeStatistics = CourierInfo::whereYear('created_at', '=', date('Y'))->where([['status', 'Retiré'], ['payment_branch_id', Auth::user()->branch_id]])->get()->groupBy(function($d) {
            return $d->created_at->format('F');
        });

        $monthly_chart = collect([]);

        foreach (month_arr() as $key => $value) {

            $monthly_chart->push([
                'month' => Carbon::parse(date('Y') . '-' . $key)->format('Y-m'),
                'income' => $companyIncomeStatistics->has($value) ? $companyIncomeStatistics[$value]->sum('payment_balance') : 0,
            ]);
        }

        return response()->json($monthly_chart->toArray())->content();
    }
}
