<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
//    protected $fillable = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


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
            return asset('/files/admin/' . $this->photo);
        }else{
            return asset(config('setting.admin_img').'user.png');
        }
    }

    public function getLargePhotoAttribute(){
        if($this->photo) {
            return asset('/files/admin/large/' . $this->photo);
        }else{
            return asset(config('setting.admin_img').'user.png');
        }
    }

    public function getMediumPhotoAttribute(){
        if($this->photo) {
            return asset('/files/admin/medium/' . $this->photo);
        }else{
            return asset(config('setting.admin_img').'user.png');
        }
    }

    public function getSmallPhotoAttribute(){
        if($this->photo) {
            return asset('/files/admin/small/' . $this->photo);
        }else{
            return asset(config('setting.admin_img').'user.png');
        }
    }


    public function getCreatedAtAttribute($value){
        return (!empty($value))?Carbon::parse($value)->format('d M Y'):$value;
    }

    public function getUpdatedAtAttribute($value){
        return (!empty($value))?Carbon::parse($value)->format('d M Y'):$value;
    }


    public function role(){
        return $this->belongsTo('App\Models\RolePermission');
    }


}



