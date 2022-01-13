<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function index()
    {
        if(Gate::denies('users.manage'))
        {
            return view('404');
        }
        $users = $this->user->latest()->paginate(10);
        return view('user.index',  compact('users'));
    }

    public function create()
    {
        if(Gate::denies('users.create'))
        {
            return view('404');
        }
        return view('user.create');
    }

    public function store(Request $request)
    {
        $this->user->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->input('password')),
            'role' => $request->role,
        ]);
        return redirect('admin/users');
    }

    public function edit($id)
    {
        if(Gate::denies('users.edit'))
        {
            return view('404');
        }
        $user = $this->user->find($id);
        return view('user.edit', compact('user'));
    }

    public function update($id, Request $request)
    {
        
        // if(Hash::check($request->input('password'), Auth::user()->password)) {
            $this->user->find($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->input('password')),
                'role' => $request->role,
            ]);
            return redirect('admin/users');
        // }
        // else {
        //     return "<script>
        //     window.alert('Mat khau khong dung');
        //     window.location.href='/admin/users';</script>'";
        // }
        
    }

    public function destroy($id)
    {
        if(Gate::denies('users.destoy'))
        {
            return view('404');
        }
        $this->user->find($id)->delete();
        return redirect('admin/users');
    }

    public function profile()
    {
        return view('user.profile');
    }
}
