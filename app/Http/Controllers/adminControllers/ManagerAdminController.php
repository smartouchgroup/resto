<?php

namespace App\Http\Controllers\adminControllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\ManagerAdded;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ManagerAdminController extends Controller
{
    public function index(){
        $managers = User::where('roleId',2)->latest()->paginate(5);
        return view('admin.management.index',compact('managers'));
    }
    public function addManager(Request $request){
        $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email','unique:users'],
            'phone' => ['required ','integer','min:8','unique:users,phone'],
        ]);
        $input = $request->all([
            'firstname',
            'lastname',
            'email',
            'phone'
        ]);
        $password = substr(str_shuffle(Hash::make(Str::random(10))) , 0, 15);
        $input['password'] = Hash::make($password);
        $additionalInput = [
            'roleId' => 2,
            'uuid' => Str::uuid(),
        ];
        foreach ($additionalInput as $key => $value) {
            $input[$key] = $value;
        }
        $manager = User::create($input);

        event(new ManagerAdded($manager, $password));
        return back()->with('success','Ajout effectué avec succès');
    }
    public function desactivate($id){
        $user = User::find($id);
        $user->update([
            'status'=> 0
        ]);
        return back();
    }
    public function activate($id){
        $manager = User::find($id);
        $manager->update([
            'status'=> 1
        ]);
        return back();
    }
    public function removeManager ($id){
        $manager = User::find($id);
        $manager->delete();
        return back()->with('success', 'Suppression effectuée avec succès');
    }
}
