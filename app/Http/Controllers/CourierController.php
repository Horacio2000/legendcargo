<?php

namespace App\Http\Controllers;

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

class CourierController extends Controller
{

    public function index(Request $request) {

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
        return view('colis.list', compact('courierList'));
    }

    public function search(Request $request) {
        $searchtext = $request->tracking_number;
        if (!empty($searchtext)) {
            $courier = CourierInfo::where('user_id', Auth::user()->id)
            ->where(function($q) use($searchtext) {
                $q->orWhere('code', 'LIKE', "%$searchtext%")
                ->orWhere('payment_date', 'LIKE', "%$searchtext%")
                ->orWhere('sender_name', 'LIKE', "%$searchtext%")
                ->orWhere('receiver_name', 'LIKE', "%$searchtext%")
                ->orWhere('status', 'LIKE', "%$searchtext%");
            })
            ->first();
        }
        return view('search-result', compact('courier'));

    }
    public function searchColis () {
        return view('search');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
    $gs = GeneralSetting::first();
    $branchList = Branch::where('status', 'Active')->get();
    $courierTypeList = CourierType::where('status', 'Active')->get();
    $shipmentModes = ShipmentMode::all();

    return view('colis.add', compact('branchList', 'courierTypeList', 'gs', 'shipmentModes'));
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
            'courier_content'=>'required|string',
            'courier_article_number.*'=>'required|numeric',
            'courier_price.*'=>'required|numeric',
            'courier_date_sent'=>'required|date',
            'courier_quantity.*' => 'required|numeric',
            'courier_fee.*' => 'required|numeric',
        ]);


        $data = $request->except('_token','courier_type','courier_quantity','courier_fee', 'shipment_mode');

        if (CourierInfo::first()) {

            $lastInvoice = CourierInfo::latest()->first()->id;
        } else {

            $lastInvoice = 0;
        }

        $data['invoice_id'] = $lastInvoice + 1;

        $data['status'] = 'Non reçu';
        $data['user_id'] = $request->user_id;

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
            $courierProductInfo->courier_content = $request->courier_content[$i];
            $courierProductInfo->courier_article_number = $request->courier_article_number[$i];
            $courierProductInfo->courier_price = $request->courier_price[$i];
            $courierProductInfo->courier_date_sent = $request->courier_date_sent[$i];
            $courierProductInfo->courier_quantity = $request->courier_quantity[$i];
            $courierProductInfo->courier_fee = $request->courier_fee[$i];
            $courierProductInfo->save();
        }

        //return redirect()->route('colis.invoice', $courierInfo->id)->withSuccess("Colis créé avec succès");
        return redirect()->route('colis.index', $courierInfo->id)->withSuccess("Colis créé avec succès");
    }

    public function courierInvoice(CourierInfo $courierInfo) {

        $courier_code = CourierProductInfo::where('courier_info_id', $courierInfo->id)->first()->courier_code;

        $code = '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($courier_code, 'C128') . '" alt="barcode"   />' . "<br>" . $courier_code;

        $gs = GeneralSetting::first();
        $courierProductInfoList = CourierProductInfo::with('courier_types')->where('courier_info_id', $courierInfo->id)->get();


        return view('colis.invoice', compact('courierInfo', 'courierProductInfoList', 'gs', 'code'));
    }
}
