<?php

namespace App\Http\Controllers;

use App\Models\AuthenticationController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthenticationControllerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if (Auth::check()) {
            $id = Auth::user()->getId();
            $user = User::findOrFail($id);
            return response()->view('dashboard.category.index', ['user' => $user]);
        } else {
            return redirect()->route('login')->with([
                'message' => 'These credentials do not match our records.',
                'alert-type' => 'danger'
            ]);
        }
    }
    public function home()
    {
        //
        if (Auth::check()) {
            $id = Auth::user()->getId();
            $user = User::findOrFail($id);
            return response()->view('dashboard.category.index', ['user' => $user]);
        } else {
            return redirect()->route('login')->with([
                'message' => 'These credentials do not match our records.',
                'alert-type' => 'danger'
            ]);
        }

    }
    public function dailys()
    {
        //
        if (Auth::check()) {
            $id = Auth::user()->getId();
            $user = User::findOrFail($id);
            return response()->view('dashboard.pages.dailys.daily', ['user' => $user]);
        } else {
            return redirect()->route('login')->with([
                'message' => 'These credentials do not match our records.',
                'alert-type' => 'danger'
            ]);
        }


    }
    public function dologin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'login_id' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if (filter_var($request->login_id, FILTER_VALIDATE_EMAIL)) {
            $user_id = 'email';
        } elseif (filter_var((int) $request->login_id, FILTER_VALIDATE_INT)) {
            $user_id = 'mobile';
        } else {
            $user_id = 'username';
        }

        $request->merge([
            $user_id => $request->login_id
        ]);

        if (Auth::attempt($request->only($user_id, 'password'), $request->filled('remember'))) {
            return redirect()->route('home')->with([
                'message' => 'logged in successfully',
                'alert-type' => 'success'
            ]);
        } else {
            return redirect()->route('login')->with([
                'message' => 'These credentials do not match our records.',
                'alert-type' => 'danger'
            ]);
        }
    }
    /**
     * log out.
     */
    public function dologout()
    {
        Auth::logout();
        return redirect()->route('login')->with([
            'message' => 'logged Out successfully',
            'alert-type' => 'success'
        ]);
    }
    /**
     * creating a new User.
     */
    public function registration()
    {
        return view('login.regist.registrat');
    }

    /**
     * creating a new User.
     */
    public function doregistration(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'mobile' => 'required|unique:users',
            'password' => 'required|confirmed',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data['name'] = $request->name;
        $data['username'] = $request->username;
        $data['email'] = $request->email;
        $data['mobile'] = $request->mobile;
        $data['password'] = bcrypt($request->password);

        User::create($data);

        return redirect()->route('login')->with([
            'message' => 'User created successfully',
            'alert-type' => 'success'
        ]);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(AuthenticationController $authenticationController)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AuthenticationController $authenticationController)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AuthenticationController $authenticationController)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AuthenticationController $authenticationController)
    {
        //
    }
}