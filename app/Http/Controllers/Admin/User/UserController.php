<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Mail\User\PasswordEmail;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();

        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = User::getRoles();
        return view('admin.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {

        $data = $request->validated();

        $password = Str::random(10);
        $data['password'] = Hash::make($password);

        $user = User::firstOrCreate($data);
        Mail::to($data['email'])->send(new PasswordEmail($password));
        event(new Registered($user));
        Auth::login($user);
        return redirect()->route('users.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('admin.users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = User::getRoles();

        return view('admin.users.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request,User $user)
    {
        $data = $request->validated();

        $user->update($data);

        return view('admin.users.show',compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index');
    }
}
