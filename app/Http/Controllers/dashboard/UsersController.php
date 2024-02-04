<?php

namespace App\Http\Controllers\dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::get();
        return view('dashboard.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.users.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $userValidation = $request->validated();
        $user['password'] = Hash::make($request['password']);
        $user = User::create(['name' => $userValidation['name'],
        'email' => $userValidation['email'],
        'username' => $userValidation['username'],
        'password' => Hash::make($userValidation['password']),
        'email_verified_at' =>Carbon::now(),

       ] );
    
       $user->markEmailAsVerified();
        return redirect()->route('dashboard.users.index')->with('success', 'Operation Successfully');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        Hash::make($user['password']);
        return view('dashboard.users.edit', compact('user'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id)
    {
        // dd(Hash::make($request->password));
        $user = $request->validated();
        $status =isset($request->is_active);
        $user['is_active'] = $status;
        User::where('id', $id)->update($user);

        return redirect()->route('dashboard.users.index')->with('success', 'Operation Successfully');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    
}
