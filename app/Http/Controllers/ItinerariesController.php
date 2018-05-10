<?php

namespace FirstProject\Http\Controllers;

use Illuminate\Http\Request;
use FirstProject\EventUser;
use FirstProject\User;
use FirstProject\Event;
use FirstProject\Itineraries;
use Redirect;
use Session;
use Carbon\Carbon;

class ItinerariesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $itineraries = Itineraries::location($request->get('location'))->personCharce($request->get('person_in_charge'))
        ->orderBy('scheduled_time', 'asc')
        ->paginate(8);
               /**
           
            $students = student::where('user_id', Auth::id())->where(function($query) use ($q) {
               $query->where('name', 'LIKE', '%'.$q.'%')
                   ->orWhere('last_name', 'LIKE', '%'.$q.'%')
                   ->orWhere('email', 'LIKE', '%'.$q.'%');
            })->paginate(9);
*/
        return view('itinerarios.index', compact('itineraries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $current = Carbon::now();
        $current = new Carbon();

        $events = Event::pluck('name', 'id');
        return view('itinerarios.create', ['events'=>$events,'current'=>$current ] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

/**dd($request->input('scheduled_time'));*/

      if(trim($request['event_id'])!=""){

             Itineraries::create([
            'event_id'=>$request['event_id'], 
            'scheduled_time'=>$request['scheduled_time'],
            'location'=>$request['location'], 
            'person_in_charge'=>$request['person_in_charge'], 
            'status'=>$request['status'], 
            'name' =>$request['name'],
            'description'=>$request['description'],
          ]);

           Session::flash('message', 'Itinerario Creado Correctamente');
           return redirect('/itinerarios');

        }
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
  

        $itinerarie = Itineraries::find($id);
        $events = Event::pluck('name', 'id');
        return view('itinerarios.edit', ['itinerarie'=>$itinerarie, 'events'=>$events] );
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
        $itinerarie = Itineraries::find($id);

        // Make sure you've got the Page model
        if($itinerarie) 
        {
            $itinerarie->name = $request['name'];
            $itinerarie->description =  $request['description'];
            $itinerarie->scheduled_time =  $request['scheduled_time'];
            $itinerarie->location = $request['location'];
            $itinerarie->person_in_charge = $request['person_in_charge'];
            $itinerarie->status =  $request['status'];
            $itinerarie->event_id =  $request['event_id'];
            $itinerarie->save();
        }

         Session::flash('message', 'Itinerario Actualizado Correctamente');
         return redirect::to('/itinerarios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Itineraries::destroy($id);

        Session::flash('message', 'Itinerario Eliminado Correctamente');
         return redirect::to('/itinerarios');
    }
}
