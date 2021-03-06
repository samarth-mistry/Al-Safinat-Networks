<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use DataTables;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:superadministrator');
    }

    public function data()
    {
        $users = User::all();
        return DataTables::of($users)
            ->addColumn('role', function ($user) {
                $role = $user->roles->first();
                if($role){
                    if($role->id == 1){
                        return '<span class="badge badge-danger">'.ucfirst($role->name).'</span>';
                    } elseif($role->id == 2){
                        return '<span class="badge badge-warning">'.ucfirst($role->name).'</span>';
                    } else {
                        return '<span class="badge badge-primary">'.ucfirst($role->name).'</span>';
                    }
                }
                else
                    return '-';
            })
            ->editColumn('created_at', function($user){
                return date('d M Y', strtotime($user->created_at));
            })
            ->escapeColumns('role')
            ->addColumn('actions', function ($user) {
                return view('admins.users.action', ['user' => $user]);
            })
            ->rawColumns(['actions'])->make(true);
    }

    public function index()
    {
        return view('admins.users.index');
    }

    public function create()
    {
        $roles = Role::all();
        return view('admins.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        //dd($request);
        $this->validate($request, [
            'name' => 'required|min:3|max:50',
            //'email' => 'email|unique:users,email',
            'email' => 'required',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6',
            'role_id' => 'required'
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        
        $user->attachRole($request->role_id);
        return redirect()->route('admin-users.index')->with('message', 'New User created successfully!');
    }

    public function show(Unit $unit)
    {
        //
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view('admins.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if($request->password != ""){
            if($request->password != $request->password_confirmation){
                return redirect()->back()->withErrors(["Confirm Password didn't match"])->withInput();
            } else {
                $user->password = Hash::make($request->password);
            }
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return redirect()->route('admin-users.index')->with('message', 'User updated successfully!');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('admin-users.index')->with('message', 'Unit deleted successfully!');
    }
}
