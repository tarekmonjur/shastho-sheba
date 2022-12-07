<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{

    public function getCreatedAtAttribute($value)
    {
        return (!empty($value))?Carbon::parse($value)->format('d M Y'):$value;
    }

    public function getUpdatedAtAttribute($value)
    {
        return (!empty($value))?Carbon::parse($value)->format('d M Y'):$value;
    }

    public function getOriginalPhotoAttribute(){
        if($this->slider_image) {
            return asset('/files/slider/' . $this->slider_image);
        }else{
            return asset(config('setting.site_img').'slider.png');
        }
    }

    public function getLargePhotoAttribute(){
        if($this->slider_image) {
            return asset('/files/slider/large/' . $this->slider_image);
        }else{
            return asset(config('setting.site_img').'slider.png');
        }
    }

    public function getMediumPhotoAttribute(){
        if($this->slider_image) {
            return asset('/files/slider/medium/' . $this->slider_image);
        }else{
            return asset(config('setting.site_img').'slider.png');
        }
    }

    public function getSmallPhotoAttribute(){
        if($this->slider_image) {
            return asset('/files/slider/small/' . $this->slider_image);
        }else{
            return asset(config('setting.site_img').'slider.png');
        }
    }


}
