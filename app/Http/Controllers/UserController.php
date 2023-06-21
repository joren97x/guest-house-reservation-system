<?php

namespace App\Http\Controllers;

use App\Models\GuestHouses;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //
    public function create() {
        return view('users.register');
    }

    public function login() {
        return view('users.login');
    }

    public function logout(Request $request) {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You logged out?');
    }

    public function store(Request $request) {
        $form = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:6'],
        ]);
        //hash password
        $form['role'] = 'user';
        $form['password'] = bcrypt($form['password']);
        
        $user = User::create($form);
        $user->profile_pic = "default_profile.png";
        $user->save();
        auth()->login($user);
        return redirect('/')->with('message', 'Created and logged in successfully');
    }

    public function show() {


        return view('users.edit');
    }

    public function index() {
        $users = User::get();

        return view('users.index', ['users' => $users]);
    }

    public function delete(Request $request) {
        $user = User::find($request->id);
        $user->delete();
        return response()->json(['response' => 'HELLO GIATAY!', 'id' => $request->all()]);
    }

    public function authenticate(Request $request) {
        $form = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if(auth()->attempt($form)) {
            $request->session()->regenerate();
            return redirect('/')->with('message', 'You are now logged in!');
        }
        else {
            return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
        }
    }

    public function update_name(Request $request) {
        
        $user = User::find(auth()->user()->id);
        $user->name = $request->name;
        $user->save();
        return back()->with('message', 'Successfully changed name!');
    }

    public function update_email(Request $request) {
        $user = User::find(auth()->user()->id);

        $request->validate([
            'email' => ['required', 'email', Rule::unique('users', 'email')]
        ]);

        $user->email = $request->email;
        $user->save();
        return back()->with('message', 'Successfully changed email!');
    }

    public function add_profile_pic(Request $request) {

        $user = User::find(auth()->user()->id);
        $user->profile_pic = $request->profile_pic;
        $user->save();
        return back()->with('message', 'Succesfully changed profile pic!');
    }

    public function add_phone(Request $request) {
        $user = User::find(auth()->user()->id);
        $user->contact_no = $request->contact_no;
        $user->save();
        return back()->with('message', 'Successfully added contact number!');
    }

    // public function update_phone(Request $request) {
    //     $user = User::find(auth()->user()->id);
    //     $user->contact_no = $request->
    // }

    public function add_address(Request $request) {
        $user = User::find(auth()->user()->id);
        $user->address = $request->address;
        $user->save();
        return back()->with('message', 'Successfully added Address');
    }

    // public function update_address(Request $request) {
    //     $user = User::find(auth()->user()->id);

    // }

    

}
