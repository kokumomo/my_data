<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Route;

class Authenticate extends Middleware
{

    protected $user_route = 'user.login';
    protected $owner_route = 'owner.login';
    protected $admin_route = 'admin.login';

    protected $avatar_route = 'avatar.login';
    protected $actor_route = 'actor.login';
    protected $buyer_route = 'buyer.login';
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            if(Route::is('owner.*')){
                return route($this->owner_route);
            } elseif(Route::is('admin.*')){
                return route($this->admin_route);
            } elseif(Route::is('avatar.*')){
                return route($this->avatar_route);
            } elseif(Route::is('actor.*')){
                return route($this->actor_route);
            } elseif(Route::is('buyer.*')){
                return route($this->buyer_route);
            } else {
                return route($this->user_route);
            }
        }
    }
}