<?php

namespace FirstProject\Http\Controllers;

use Illuminate\Http\Request;
use FirstProject\EventUser;
use FirstProject\User;
use FirstProject\Event;
use Redirect;
use Session;


class UserEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {  
       /**   $users->events()->deatch(1);
        $users->events()->sync([2]);*/
    
  /*   $userEvents = EventUser::name($request->get('name'))->where('event_user.type','2')->email($request->get('email'))->cellphone($request->get('phone'))->eventStages()->paginate(8);*/

        $userEvents = EventUser::where('event_user.type','2')->orWhere('event_user.type','1')->name($request->get('name'))->email($request->get('email'))->cellphone($request->get('phone'))->eventStages()->orderBy('id', 'desc')->paginate(8);


/**dd($request->input('name'));*/
/**
  $userEvents = EventUser::join('users', 'users.id', '=', 'event_user.user_id')
                          ->where('event_user.type','2')
                          ->orWhere('users.name', 'LIKE', '%'.$request->input('name').'%')
                          ->orWhere('users.email', 'LIKE', '%'.$request->input('email').'%')
                          ->orWhere('users.cellphone', 'LIKE', '%'.$request->input('cellphone').'%')
                          ->select('event_user.user_id', 'event_user.event_id','event_user.id', 'event_user.type')
                          ->paginate(9);*/

     return view('usuarioEvento.index', compact('userEvents'));
  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        $userEvents= EventUser::find($id);

        // Make sure you've got the Page model
        if($userEvents) 
        {
            $userEvents->type = 3;
            $userEvents->save();
        }

        Session::flash('message', 'Se confirmó la asistencia correctamente.');
        return redirect::to('/usuarioEvento');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
