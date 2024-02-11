<?php

namespace App\Http\Controllers\Manager;

use App\Models\CourierType;
use App\Models\CourierInfo;
use App\Models\Unit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\GeneralSetting;
use App\Models\CourierProductInfo;
use Auth;
use Carbon\Carbon;
use Milon\Barcode\Facades\DNS1DFacade as DNS1D;

class CourierInfoController extends Controller {

    public function departureBranchCourierList(Request $request) {
        $searchtext = $request->search;
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        if (!empty($start_date) && !empty($end_date)) {
            $courierList = CourierInfo::where([['receiver_branch_id', Auth::user()->branch_id], ['status','!=', 'Non reçu']])
                    ->where(function($q) use($start_date, $end_date) {
                        $q->whereBetween('created_at', [$start_date, $end_date]);
                    })
                    ->paginate(10);
        } elseif (!empty($searchtext)) {
            $courierList = CourierInfo::where([['receiver_branch_id', Auth::user()->branch_id], ['status','!=', 'Non reçu']])
                    ->where(function($q) use($searchtext) {
                        $q->orWhere('invoice_id', 'LIKE', "%$searchtext%")
                        ->orWhere('payment_date', 'LIKE', "%$searchtext%")
                        ->orWhere('sender_name', 'LIKE', "%$searchtext%")
                        ->orWhere('receiver_name', 'LIKE', "%$searchtext%")
                        ->orWhere('code', 'LIKE', "%$searchtext%");
                    })
                    ->paginate(10);
        }
        else {
            $courierList = CourierInfo::where([['receiver_branch_id', Auth::user()->branch_id], ['status','!=', 'Non reçu']])
                    ->paginate(10);
        }
        return view('manager.courierInfo.departureCourierList', compact('courierList'));
    }

    public function upcomingBranchCourierList(Request $request) {
        $searchtext = $request->search;
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        if (!empty($start_date) && !empty($end_date)) {
            $courierList = CourierInfo::where([['receiver_branch_id', Auth::user()->branch_id], ['status', 'Non reçu']])
                    ->where(function($q) use($start_date, $end_date) {
                        $q->whereBetween('created_at', [$start_date, $end_date]);
                    })
                    ->paginate(10);
        } elseif (!empty($searchtext)) {
            $courierList = CourierInfo::where([['receiver_branch_id', Auth::user()->branch_id], ['status', 'Non reçu']])
                    ->where(function($q) use($searchtext) {
                        $q->orWhere('invoice_id', 'LIKE', "%$searchtext%")
                        ->orWhere('payment_date', 'LIKE', "%$searchtext%")
                        ->orWhere('sender_name', 'LIKE', "%$searchtext%")
                        ->orWhere('receiver_name', 'LIKE', "%$searchtext%")
                        ->orWhere('code', 'LIKE', "%$searchtext%");
                    })
                    ->paginate(10);
        }
        else {
            $courierList = CourierInfo::where([['receiver_branch_id', Auth::user()->branch_id], ['status', 'Non reçu']])
                    ->paginate(10);
        }

        return view('manager.courierInfo.upcomingCourierList', compact('courierList'));
    }

    public function courierInvoice(CourierInfo $courierInfo) {
        $gs = GeneralSetting::first();
        $courier_code = CourierProductInfo::where('courier_info_id', $courierInfo->id)->first()->courier_code;
        $code = '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($courier_code, 'C128') . '" alt="barcode"   />' . "<br>" . $courier_code;

        $courierProductInfoList = CourierProductInfo::where('courier_info_id', $courierInfo->id)->get();
        return view('manager.courierInfo.invoice', compact('courierInfo', 'courierProductInfoList', 'gs', 'code'));
    }

    public function upcomingCourierInvoice(CourierInfo $courierInfo) {
        $gs = GeneralSetting::first();
        $courier_code = CourierProductInfo::where('courier_info_id', $courierInfo->id)->first()->courier_code;
        $code = '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($courier_code, 'C128') . '" alt="barcode"   />' . "<br>" . $courier_code;
        $courierProductInfoList = CourierProductInfo::where('courier_info_id', $courierInfo->id)->get();
        return view('manager.courierInfo.upcomingCourierInvoice', compact('courierInfo', 'courierProductInfoList', 'gs', 'code'));
    }

    public function printSlipView($id) {
        $courierInfo = CourierInfo::find($id);
        $courier_code = CourierProductInfo::where('courier_info_id', $courierInfo->id)->first()->courier_code;
        $code = '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($courier_code, 'C128') . '" alt="barcode"   />' . "<br>" . $courier_code;
        $gs = GeneralSetting::first();
        return view('manager.courierInfo.slip', compact('courier_code', 'code', 'gs', 'courierInfo'));
    }

    public function paidCourier(Request $request) {

        $id = $request->get('id');
        $courierInfo = CourierInfo::find($id);
        $courierInfo->payment_date = Carbon::now()->toDateString();
        $courierInfo->payment_branch_id = Auth::user()->branch_id;
        $courierInfo->payment_receiver_id = Auth::user()->id;
        $courierInfo->payment_status = "Payé";
        $courierInfo->save();
        return back()->withSuccess("Paiement du colis réussi");
    }

}
