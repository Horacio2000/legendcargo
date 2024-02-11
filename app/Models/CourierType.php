<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Unit;
use App\Models\CourierProductInfo;
use App\Models\ShipmentMode;

class CourierType extends Model {
    use HasFactory;

    protected $table = "courier_types";
    // table fields
    protected $guarded = [];

    public function unit() {
        return $this->belongsTo(Unit::class);
    }

    public function courier_product_infos() {
        return $this->hasMany(CourierProductInfo::class);
    }

    // Relation avec le mode d'expédition
    public function shipmentMode()
    {
        return $this->belongsTo(ShipmentMode::class, 'shipment_mode_id');
    }

}
