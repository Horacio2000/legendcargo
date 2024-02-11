<?php

namespace App\Http\Controllers\Staff;

use App\Models\CourierInfo;
use App\Models\CourierType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Support\Facades\Auth;
use App\Models\GeneralSetting;
use App\Models\CourierProductInfo;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\ShipmentMode;
use Milon\Barcode\Facades\DNS1DFacade as DNS1D;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Validator;

class CourierInfoController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {

        $searchtext = $request->search;
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        if (!empty($start_date) && !empty($end_date)) {
            $courierList = CourierInfo::where('receiver_branch_id', Auth::user()->branch_id)
                    ->where(function($q) use($start_date, $end_date) {
                        $q->whereBetween('created_at', [$start_date, $end_date]);
                    })
                    ->paginate(10);
        $searchtext = $request->search;
        } elseif (!empty($searchtext)) {
            $courierList = CourierInfo::where('receiver_branch_id', Auth::user()->branch_id)
                    ->where(function($q) use($searchtext) {
                        $q->orWhere('invoice_id', 'LIKE', "%$searchtext%")
                        ->orWhere('payment_date', 'LIKE', "%$searchtext%")
                        ->orWhere('sender_name', 'LIKE', "%$searchtext%")
                        ->orWhere('receiver_name', 'LIKE', "%$searchtext%")
                        ->orWhere('status', 'LIKE', "%$searchtext%");
                    })
                    ->paginate(10);
        }
        else {
            $courierList = CourierInfo::where('receiver_branch_id', Auth::user()->branch_id)
                    ->paginate(10);
        }
        return view('staff.courierInfo.list', compact('courierList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
{
    $gs = GeneralSetting::first();
    $branchList = Branch::where([['status', 'Active'], ['id', '!=', Auth::user()->branch_id]])->get();
    $courierTypeList = CourierType::where('status', 'Active')->get();
    $shipmentModes = ShipmentMode::all();

    return view('staff.courierInfo.add', compact('branchList', 'courierTypeList', 'gs', 'shipmentModes'));
}


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $request->validate([
            'sender_name' => 'required|max:50',
            'sender_phone' => 'required|max:50',
            'receiver_name' => 'required|max:50',
            'receiver_phone' => 'required|max:50',
            'courier_type' => 'required',
            'courier_quantity.*' => 'required|numeric',
            'courier_fee.*' => 'required|numeric'
        ]);


        $data = $request->except('_token','courier_type','courier_quantity','courier_fee', 'shipment_mode');

        if (CourierInfo::first()) {

            $lastInvoice = CourierInfo::latest()->first()->id;
        } else {

            $lastInvoice = 0;
        }

        $data['invoice_id'] = $lastInvoice + 1;

        $data['status'] = 'Reçu';
        $data['sender_branch_id'] = $request->has('sender_branch_id') ? intval($request->sender_branch_id) : null;


        $data['payment_balance'] = array_sum($request->courier_fee);

        $courier_code = strtoupper(Str::random(12));

        $data['code'] = $courier_code;

        $courierInfo = CourierInfo::create($data);

        $courier_type = $request->courier_type;

        $shipment_mode = $request->shipment_mode;

        for ($i = 0; $i < count($shipment_mode); $i++) {
            $courierProductInfo = new CourierProductInfo();
            $courierProductInfo->shipment_mode_id = $request->shipment_mode[$i];
            $courierProductInfo->courier_code = $courier_code;
            $courierProductInfo->courier_info_id = $courierInfo->id;
            $courierProductInfo->courier_type = $request->courier_type[$i];
            $courierProductInfo->courier_quantity = $request->courier_quantity[$i];
            $courierProductInfo->courier_fee = $request->courier_fee[$i];
            $courierProductInfo->save();
        }

        return redirect()->route('courier.invoice', $courierInfo->id)->withSuccess("Colis créé avec succès");
    }

    public function courierInvoice(CourierInfo $courierInfo) {

        $courier_code = CourierProductInfo::where('courier_info_id', $courierInfo->id)->first()->courier_code;

        $code = '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($courier_code, 'C128') . '" alt="barcode"   />' . "<br>" . $courier_code;

        $gs = GeneralSetting::first();
        $courierProductInfoList = CourierProductInfo::with('courier_types')->where('courier_info_id', $courierInfo->id)->get();


        return view('staff.courierInfo.invoice', compact('courierInfo', 'courierProductInfoList', 'gs', 'code'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CourierInfo  $courierInfo
     * @return \Illuminate\Http\Response
     */
    public function show(CourierInfo $courierInfo) {
//
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CourierInfo  $courierInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(CourierInfo $courierInfo) {
        return view('staff.courierInfo.edit', compact('courierInfo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CourierInfo  $courierInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CourierInfo $courierInfo)
{
    $validator = Validator::make($request->all(), [
        'status' => 'required',
    ]);

    $data = $request->all();
    $id = $data['courierId'];
    $courier = CourierInfo::find($id);

    $courier->update(['status' => $request->status]);

    return back()->withSuccess('Le statut du colis a été modifié avec succès');
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CourierInfo  $courierInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(CourierInfo $courierInfo) {
//
    }

    public function receiveCourier(Request $request) {

        $id = $request->get('id');
        $courierInfo = CourierInfo::find($id);
        if ($request->payment_status == "Payé") {
            $courierInfo->payment_date = Carbon::now()->toDateString();
            $courierInfo->payment_branch_id = Auth::user()->branch_id;
            $courierInfo->payment_receiver_id = Auth::user()->id;
            $courierInfo->payment_status = "Payé";
        }
        $courierInfo->receiver_branch_staff_id = Auth::user()->id;
        $courierInfo->status = 'Reçu';
        $courierInfo->save();
        return back()->withSuccess("Colis reçu avec succès");
    }

    public function searchDeliverCourier() {

        return view('staff.deliver.searchDeliver');
    }

    public function showDeliverCourier(Request $request) {

        $courierList = CourierInfo::where('code', $request->search)->orWhere('receiver_phone', $request->search)->orWhere('sender_phone', $request->search)->get();

        return view('staff.deliver.searchDeliver', compact('courierList'));
    }

    public function notifyView() {
        return view('staff.deliver.notifyView');
    }

    public function findCourier(Request $request) {

        $code = $request->code;

        $courier = CourierInfo::where('code', $code)->orWhere('receiver_phone', $code)->orWhere('sender_phone', $code)->with('branch')->get();

        if ($courier) {
            $response = array('output' => 'success', 'msg' => 'data found', 'courier' => $courier);
        } else {
            $response = array('output' => 'error', 'msg' => 'data not found');
        }
        return response()->json($response);
    }

    public function sendNotification(Request $request) {

        $codeList = $request->all();
        $gs = GeneralSetting::first();

        if (empty($codeList["code"])) {
            return back()->withErrors("Veuillez d'abord ajouter le colis");
        }

        foreach ($codeList["code"] as $invoice) {
            $sendNotify = CourierInfo::where('code', $invoice)->first();

            if ($sendNotify->receiver_email != null && $gs->email_verification == 1) {
                $to = $sendNotify->receiver_email;
                $name = $sendNotify->receiver_name;

                $subject = 'Votre colis est arrivé';

                $message = "Bonjour votre colis est arrivé";

                send_email($to, $name, $subject, $message);
            }

            if ($sendNotify->receiver_phone != null && $gs->sms_verification == 1) {
                $to = $sendNotify->receiver_phone;
                $message = 'Bonjour votre colis est arrivé';
                send_sms($to, $message);
            }
        }
        return back()->withSuccess("Notification envoyée avec succès");
    }

    public function staffCasheCollection(Request $request) {

        $start_date = $request->start_date;
        $end_date = $request->end_date;

        if (!empty($start_date) && !empty($end_date)) {
            $branchIncomeList = CourierInfo::where('payment_receiver_id', Auth::user()->id)
                    ->where(function($q) use($start_date, $end_date) {
                        $q->whereBetween('payment_date', [$start_date, $end_date]);
                    })
                    ->select(DB::raw("*, SUM(payment_balance) as total_balance"))
                    ->groupBy('payment_date')
                    ->paginate(10);
        } else {
            $branchIncomeList = CourierInfo::where('payment_receiver_id', Auth::user()->id)
                            ->select(DB::raw("*,SUM(payment_balance) as total_balance"))
                            ->groupBy('payment_date')->paginate(10);
        }

        $gs = GeneralSetting::first();

        return view('staff.branchIncome.list', compact('branchIncomeList', 'gs'));
    }

    public function printSlipView($id) {

        $courierInfo = CourierInfo::find($id);
        $courier_code = CourierProductInfo::where('courier_info_id', $courierInfo->id)->first()->courier_code;
        $code = '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($courier_code, 'C128') . '" alt="barcode"   />' . "<br>" . $courier_code;
        $gs = GeneralSetting::first();

        return view('staff.courierInfo.slip', compact('courier_code', 'code', 'gs', 'courierInfo'));
    }

    public function paidCourier(Request $request) {

        $id = $request->get('id');
        $courierInfo = CourierInfo::find($id);
        $courierInfo->payment_date = Carbon::now()->toDateString();
        $courierInfo->payment_branch_id = Auth::user()->branch_id;
        $courierInfo->payment_receiver_id = Auth::user()->id;
        $courierInfo->status = 'Retiré';
        $courierInfo->payment_status = "Payé";
        $courierInfo->save();
        return back()->withSuccess("Paiement du colis réussi");
    }

}
