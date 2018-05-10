<?php

namespace FirstProject;

use Illuminate\Database\Eloquent\Model;

class Itineraries extends Model
{
    
   # This property!
   protected $fillable = [
        'name', 'location', 'person_in_charge', 'event_id','scheduled_time', 'description', 'status'
    ];

   public function getPosterEventname()
   {
   	return Event::where('id', $this->event_id)->first();
   }

   public function scopeLocation($query, $location){
      if(trim($location)!=""){
      	  $query->where('itineraries.location',"LIKE", "%$location%")->get();
        }
   }

  public function scopePersonCharce($query, $person_in_charge){
      if(trim($person_in_charge)!=""){
          $query->where('itineraries.person_in_charge',"LIKE", "%$person_in_charge%")->get();
        }
   }
   
  
   public function events(){
        return $this->belongsToMany(Event::class)->withPivot('type');
    
   }
}
