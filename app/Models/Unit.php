<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\CourierType;

class Unit extends Model {
    use HasFactory;

    protected $table = "units";
    // table fields
    protected $guarded = [];

    public function couriertypes() {
        return $this->hasMany(CourierType::class);
    }

}
