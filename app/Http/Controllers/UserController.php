<?php

namespace FirstProject\Http\Controllers;

use Illuminate\Http\Request;
use FirstProject\User;
use Illuminate\Support\Farcades\Session;
use Illuminate\Support\Farcades\Redirect;


class UserController extends Controller
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
        return view('usuario.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return "Aqui estoy en el Store";
    User::create([
        'name' =>$request['nameInput'],
        'lastname'=>$request['lastnameInput'],
        'email'=>$request['emailInput'],
        'password'=>$request['passwordInput'], 
      ]);

        return redirect('/usuario')->with('message', 'store');
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
        $user = User::find($id);
        return view('usuario.edit', ['user'=>$user]);

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
         $user->fill($request->all());
         $user->save;

         Session::flash('message', 'Usuario Actualizado Correctamente');
         return redirect::to('/usuario');
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

        Session::flash('message', 'Usuario Eliminado Correctamente');
         return redirect::to('/usuario');
    }

   

}
