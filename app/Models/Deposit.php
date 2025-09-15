<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    use HasFactory;
    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }
    public function payment_method(){
        return $this->belongsTo('App\Models\PaymentMethod', 'payment_method_id');
    }

}
