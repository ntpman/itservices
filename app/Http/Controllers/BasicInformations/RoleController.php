<?php

namespace App\Http\Controllers\BasicInformations;

use App\Http\Controllers\Controller;
use App\Model\BasicInformations\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    } 
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allRole = Role::all();
        return view('admin.basic_informations.roles.index',['showAllRole' => $allRole]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.basic_informations.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate unique data
        $this->validate($request,[
            'roleName' => 'required|unique:roles,role_name'
        ]);

        //Insert new data
        $insertRole = new Role;
        $insertRole->role_name = $request->input('roleName');
        $insertRole->role_status = 'A';
        $insertRole->save();

        //Retuen index view
        return redirect('/roleList');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\BasicInformations\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\BasicInformations\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editRole = Role::find($id);
        return view('admin.basic_informations.roles.edit')->with('editRole', $editRole);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\BasicInformations\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validate data before update 

        $updateRole = Role::find($id);
        $updateRole->role_name = $request->input('roleName');
        $updateRole->role_status = $request->input('roleStatus');
        $updateRole->save();

        //redirect to index
        return redirect('roleList');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\BasicInformations\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
    }
}
