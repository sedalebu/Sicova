<?php

namespace sicova\Http\Middleware;

use Closure;

class MdUserAdmin
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
        if($usuario_actual->tp_user!=3){
         echo'<script type="text/javascript">     alert("No tienes Acceso, Permisos denegados");     window.location="httP://localhost:8000/instructor"     </script>';
        }
        return $next($request);
      
    }
}
}
