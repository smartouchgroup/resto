<?php

namespace App\Http\Controllers\adminControllers;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Employee;
use App\Models\Group;
use App\Models\Organization;
use App\Models\Restaurant;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function index()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials) && in_array(auth()->user()->roleId, [1, 2])) {
            $request->session()->regenerate();
            return redirect()->route('admin.home');
        }

        return redirect()->back()->with('error', 'Email ou mot de passe incorrect!');
    }

    public function home()
    {
        $roles = Role::all()->first();
        $organizations = Organization::paginate(5);
        $groupsNumber = count(Group::all());
        $employeesNumber = count(Employee::all());
        $restaurants = Restaurant::paginate(5);
        $getAllAmount = Account::sum('amount');
        return view('admin.home',compact('roles', 'organizations', 'groupsNumber', 'employeesNumber', 'restaurants','getAllAmount'));
    }

    public function profile(){
        return view('admin.profile.index');
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }

    public function changeAdminName (Request $request)
    {
        $request->validate([
            'firstname' => 'required'
        ]);

        Auth::user()->update([
            'firstname' => $request->firstname,
        ]);
        return back()->with('success', 'Information changé avec succes');
    }

    public function changeAdminPhone(Request $request)
    {
        $request->validate([
            'phone' => 'required'
        ]);

        Auth::user()->update([
            'phone' => $request->phone,
        ]);
        return back()->with('success', 'Numéro changé avec succes');
    }

    public function changeAdminEmail(Request $request)
    {
        $request->validate([
            'email' => 'required'
        ]);

        Auth::user()->update([
            'email' => $request->email,
        ]);
        return back()->with('success', 'Email changé avec succes');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'password' => 'string|required',
            'confirm_password' => 'string|required|same:password'
        ]);
        Auth::user()->update([
            'password' => Hash::make($request->password),
            'updated_at' => auth()->user()->updated_at
        ]);
        return back()->with('success', 'Mot de passe  changé avec succes Vos pouvez désormais vous connecter avec votre nouveau mot de passe');
    }

    public function changeData(Request $request)
    {
        $request->validate([
            'firstname' => 'string|required',
            'lastname' => 'string|required|'
        ]);
        Auth::user()->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname
        ]);
        return back()->with('success', 'Mot de passe  changé avec succes Vos pouvez désormais vous connecter avec votre nouveau mot de passe');
    }
}

