<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\CourierInfo;
use App\Models\CourierType;
use App\Models\ShipmentMode;

class CourierProductInfo extends Model {
    use HasFactory;

    protected $table = "courier_product_infos";
    // table fields
    protected $guarded = [];

    public function courier_info() {
        return $this->belongsTo(CourierInfo::class);
    }

    public function courier_types() {
        return $this->belongsTo(CourierType::class, 'courier_type');
    }

    public function shipment_mode() {
        return $this->belongsTo(ShipmentMode::class, 'shipment_mode_id');
    }

}
