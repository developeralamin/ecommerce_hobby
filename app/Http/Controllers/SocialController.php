<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;


class SocialController extends Controller
{


    /**
     * Redirect the user to the provider authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }


    /**
     * Obtain the user information from provider.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('github')->user();
        
        $provider_id  = $user->getId();
        $email        = $user->getEmail();

    $data = User::where('provider_id',$provider_id)->where('email',$email)->first();

	  if ($data) {
	  	    auth()->login($data);
	  }
	  else{
	  	return  User::insert([
            'name'            => $user->getName(),
            'email'           => $user->getEmail(),
            'provider_id'     => $user->getId(),
            'provider_name' => 'github'
        ]);
         // auth()->login($login);
	  }

        return redirect()->to('/home');

    }

    
}
