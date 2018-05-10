<?php

namespace FirstProject\Http\Controllers;

use Illuminate\Http\Request;
use FirstProject\User;
use FirstProject\EventUser;
use Redirect;
use Session;


class EventAttendeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         $users = User::name($request->get('name'))->email($request->get('email'))->cellphone($request->get('phone'))->orderBy('name', 'ASC')->paginate(10);

       /**
           
            $students = student::where('user_id', Auth::id())->where(function($query) use ($q) {
               $query->where('name', 'LIKE', '%'.$q.'%')
                   ->orWhere('last_name', 'LIKE', '%'.$q.'%')
                   ->orWhere('email', 'LIKE', '%'.$q.'%');
            })->paginate(9);
*/
        return view('asistentesEvento.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
        return view('asistentesEvento.create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $user= User::create([
            'name'=>$request['name'], 
            'phone'=>$request['phone'],
            'email'=>$request['email'],
                'country'=>$request['country'],
                    'lodging'=>$request['lodging'],
            'status'=>1, 
            'contact_name'=>$request['contact_name'], 
            'contact_phone'=>$request['contact_phone'], 
            'contact_kin' =>$request['contact_kin']
          ]);


            EventUser::create([
            'user_id'=>$user->id, 
            'event_id'=>1,
            'type'=>3
                  ]);

           Session::flash('message', 'Usuario Creado Correctamente');
           return redirect('/asistentesEvento');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
         
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        $user = User::find($id);
        return view('asistentesEvento.edit', ['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        // Make sure you've got the Page model
        if($user) 
        {
            $user->name = $request['name'];
            $user->phone =  $request['phone'];
            $user->email =  $request['email'];
            $user->contact_name = $request['contact_name'];
            $user->contact_phone = $request['contact_phone'];
            $user->contact_kin =  $request['contact_kin'];
            $user->save();
        }

         Session::flash('message', 'Usuario Actualizado Correctamente');
         return redirect::to('/asistentesEvento');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          User::destroy($id);
         /** 
          $eventUser = EventUser::where('user_id', $id);
          EventUser::destroy($eventUser->id);
         */
          

        Session::flash('message', 'Usuario Eliminado Correctamente');
         return redirect::to('/asistentesEvento');
    }
}
