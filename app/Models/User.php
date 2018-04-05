<?php

namespace App\Models;

use Carbon\Carbon;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

   protected $fillable = [
       'first_name', 'last_name', 'email', 'mobile_no', 'password', 'city', 'address'
   ];

    protected $hidden = [
        'password', 'remember_token',
    ];


    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }


    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }


    public function getFirstNameAttribute($value){
        return ucfirst($value);
    }


    public function getLastNameAttribute($value){
        return ucfirst($value);
    }


    public function getFullNameAttribute(){
        return ucfirst($this->first_name).' '.ucfirst($this->last_name);
    }


    public function getOriginalPhotoAttribute(){
        if($this->photo) {
            return asset('/files/user/' . $this->photo);
        }else{
            return asset(config('setting.site_img').'user.png');
        }
    }


    public function getLargePhotoAttribute(){
        if($this->photo) {
            return asset('/files/user/large/' . $this->photo);
        }else{
            return asset(config('setting.site_img').'user.png');
        }
    }


    public function getMediumPhotoAttribute(){
        if($this->photo) {
            return asset('/files/user/medium/' . $this->photo);
        }else{
            return asset(config('setting.site_img').'user.png');
        }
    }
    

    public function getSmallPhotoAttribute(){
        if($this->photo) {
            return asset('/files/user/small/' . $this->photo);
        }else{
            return asset(config('setting.site_img').'user.png');
        }
    }


    public function getCreatedAtAttribute($value){
        return (!empty($value))?Carbon::parse($value)->format('d M Y'):$value;
    }


    public function getUpdatedAtAttribute($value){
        return (!empty($value))?Carbon::parse($value)->format('d M Y'):$value;
    }


    public function promotion()
    {
        return $this->hasOne('App\Models\Promotion')->orderBy('id', 'desc');
    }


}
