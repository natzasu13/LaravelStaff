<?php

namespace FirstProject;

use Illuminate\Database\Eloquent\Model;

class EventUser extends Model
{
  protected $table ="event_user";

protected $fillable = ['user_id'];

public $timestamps = false;


  public function getPosterUsername()
   {
   	return User::where('id', $this->user_id)->first();
   }
   

  public function getPosterEventname()
   {
   	return Event::where('id', $this->event_id)->first()->name;
   }

  public function getPosterStags()
   {
    return Stages::where('id', $this->type)->first();
   }

  public function scopeName($query, $name){
      if(trim($name)!=""){
      	  $query->join("users", "users.id", "=", "event_user.user_id")
      	  ->where('users.name', "LIKE", "%$name%")->get();
        }
   }

  public function scopeEmail($query, $email){
      if(trim($email)!=""){
          $query->join("users", "users.id", "=", "event_user.user_id")
      	  ->where('users.email',"LIKE", "%$email%")->get();
        }
   }

  public function scopeCellphone($query, $phone){
      if(trim($phone)!=""){
          $query->join("users", "users.id", "=", "event_user.user_id")
      	  ->where('users.phone',"LIKE", "%$phone%")->get();
        }
   }

  public function scopeEventStages($query){
          $query->join("event_stages", "event_stages.event_id", "=", "event_user.event_id")
          ->select('event_user.*')
          ->where('event_stages.stage_id', 2)
          ->where('event_stages.status', 1)->get();
   }

    public function scopeEvento($query, $name){
      if(trim($name)!=""){
          $query->join("events", "events.id", "=", "event_user.event_id")
         ->where('events.name',"LIKE", "%$name%")->get();

        }
   }
}
