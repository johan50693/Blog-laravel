<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Laracasts\Flash\Flash;
use App\Http\Requests\UserRequest;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::orderBy('id','ASC')->paginate(5);

        return view('admin.users.index')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // dd('Aqui voy a crear un usuario');

        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        
     //   dd($request->all());
        $user= new User($request->all());
        $user->password=bcrypt($request->password);
        $user->type=$request->type;
    //    dd($user->type);
     //   dd($user->type);
        $user->save();

        //Solucionar problema de leer el tipo de usuario
        flash('Se ha Registrado a '.$user->name.' exitosamente', 'success');
        return redirect('/admin/users');
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
        
        $user=User::find($id);
       // dd($user);
        return view('admin.users.edit')->with('user',$user);
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
       // dd($id);
      //dd($request->all());
        $user=User::find($id);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->type=$request->type;
        $user->save();

        flash('El usuario '.$user->name.' se ha editado exitosamente', 'success');
        return redirect('admin/users');
        //dd($user);

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
        $user=User::find($id);
        User::destroy($id);

        flash('Se ha eliminado el usuario '.$user->name.' exitosamente', 'warning');
        return redirect('admin/users');
    }
}
