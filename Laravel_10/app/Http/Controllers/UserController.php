<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $email = User::where('email', $request->email)->first();

        if ($email) {
            return back()->with('alert', 'Your email alerdy exist,check your email!!');
        }

        $data = [
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];

        $user = User::create($data);

        Auth::login($user);

        return redirect('timeline');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }

    public function login(Request $request)
    {

        // dd($request->input());
        $email = User::where('email', $request->email)->first();
        if (!$email) {
            return back()->with('alert', 'Your email incorret,check your email!!');
        }

        if (!Hash::check($request->password, $email->password)) {
            return back()->with('alert', 'Your password incorret,check your password!!');
        }

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('timeline');
        } else {
            return back();
        }
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
