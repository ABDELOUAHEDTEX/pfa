<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login(Request $request){
        $credentials=$request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

        if(Auth::attempt($credentials))
        {
            $user_role=Auth::user()->role;
        
            return redirect('/login');
            switch($user_role){
                case 1:
                    return redirect('/Directeur');
                    break;

                case 2:
                    return redirect('/Secretaire');
                    break;
                
                case 3:
                      return redirect('/Chef_departement');
                      break;

                case 4:
                     return redirect('/Chef_service');
                     break;
                     
                case 5:
                    return redirect('/Fonctionnaire');
                     break;

                default:
                    Auth::logout();
                    return redirect('/login')->with('error','oops something went wrong');
            }
        
        }
        
    }
}
