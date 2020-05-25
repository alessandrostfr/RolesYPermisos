<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Caffeinated\Shinobi\Models\Role;

class UserController extends Controller
{
    
    public function index()
    {
        $users = User::paginate(10);//almacenamos los productos y configuramos la paginacion

        return view('users.index', compact('users'));
    }

   

    public function show(User $user)
    {
         return view('users.show', compact('user'));
    }

    

    public function edit(User $user)
    {
        $roles = Role::get();

        return view('users.edit', compact('user', 'roles'));
    }


    
    public function update(Request $request,User $user)
    {

        //Primero actualizo el usuario
        //y despues actualizo los roles


        $user->update($request->all());

        $user->roles()->sync($request->get('roles'));

        return redirect()->route('users.edit', $user->id)->with('info', 'Usuario actualizado con exito');
    }

    

    public function destroy(User $user)
    {
        $user->delete();

        return back()->with('info', 'Eliminado correctamente'); //con el return back, regresamos a la vista anterior.
    }

}
