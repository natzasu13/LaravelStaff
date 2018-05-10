<?php

namespace FirstProject;

use Illuminate\Database\Eloquent\Model;

class Suggestions extends Model
{
     public function getPosterUsername()
   {
   	return User::where('id', $this->user_id)->first();
   }

}
