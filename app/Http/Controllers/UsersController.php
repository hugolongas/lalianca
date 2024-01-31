<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;

use Yajra\Datatables\Datatables;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $users = User::all();
            return Datatables::of($users)
                ->addColumn('edit', function ($row) {
                    $url = route('admin.users.edit', ['usuari' => $row]);
                    $btn = '<a href="' . $url . '" class="edit btn btn-primary btn.sm">Editar</a>';
                    return $btn;
                })
                ->rawColumns(['edit'])->make(true);
        }
        return view('admin.users.index');
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create')->with("roles",$roles);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',            
        ]);
        $name = $request->name;
        $password = $request->password;
        $email = $request->email;
        if($password==null){
            $include_chars = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
            $charLength = strlen($include_chars);
            $password = '';
            for ($i = 0; $i < 8; $i++) {
                $password .= $include_chars [rand(0, $charLength - 1)];
            }           
        }
        
        $encryptPassword = Hash::make($password);

        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = $encryptPassword;
        $user->save();
        
        return redirect()->route('admin.users');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit')->with('user', $user);
    }

    public function update(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);
        $name = $request->name;
        $email = $request->email;

        if($user->name!=$name)        
        $user->name = $name;
        if($user->email!=$email)
        $user->email = $email;
        $user->save();

        return redirect()->route('admin.users');
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
    }
}
