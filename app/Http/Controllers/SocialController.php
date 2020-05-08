<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Validator,Redirect,Response,File;
use Socialite;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;

class SocialController extends Controller
{
public function redirect($provider)
{
    return Socialite::driver($provider)->redirect();
}
public function callback($provider)
{
    $userSocial =   Socialite::driver($provider)->stateless()->user();
    $users       =   User::where(['email' => $userSocial->getEmail()])->first();
    if($users){
        Auth::login($users);
        return redirect('/');
    }else{
        $user = User::create([
            'name'          => $userSocial->getName(),
            'email'         => $userSocial->getEmail(),
            'avatar'         => $userSocial->getAvatar(),
            'provider_id'   => $userSocial->getId(),
            'provider'      => $provider,
        ]);
        auth()->login($user);
        //Auth::login($users);
        return redirect('/');
    }
}

}