<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class MedicineCategory extends Model
{

    public function getCreatedAtAttribute($value)
    {
        return (!empty($value))?Carbon::parse($value)->format('d M Y'):$value;
    }

    public function getUpdatedAtAttribute($value)
    {
        return (!empty($value))?Carbon::parse($value)->format('d M Y'):$value;
    }

    public function getLargePhotoAttribute(){
        if($this->category_image) {
            return asset('/files/category/1920/' . $this->category_image);
        }else{
            return asset(config('setting.admin_img').'medicine.png');
        }
    }

    public function getMediumPhotoAttribute(){
        if($this->category_image) {
            return asset('/files/category/745/' . $this->category_image);
        }else{
            return asset(config('setting.admin_img').'medicine.png');
        }
    }

    public function getSmallPhotoAttribute(){
        if($this->category_image) {
            return asset('/files/category/200/' . $this->category_image);
        }else{
            return asset(config('setting.admin_img').'medicine.png');
        }
    }


    public function parent()
    {
        return $this->belongsTo($this, 'parent_id', 'id');
    }


    public function parentRecursive()
    {
        return $this->parent()->with('parentRecursive');
    }


    public function child()
    {
        return $this->hasMany($this, 'parent_id', 'id');
    }


    public function childRecursive()
    {
        return $this->child()->with('childRecursive');
    }

    public function medicines()
    {
        return $this->hasMany('App\Models\Medicine');
    }

    public function medicineCount()
    {
        return $this->medicines()->selectRaw('medicine_category_id, count(*) as total')->groupBy('medicine_category_id');
    }

}
