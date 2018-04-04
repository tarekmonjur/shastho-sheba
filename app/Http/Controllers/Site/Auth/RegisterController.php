<?php

namespace App\Http\Controllers\Site\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use App\Service\Site\Auth\RegistersUsers;
use App\Http\Controllers\Site\BaseController;
use Illuminate\Validation\Rule;

class RegisterController extends BaseController
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware('guest:web');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|string|min:3|max:25',
            'last_name' => 'required|string|min:3|max:25',
            'email' => 'required|string|email|max:100|unique:users,email',
            'mobile' => ['required','min:11','max:13','regex:/^(017|018|016|015|019)[0-9]+$/', 'unique:users,mobile_no'],
            // 'password' => 'required|string|min:6|confirmed',
            'password' => 'required|string|min:6',
            'referrer_code' => ['nullable', Rule::exists('users')->where(function ($query) {
                $query->where('referrer_code', $data['referrer_code']);
            })],
            'city' => 'required|string|min:3|max:20',
            'address' => 'nullable|string|min:3|max:255',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'mobile_no' => $data['mobile'],
            'password' => $data['password'],
            'city' => $data['city'],
            'address' => $data['address'],
        ]);
    }
}
