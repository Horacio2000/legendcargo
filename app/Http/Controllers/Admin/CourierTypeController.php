<?php

namespace App\Http\Controllers\Admin;

use App\Models\CourierType;
use App\Models\Unit;
use App\Models\ShipmentMode;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourierTypeController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $courierTypeList = CourierType::all();
        return view('admin.type.list', compact('courierTypeList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $unitList = Unit::all()->where('status', 'Active');
        $shipmentModes = ShipmentMode::all();
        return view('admin.type.add', compact('unitList', 'shipmentModes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $request->validate([
            'name' => 'required|max:50',
            'unit_id' => 'required',
            'price' => 'required|numeric',
            'shipment_mode_id' => 'required',
        ]);

        $data = $request->all();

        if ($request->get('status')) {
            $data['status'] = "Active";
        } else {
            $data += ["status" => "Inactive"];
        }

        CourierType::create($data);

        return back()->withSuccess("Type créé avec succès");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CourierType  $courierType
     * @return \Illuminate\Http\Response
     */
    public function show(CourierType $courierType) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CourierType  $courierType
     * @return \Illuminate\Http\Response
     */
    public function edit(CourierType $type) {

        $unitList = Unit::all();
        return view('admin.type.edit', compact('type', 'unitList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CourierType  $courierType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CourierType $type) {

        if ($request->get('status')) {
            $status = "Active";
        } else {
            $status = "Inactive";
        }

        $type->price = $request->price;
        $type->status = $status;
        $type->save();

        return back()->withSuccess('Type mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CourierType  $courierType
     * @return \Illuminate\Http\Response
     */
    public function destroy(CourierType $courierType) {
        //
    }

}
