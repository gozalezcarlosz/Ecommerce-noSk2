<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        //return view('admin.users.index', compact('users'))->with('title', __('Users'));
        return view('admin.users.example', compact('users'))->with('title', __('Users'));
    }

    public function show(int $id){
        $user = User::findOrFail($id);
        return view('admin.users.show', compact('user'))->with('title', __('User Details'));
    }

    public function edit(int $id){
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'))->with('title', __('Edit User'));
    }

    public function destroy(int $id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.users')->with('tipo_alerta', 'success')->with('message', __('User deleted successfully'));
    }

    public function create(){
        $user = new User();
        $user->name = request('name');
        $user->email = request('email');
        $user->password = bcrypt(request('password'));
        $user->save();
        return redirect()->route('admin.users')->with('tipo_alerta', 'success')->with('message', __('User created successfully'));
    }
}
