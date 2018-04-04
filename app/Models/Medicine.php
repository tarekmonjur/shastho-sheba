<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{

    public function setMedicineManufactureDateAttribute()
    {
        $this->attributes['medicine_manufacture_date'] = Carbon::parse($this->medicine_manufacture_date)->format('Y-m-d');
    }

    public function setMedicineExpiryDateDateAttribute()
    {
        $this->attributes['medicine_expiry_date'] = Carbon::parse($this->medicine_expiry_date)->format('Y-m-d');
    }

    public function getCreatedAtAttribute($value){
        return (!empty($value))?Carbon::parse($value)->format('d M Y'):$value;
    }

    public function getUpdatedAtAttribute($value){
        return (!empty($value))?Carbon::parse($value)->format('d M Y'):$value;
    }

    public function getOriginalPhotoAttribute(){
        if($this->medicine_image) {
            return asset('/files/medicine/' . $this->medicine_image);
        }else{
            return asset(config('setting.site_img').'medicine.jpg');
        }
    }

    public function getLargePhotoAttribute(){
        if($this->medicine_image) {
            return asset('/files/medicine/large/' . $this->medicine_image);
        }else{
            return asset(config('setting.site_img').'medicine.jpg');
        }
    }

    public function getMediumPhotoAttribute(){
        if($this->medicine_image) {
            return asset('/files/medicine/medium/' . $this->medicine_image);
        }else{
            return asset(config('setting.site_img').'medicine.jpg');
        }
    }

    public function getSmallPhotoAttribute(){
        if($this->medicine_image) {
            return asset('/files/medicine/small/' . $this->medicine_image);
        }else{
            return asset(config('setting.site_img').'medicine.jpg');
        }
    }


    public function type()
    {
        return $this->belongsTo('App\Models\MedicineType', 'medicine_type_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\MedicineCategory', 'medicine_category_id', 'id');
    }

    public function generic()
    {
        return $this->belongsTo('App\Models\MedicineGeneric', 'medicine_generic_id', 'id');
    }

    public function company()
    {
        return $this->belongsTo('App\Models\MedicineCompany', 'medicine_manufacturer_id', 'id');
    }

    public static function generateNextMedicineCode($medicineCode){
        if($medicineCode) {
            $medicine_code = explode('MED', $medicineCode);
            $next_id_without_zero_prefix = end($medicine_code) + 1;
            $zero_perfix_count = strlen(end($medicine_code)) - strlen($next_id_without_zero_prefix);
            $next_medicine_code = 'MED' . str_repeat('0', $zero_perfix_count) . $next_id_without_zero_prefix;
            return $next_medicine_code;
        }else{
            return 'MED00001';
        }
    }


}
