<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\Account;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class RegisterController extends Controller
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            'first_name' => ['required', 'string', 'max:25'],
            'middle_name' => ['nullable','string','max:25'],
            'last_name' => ['required', 'string', 'max:25'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:account'],
            'gender_id' => ['required'],
            'role_id' => ['required'],
            'password' => ['required', 'string', 'regex:/^.*(?=.*?[a-zA-Z])(?=.*?[0-9]).{8,}$/', 'min:9'],
            'display_picture_link' => ['required', 'mimes:jpeg,png,jpg'],
        ]);

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\Account
     */
    protected function create(array $data)
    {
        $image =  $data['display_picture_link'];
        $name = time() . '.' . $image->getClientOriginalExtension();;
        $location = 'images/' . $name;
        // dd($location);
        Storage::putFileAs('public/images', $image, $name);

        return Account::create([
            'first_name' => $data['first_name'],
            'middle_name' => $data['middle_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'gender_id' => $data['gender_id'],
            'role_id' => $data['role_id'],
            'password' => Hash::make($data['password']),
            'display_picture_link' => $location
        ]);
    }

}
