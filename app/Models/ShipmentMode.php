<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CourierType;

class ShipmentMode extends Model
{
    use HasFactory;

    protected $table = 'shipment_modes';

    // Relation avec les types de colis
    public function courierTypes()
    {
        return $this->hasMany(CourierType::class, 'shipment_mode_id');
    }
}
