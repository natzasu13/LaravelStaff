<?php

namespace FirstProject\Http\Controllers;

use FirstProject\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class PruebaController extends Controller
{
   public function index(){
      return "Hola estamos dentro del controlador";
   }
    
     public function nombre($nombre){
      return "Hola mi nombre es : " .$nombre;
   }
}
