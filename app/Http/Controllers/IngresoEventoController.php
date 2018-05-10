<?php

namespace FirstProject\Http\Controllers;

use Illuminate\Http\Request;
use FirstProject\EventUser;
use FirstProject\User;
use FirstProject\Event;
use Redirect;
use Session;
use Maatwebsite\Excel\Facades\Excel;

class IngresoEventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $userEvents = EventUser::name($request->get('name'))->where('event_user.type','3')->orderBy('user_id', 'ASC')->paginate(8);

        /**dd($request->input('name'));*/
        return view('ingresoEvento.index', compact('userEvents'));        
    }

    public function excel()
    {

        $dataExcel=  EventUser::select('event_user.id',  'users.name as user', 'events.name as event' )->join('users', 'users.id', '=', 'event_user.user_id')->join('events', 'events.id', '=', 'event_user.event_id')->where('event_user.type', '3')->get();



 /*    $dataExcel = EventUser::where('event_user.type','3')->get();*/


     $data=[];

        foreach ($dataExcel as $key => $value) 
            {

                //--Informe
                $data[] = array($value->id,
                                $value->user,
                                $value->event,
                          );
            }

            /**return var_dump($data);*/

            return Excel::create('Personas que ingresaron a los Eventos', function ($excel) use ($data) 
            {
                $excel->setTitle('Usuarios ingresados a los Eventos');
                $excel->setDescription('Informe de usuarios que ingresaron a los eventos');
                $excel->sheet('Ingreso', function ($sheet) use ($data) {
                
                    $sheet->fromArray($data);
                    $sheet->row(

                        1,

                        array('id',
                             'user',
                             'event'
                            )
                        );
                });
            })->download('xlsx');      
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
        //
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
