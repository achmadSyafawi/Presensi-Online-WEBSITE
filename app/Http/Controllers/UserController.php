<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

// load model
use App\User;

use Validator;
use Auth;

class UserController extends Controller
{

    public function index()
    {
        //
        $user = User::where('username', '!=', 'admin')->get();
// dd($user);
        return view('admin.user.index',compact('user'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $user = $request->all();

        $rules = [
            'username' => 'required|min:6|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required',
            'name' => 'required',
        ];

        $validator = Validator::make($user, $rules);

        if($validator->fails())
        {
            return redirect('admin/user/create')->withErrors($validator)->withInput();
        }
//
        $user["password"] = bcrypt($user["password"]);

        // dd($user);

        User::create($user);

        return redirect('admin/user');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::find($id);
        return view('admin.user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update($id, Request $request)
    // {
    //     $userUpdate = $request->all();
    //     $user = User::find($id);

    //     $user->update($userUpdate);
    //     return redirect('admin/user');
    // }

    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect('admin/user');
    }
}
