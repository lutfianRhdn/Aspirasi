<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/';

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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:3', 'confirmed'],
            'profile_image' => ['image', 'nullable', 'max:1999'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // profile_image
        if (request()->hasFile('profile_image')) {
            // filename with extension
            $fileNameWithExtension = $data['profile_image']->getClientOriginalName();

            //file name
            $fileName = pathInfo($fileNameWithExtension, PATHINFO_FILENAME);

            // extension
            $fileNameExtension = $data['profile_image']->getClientOriginalExtension();

            //store
            $fileNameToStore = $fileName . time() . '.' . $fileNameExtension;

            $path = $data['profile_image']->storeAs('public/profile_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'default.jpg';
        }

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'role_id' => 2,
            'is_admin' => 0,
            'password' => Hash::make($data['password']),
            'profile_image' => $fileNameToStore,
        ]);
    }
}
