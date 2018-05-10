<?php

namespace FirstProject;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($valor){
        if(!empty($valor)){
            $this->attributes['password'] = \Hash::make($valor);
        }
    }

    public function scopeName($query, $name){
      if(trim($name)!=""){
      /**$query->whereRaw('concat(name," ",lastname) like ?', "%$name%")->get();*/
          $query->where('users.name', "LIKE", "%$name%")->get();
        }
    }

    public function scopeEmail($query, $email){
      if(trim($email)!=""){
        $query->where('email',"LIKE", "%$email%")->get();
        }
    }

    public function scopeCellphone($query, $phone){
      if(trim($phone)!=""){
        $query->where('phone', "LIKE", "%$phone%")->get();
        }
    }

    /**public function scopeType($query, $type){   
        $types = config('options.types');

        if($type != "" && isset($types[$type])){
            $query->where('type', '=', $type);
        }
    }*/
    
    public function events(){
        return $this->belongsToMany(Event::class)->withPivot('type');


    
    }
}
