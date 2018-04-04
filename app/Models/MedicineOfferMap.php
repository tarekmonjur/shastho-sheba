<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicineOfferMap extends Model
{
    public function medicine()
    {
    	return $this->belongsTo('App\Models\Medicine', 'medicine_id', 'id');
    }
}
