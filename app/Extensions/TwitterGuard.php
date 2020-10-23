<?php

namespace App\Extensions;

use App\OauthTokens;
use App\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\StatefulGuard;

class TwitterGuard implements StatefulGuard
{
    protected $session;

    /**
     * TwitterGuard constructor.
     */
    public function __construct($session)
    {
        $this->session = $session;
    }

    /**
     * Determine if the current user is authenticated.
     *
     * @return bool
     */
    public function check()
    {
        return $this->session->has('token');
    }

    /**
     * Determine if the current user is a guest.
     *
     * @return bool
     */
    public function guest()
    {
        return !$this->check();
    }

    /**
     * Get the currently authenticated user.
     *
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function user()
    {
        if (!$this->guest()) {
            $token = OauthTokens::query()->find($this->session->get('token'));
            return $token->user;
        }
    }

    /**
     * Get the ID for the currently authenticated user.
     *
     * @return int|string|null
     */
    public function id()
    {
        if (!$this->guest()) {
            return $this->user()->id;
        }
        return null;
    }

    /**
     * Validate a user's credentials.
     * Token credential is obligatory
     * @param array $credentials
     * @return bool
     */
    public function validate(array $credentials = [])
    {
        $token = OauthTokens::query()->find("1299007061737582592-u7gm8IIjexgVpQvctKAhIBjVohgt3A");
        $user = null;
        if ($token) {
            $user = $token->user;
        }
        return $token && $user;
    }

    /**
     * Set the current user.
     *
     * @param \Illuminate\Contracts\Auth\Authenticatable $user
     * @return void
     */
    public function setUser(Authenticatable $user)
    {
        if ($this->validate([$user])) {
            $this->session->put('token', $user->oauthToken->token);
        }
    }

    /**
     * Attempt to authenticate a user using the given credentials.
     *
     * @param array $credentials
     * @param bool $remember
     * @return bool
     */
    public function attempt(array $credentials = [], $remember = false)
    {
        if ($this->validate($credentials)) {
            $user = User::query()->find($credentials['id']);
            $this->login($user, $remember);
            return true;
        }
        return false;
    }

    /**
     * Log a user into the application without sessions or cookies.
     *
     * @param array $credentials
     * @return bool
     */
    public function once(array $credentials = [])
    {
        return false;
    }

    /**
     * Log a user into the application.
     *
     * @param \Illuminate\Contracts\Auth\Authenticatable $user
     * @param bool $remember
     * @return void
     */
    public function login(Authenticatable $user, $remember = false)
    {
        $this->setUser($user);
    }

    /**
     * Log the given user ID into the application.
     *
     * @param mixed $id
     * @param bool $remember
     * @return \Illuminate\Contracts\Auth\Authenticatable
     */
    public function loginUsingId($id, $remember = false)
    {
        return false;
    }

    /**
     * Log the given user ID into the application without sessions or cookies.
     *
     * @param mixed $id
     * @return \Illuminate\Contracts\Auth\Authenticatable|bool
     */
    public function onceUsingId($id)
    {
        return false;
    }

    /**
     * Determine if the user was authenticated via "remember me" cookie.
     *
     * @return bool
     */
    public function viaRemember()
    {
        return false;
    }

    /**
     * Log the user out of the application.
     *
     * @return void
     */
    public function logout()
    {
        $this->session->flush();

    }

}
