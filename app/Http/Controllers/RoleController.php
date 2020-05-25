<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;

class RoleController extends Controller
{
    
    public function index()
    {
        $roles = Role::paginate(10);//almacenamos los productos y configuramos la paginacion

        return view('roles.index', compact('roles'));
    }


    public function create()
    {

        $permissions = Permission::get();

        return view('roles.create', compact('permissions'));
    }


    public function store(Request $request)
    {
        $role  = Role::create($request->all());//Almacenamos todo lo que viene del formulario en una instancia role

        $role->permissions()->sync($request->get('permissions')); //le asignamos los permisos


        return redirect()->route('roles.edit', $role->id)->with('info', 'Rol creado con exito');//con el metodo with enviamos una variable con un mensaje
    }
   

    public function show(Role $role)
    {
         return view('roles.show', compact('role'));
    }

    

    public function edit(Role $role)
    {
        $permissions = Permission::get();

        $assignedPermissions = $role->permissions->pluck('id')->toArray(); 
        return view('roles.edit', compact('role', 'permissions', 'assignedPermissions'));

        // return view('roles.edit', compact('role', 'permissions'));
    }


    
    public function update(Request $request,Role $role)
    {

        //Primero actualizo el rol
        //y despues actualizo los permisos


        $role->update($request->all());

        $role->permissions()->sync($request->get('permissions'));

        return redirect()->route('roles.edit', $role->id)->with('info', 'Rol actualizado con exito');
    }

    

    public function destroy(Role $role)
    {
        $role->delete();

        return back()->with('info', 'Eliminado correctamente'); //con el return back, regresamos a la vista anterior.
    }

}
