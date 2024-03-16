<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class RolePermission extends Model
{

    public function getCreatedAtAttribute($value)
    {
        return (!empty($value))?Carbon::parse($value)->format('d M Y'):$value;
    }

    public function getUpdatedAtAttribute($value)
    {
        return (!empty($value))?Carbon::parse($value)->format('d M Y'):$value;
    }
}
