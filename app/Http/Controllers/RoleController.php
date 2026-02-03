<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index(){
        return view('admin.rolesview')->with('title', 'Roles');
    }

    public function create(Request $request) {
        // Esto crea un rol dinámicamente desde un formulario
        $roleName = $request->input('role_name');
        
        if (Role::where('name', $roleName)->exists()) {
            return back()->with('error', 'El rol ya existe');
        }
        
        Role::create(['name' => $roleName]);
        return back()->with('success', 'Rol creado');
    }

    public function delete($id) {
        // Esto elimina un rol dinámicamente
        $role = Role::findById($id);
        $role->delete();
        return back()->with('success', 'Rol eliminado');
    }

    public function edit(Request $request, $id) {
        // Esto edita un rol dinámicamente
        $role = Role::findById($id);
        $newRoleName = $request->input('role_name');

        if (Role::where('name', $newRoleName)->where('id', '!=', $id)->exists()) {
            return back()->with('error', 'El rol ya existe');
        }

        $role->name = $newRoleName;
        $role->save();
        return back()->with('success', 'Rol actualizado');
    }

}
