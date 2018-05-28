<?php

namespace sicova\Http\Controllers;

use Illuminate\Http\Request;

use sicova\Http\Requests;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sicova\Http\Requests\RegistroFormularioRequest;

use sicova\Formulario;
use sicova\DetalleFormulario;
use sicova\RegistroFormulario;
use DB;

use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;


class PruebaController extends Controller
{
     public function index(Request $request)     
     {
        return view('instructor/prueba');
    }
}
