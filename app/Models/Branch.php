<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use App\Models\CourierInfo;

class Branch extends Model {
    use HasFactory;

    protected $table = "branches";
    // table fields
    protected $guarded = [];

    public function users() {
        return $this->hasMany(User::class);
    }

    public function courier_infos() {
        return $this->hasMany(CourierInfo::class);
    }

}
