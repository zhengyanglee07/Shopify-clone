<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Validator;


use Closure;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;

use function PHPUnit\Framework\isNull;

class CheckEmail
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (isset($request->email)) {
            //Check whether user's email already exists
            $validator = Validator::make($request->all(), [
                'email' => 'required|exists:users',
            ]);

            if ($validator->fails()) {
                if ($request->roles == "user") {
                    return redirect('/lookup/user');
                    // return "Fail user";
                } else {
                    return redirect('/lookup/admin');
                    // return "Fail admin"
                }
            }
            session(['email' => $request->email]);
            session(['roles' => $request->roles]);
            return redirect()->route('login');
        } else {
            return $next($request);
        }
    }
}
