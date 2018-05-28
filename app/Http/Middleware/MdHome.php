<?php

namespace sicova\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class MdHome
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $usuario_actual=\Auth::user();


        if ($usuario_actual->estado==0) {
            echo'<script type="text/javascript">     alert("No tienes Acceso, Permisos denegados");     window.location="http://localhost:8000"     </script>';
            Auth::logout();
        }else{


        if($usuario_actual->tp_user==3){
         return redirect("admin");
        }else {
            if($usuario_actual->tp_user==2){
         return redirect("instructor");
        }else{
            return redirect("instructor");
        }
        }
        }
        return $next($request);
    }
}
