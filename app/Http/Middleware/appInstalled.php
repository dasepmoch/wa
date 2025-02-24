<?php
/*
Copyright © Magd Almuntaser, OneXGen Technology. All rights reserved.
Project: MPWA Whatsapp Gateway | Multi Device
Licensed under the CC BY-NC-ND 4.0 License.
For details, visit https://creativecommons.org/licenses/by-nc-nd/4.0/.
*/

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class appInstalled
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

      $allowedRoute = ['setting.install_app','activateLicense','connectDB' ,'settings.install_app',"cache.clear"];
      if(!in_array($request->route()->getName(),$allowedRoute) && !env('APP_INSTALLED'))
        {
          return redirect()->route('setting.install_app');
        }
        return $next($request);
    }
}
?>