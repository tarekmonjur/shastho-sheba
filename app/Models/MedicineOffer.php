<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicineOffer extends Model
{

    public function medicines()
    {
    	return $this->hasMany('App\Models\MedicineOfferMap', 'offer_id', 'id');
    }


}
