<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{


    public function getCreatedAtAttribute($value){
        return (!empty($value))?Carbon::parse($value)->format('d M Y'):$value;
    }


    public function getUpdatedAtAttribute($value){
        return (!empty($value))?Carbon::parse($value)->format('d M Y'):$value;
    }


    public function getPrescriptionImageAttribute($value){
        if(!empty($value)) {
            return asset('/files/prescriptions/' . $value);
        }else{
            return $value;
        }
    }


    public function user()
    {
    	return $this->belongsTo('App\Models\User');
    }


    public function details()
    {
        return $this->hasMany('App\Models\OrderDetails');
    }

}
