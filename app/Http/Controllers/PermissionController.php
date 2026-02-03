<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    
    public function index(){
        return view('admin.permissionsview')->with('title', __('Permissions'));
    }

    public function create(Request $request) {
        // Esto crea un rol dinámicamente desde un formulario
        $permissionName = $request->input('perm_name');
        
        if (permission::where('name', $permissionName)->exists()) {
            return back()->with('error', 'El Permiso ya existe');
        }
        
        permission::create(['name' => $permissionName]);
        return back()->with('success', 'Permiso creado');
    }

    public function delete($id) {
        // Esto elimina un Permiso dinámicamente
        $permission = permission::findById($id);
        $permission->delete();
        return back()->with('success', 'Permiso eliminado');
    }

    public function edit(Request $request, $id) {
        // Esto edita un Permiso dinámicamente
        $permission = permission::findById($id);
        $newpermissionName = $request->input('perm_name');

        if (permission::where('name', $newpermissionName)->where('id', '!=', $id)->exists()) {
            return back()->with('error', 'El Permiso ya existe');
        }

        $permission->name = $newpermissionName;
        $permission->save();
        return back()->with('success', 'Permiso actualizado');
    }
}
