<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use Auth;

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
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        if($provider == "twitter"){
            $user = Socialite::driver($provider)
            ->user();
        }
        else {
            $user = Socialite::driver($provider)
            ->setHttpClient(new \GuzzleHttp\Client(['verify' => false]))
            ->user();
        }

        $hasUser = \App\User::where('email', $user->getEmail())->first();

        if($hasUser){
            $hasUser->update([
                'name' => $user->getName(),
                'picture' => $user->avatar_original,
            ]);

            Auth::login($hasUser);
            return redirect('dashboard');
        }
        else{
            $newUser = \App\User::create([
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'picture' => $user->avatar_original,
                'password' => bcrypt(microtime()),
            ]);
            Auth::login($newUser);
            return redirect('dashboard');
        }
    }
}
