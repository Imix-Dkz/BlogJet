<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAge
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    { //Para este ejemplo se validará si es que el parametro de edad es mayor a 18
        /* if($request->age >=18)
            { return $next($request); }
        else{ return redirect('no-autorizado'); } */

        if(isset(auth()->user()->email))
            { $aut_email=auth()->user()->email; }
        else{ $aut_email="NULL"; }

        echo "el usuario identificado es :".$aut_email."...<br>";
        if($aut_email == "imix.icm@gmail.com")
            { return $next($request); }
        else{ return redirect('no-autorizado'); }
    }
}
