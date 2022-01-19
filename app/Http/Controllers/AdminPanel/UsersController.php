<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->simplePaginate(10);
        return view('adminpanel.users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminpanel.adduser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;
        $request = $request->validate([
            'name' => 'required|unique:App\Models\User',
            'email' => 'required|email|unique:App\Models\User',
            'password' =>'required|min:6',
            'confirm_password'=>'required|same:password|min:6'
        ]);
        $user->name=$request['name'];
        $user->email=$request['email'];
        $user->password = Hash::make($request['password']);
        $user->email_verified_at=date("Y-m-d H:i:s");
        $user->save();
        return redirect()->route('users');
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
        $user=User::find($id);
        return view('adminpanel.edituser', compact('user'));
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
        $request=$request->validate([
            'name' => 'required|unique:App\Models\User',
            'email' => 'required|email|unique:App\Models\User',
            'password' =>'required|min:6',
        ]);
        $user=User::find($id);
        $user->name=$request['name'];
        $user->email=$request['email'];
        $user->password = Hash::make($request['password']);
        $user->save();
        return redirect()->route('users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::find($id);
        $user->delete();
        return redirect()->route('users');
    }
}
