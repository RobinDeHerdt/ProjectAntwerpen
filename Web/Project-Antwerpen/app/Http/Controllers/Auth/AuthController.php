<?php

namespace App\Http\Controllers\Auth;
use Session;
use App\User;
use Illuminate\Support\Facades\Input;
use Validator;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/overzicht';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
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
            'firstname'         =>  'required|max:255',
            'lastname'          =>  'required|max:255',
            'email'             =>  'required|email|max:255|unique:users',
            'password'          =>  'required|min:6|confirmed',
            'postalcode'        =>  'integer',
            'age'               =>  'integer',
            'profileimage'      =>  'image',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */

    protected function create(array $data)
    {
        $fileName = 'null';

        if (Input::hasFile('profileimage') && Input::file('profileimage')->isValid()) {
            $destinationPath = '/public/img';
            $extension = Input::file('profileimage')->getClientOriginalExtension();
            $fileName = '/img/' . uniqid().'.'.$extension;

            Input::file('profileimage')->move(base_path() . $destinationPath, $fileName);

        }  
        else 
        {
            $fileName = '/img/profile.png';
        }


        Session::flash('register', 'Je bent nu geregistreerd. Welkom!');

        return User::create([
            'firstname'             => $data['firstname'],
            'lastname'              => $data['lastname'],
            'age'                   => $data['age'],
            'postalcode'            => $data['postalcode'],
            'gender_1male_2female'  => $data['gender'],
            'email'                 => $data['email'],
            'password'              => bcrypt($data['password']),
            'profileimage'          => $fileName,
        ]);
    }

    public function authenticated()
    {
        Session::flash('login', 'Je bent nu ingelogd. Welkom!');

        return redirect('/overzicht');
    }

    public function logout()
    {
        Auth::guard($this->getGuard())->logout();
        Session::flash('logout', 'Je bent nu uitgelogd. Tot de volgende keer!');
        return redirect(property_exists($this, 'redirectAfterLogout') ? $this->redirectAfterLogout : '/overzicht');
    }

    // public function getLogout()
    // {
        
        
    //     return redirect('/');
    // }
}
