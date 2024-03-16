<?php

namespace App\Http\Controllers\Site\Auth;

use App\Models\User;
use Socialite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SocailiteController extends RegisterController
{
    
    public function facebook(){
 		return Socialite::driver('facebook')->redirect();
    }


    public function facebookLogin()
    {
    	$facebook = Socialite::driver('facebook')->user();
    	$token = $facebook->token;
    	if(empty($token)){
    		return redirect('facebook');
    	}
    	return $this->loginUser($facebook);
    }


    public function google(){
 		return Socialite::driver('google')->redirect();
    }


    public function googleLogin()
    {
    	$google = Socialite::driver('google')->user();
    	$token = $google->token;
    	if(empty($token)){
    		return redirect('google');
    	}
    	return $this->loginUser($google);
    }


    protected function loginUser($socailite)
    {
    	$fullname = explode(' ', $socailite->getName());
    	$email = $socailite->getEmail();
    	$user = User::where('email', $email)->first();

    	if(!$user)
    	{
			$user['app_id'] = $socailite->getId();
	    	$user['first_name'] = isset($fullname[0])?$fullname[0]:end($fullname);
	    	$user['last_name'] = end($fullname);
	    	$user['email'] = $email;
	    	$user['mobile'] = '';
	    	$user['password'] = $user['app_id'];
	    	$user['referral_code'] = '';
	    	$user['referrer_code'] = '';
	    	$user['city'] = '';
	    	$user['address'] = '';

	    	$user = $this->create($user);
	    	$this->update($user, '');
	    }

    	$this->guard()->login($user);
    	return redirect('dashboard');
    }


}
