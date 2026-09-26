<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users=User::all();
        return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         User::create([
             'name'=>$request->name,
             'email'=>$request->email,
             'password'=>$request->password,
             'role'=>$request->role
        ]);
        return redirect()->route('users.index')->with('success','کاربر با موفقیت ایجاد شد');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
      return view('users.edit',compact('user'))  ;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user=User::findOrFail($id);
        $user->update([
           'name'=>$request->name,
             'email'=>$request->email,
             'role'=>$request->role 
        ]);
        if ($request->filled('password')) {
        $user->update([
            'password' => $request->password
        ]);
    }
        return redirect()->route('users.index')->with('success','کاربر با موفقیت تغییر یافت');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success','کاربر با موفقیت حذف شد');
    }
}
