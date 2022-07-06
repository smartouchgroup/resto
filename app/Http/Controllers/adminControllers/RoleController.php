<?php

namespace App\Http\Controllers\adminControllers;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('admin.role.add-role', compact('roles'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     $request->validate(['label' => 'required']);
    //     $input = $request->all();
    //     Role::create($input);
    //     return redirect()->route('role.index')->with('success', 'Le rôle à été ajouté avec succes');
    // }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
        return view('admin.role.edit', compact('role'));
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
        $request->validate(['label' => 'required']);
        $input = $request->all();
        Role::find($id)->update($input);
        return redirect()->route('role.index')->with('success', 'Modification effectuée avec succès');
    }

    // public function changeStatus($id)
    // {
    //     $role = Role::find($id);
    //     $isUpdated = $role->update([
    //         'status' => 0
    //     ]);

    //     if($isUpdated) return 'Role is updated!';
    // }
}
