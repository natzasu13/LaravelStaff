<?php

namespace FirstProject;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function users(){
    	return $this->belongsToMany(User::class);

    }

   /**  public function stags(){
    	return $this->belongsToMany(Stages::class);
    }*/
}
