<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Spatie\Permission\Models\Role;

class ProfileController extends Controller
{
    public function index(){
        $users = User::all();
        return view('admin.usersview')->with('title', 'Users')->with('users', $users);
    }

    public function profile(Request $request){
        $user = $request->user();
        return view('user.profile')->with('title', __('Profile'))->with('user', $user)->with('success', $success ?? null);
    }

    public function updateRoles() {
        // 1. Asegurarnos de que el rol existe (por si acaso)
        $rolDefault = Role::firstOrCreate(['name' => 'usuario']);

        // 2. Buscar usuarios que no tengan ningún rol y asignarles el default
        $usuariosActualizados = 0;
        User::doesntHave('roles')->get()->each(function ($user) use ($rolDefault, &$usuariosActualizados) {
            $user->assignRole($rolDefault);
            $usuariosActualizados++;
        });

        return "Proceso terminado. Se han actualizado $usuariosActualizados usuarios.";
    }

    public function editProfileView(Request $request){
        $user = $request->user();
        return view('user.editProfile')->with('title', __('Edit Profile'))->with('user', $user);
    }

    public function editProfile(Request $request){
        $user = $request->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();

        return redirect()->route('profile')->with('title', __('Profile'))->with('success', 'Profile updated successfully.');
    }

    public function editPassword(Request $request){
        $user = $request->user();

        $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user->password = bcrypt($request->input('password'));
        $user->save();

        return redirect()->route('profile')->with('title', __('Profile'))->with('success', __('Password updated successfully.'));
    }

    
}
