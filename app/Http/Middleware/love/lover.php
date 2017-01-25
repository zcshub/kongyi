<?php

namespace App\Http\Middleware\love;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Lang;

class lover
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($this->auth->guest()){
            return redirect()->guest('auth/login');
        }else{
            $pattern = "/".Lang::get("love.mylover")."/";
            if(in_array($this->auth->getUser()->email, config('auth.owner'), true)
                || preg_match($pattern, $this->auth->getUser()->name)){
                return $next($request);
            }else{
                return redirect()->guest('home');
            }
        }
    }

}
