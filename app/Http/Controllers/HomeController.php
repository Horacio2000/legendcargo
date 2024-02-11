<?php

namespace App\Http\Controllers;

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
    public function addresses() {
        return view('address');
    }

    public function index()
    {

    }
    public function dashboard(Request $request) {
        $searchtext = $request->search;
        //$start_date = $request->start_date;
        //$end_date = $request->end_date;
        if (!empty($searchtext)) {
            $courierList = CourierInfo::where('user_id', Auth::user()->id)
            ->where(function($q) use($searchtext) {
                $q->orWhere('code', 'LIKE', "%$searchtext%")
                ->orWhere('payment_date', 'LIKE', "%$searchtext%")
                ->orWhere('sender_name', 'LIKE', "%$searchtext%")
                ->orWhere('receiver_name', 'LIKE', "%$searchtext%")
                ->orWhere('status', 'LIKE', "%$searchtext%");
            })
            ->paginate(10);
        } else {
            $courierList = CourierInfo::where('user_id', Auth::user()->id)
                    ->where(function($q) use($searchtext) {
                        $q->orWhere('invoice_id', 'LIKE', "%$searchtext%")
                        ->orWhere('payment_date', 'LIKE', "%$searchtext%")
                        ->orWhere('sender_name', 'LIKE', "%$searchtext%")
                        ->orWhere('receiver_name', 'LIKE', "%$searchtext%")
                        ->orWhere('status', 'LIKE', "%$searchtext%");
                    })
                    ->paginate(10);
        }
        return view('dashboard', compact('courierList'));
    }
}
