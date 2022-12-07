<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class MedicineCompany extends Model
{
    public function getCreatedAtAttribute($value)
    {
        return (!empty($value))?Carbon::parse($value)->format('d M Y'):$value;
    }

    public function getUpdatedAtAttribute($value)
    {
        return (!empty($value))?Carbon::parse($value)->format('d M Y'):$value;
    }

    public function medicines()
    {
        return $this->hasMany('App\Models\Medicine', 'medicine_manufacturer_id', 'id');
    }
}
