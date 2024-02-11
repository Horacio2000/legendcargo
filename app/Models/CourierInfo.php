<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use App\Models\Branch;

class CourierInfo extends Model {
    use HasFactory;

    protected $table = "courier_infos";

    //protected $fillable = ['sender_name', 'receiver_name', 'sender_phone', 'receiver_phone', 'status' ];

    // table fields
    protected $guarded = [];

    public function courier_product_infos() {
        return $this->hasMany('App\Models\CourierProductInfo', 'courier_info_id');
    }

    /*public function branch() {
        return $this->belongsTo(Branch::class, 'sender_branch_id');
    }
    */
    public function payment_receiver() {
        return $this->belongsTo(User::class, 'payment_receiver_id');
    }

    public function receiver_branch() {
        return $this->belongsTo(Branch::class, 'receiver_branch_id');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

}
