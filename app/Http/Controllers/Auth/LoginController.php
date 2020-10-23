<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\OauthTokens;
use App\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Thujohn\Twitter\Facades\Twitter;

class LoginController extends Controller
{

    protected function index()
    {
        return $this->redirectToProvider();
    }

    protected function store()
    {
        return $this->handleProviderCallback();
    }

    /**
     * Redirect the user to the Twitter authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    protected function redirectToProvider()
    {
        return Socialite::driver('twitter')->redirect();
    }

    /**
     * Persists and check the credentials from Twitter.
     *
     * @return \Illuminate\Http\Response
     */
    protected function handleProviderCallback()
    {
        $twitter_user = Socialite::driver('twitter')->user();
        $user = User::query()->updateOrCreate(['id' => $twitter_user->id],
            [
                'display_name' => $twitter_user->name,
                'avatar_url' => $twitter_user->avatar_original,
            ]);
        $token = OauthTokens::query()->updateOrCreate(['user_id' => $twitter_user->id],
            [
                'token' => $twitter_user->token,
                'token_secret' => $twitter_user->tokenSecret,
            ]);
        if (Auth::attempt(['token' => $token->token, 'id' => $user->id], false)) {
            return redirect()->route('dashboard.index');
        }
        return response('Sorry an error occurred with your request, try logging-in again.', 403);
    }

    protected function logoutAndRedirect()
    {
        Auth::logout();
        return redirect(route('landing.index'));
    }
}
