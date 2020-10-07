<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;

use App\Model\BasicInformations\Role;
use App\Model\BasicInformations\Region;
use App\Model\BasicInformations\Agency;

use App\Helpers\LogActivity;

class EmployeeController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    public function showRegisterEmployee () {

        // get user where role_id = 3 (employee)
        $registerEmployee = User::where('role_id',3)
                                ->where('email', 'not like', "%dss.go.th%")
                                ->where('status', 'A')
                                ->orderBy('user_code','asc')
                                ->get();

        return view ('bsti_admin.employees.register-employees',[
            'showRegisterEmployee' => $registerEmployee]);
    }

    public function showLoginEmployee () {
        // get user where remember token is not null
        $loginEmployee = User::whereNotNull('remember_token')
                                ->where('role_id',3)
                                ->where('status', 'A')
                                ->where('email', 'not like', "%dss.go.th%")
                                ->get();
        return view ('bsti_admin.employees.login-employees', ['showLoginEmployee' => $loginEmployee]);
    }

    public function showUnloginEmployee () {
        // get user where remember token is null
        $unloginEmployee = User::whereNull('remember_token')
                                ->where('role_id',3)
                                ->where('status', 'A')
                                ->where('email', 'not like', "%dss.go.th%")
                                ->get();
        return view ('bsti_admin.employees.unlogin-employees', ['showUnloginEmployee' => $unloginEmployee]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $viewAllRegisterEmployee = User::where('role_id','not like', "1")
                                    ->get();
        return view('bsti_admin.employees.view-register-employees', ['viewAllRegisterEmployee' => $viewAllRegisterEmployee]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $region = Region::where('region_status', 'A')->get();
        
        $editRegisterEmployee = User::find($id);
        return view('bsti_admin.employees.edit-register-employees', ['editRegisterEmployee' => $editRegisterEmployee,'allRegion' =>$region]);
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
        $updateRegisterEmployee = User::find($id);
        $updateRegisterEmployee->user_code = $request->input('userCode');
        $updateRegisterEmployee->name = $request->input('userName');
        $updateRegisterEmployee->email = $request->input('userEmail');
        $updateRegisterEmployee->region_id = $request->input('userRegion');
        $updateRegisterEmployee->status = $request->input('userStatus');
        $updateRegisterEmployee->save();

        // กลับหน้าเดิมก่อนกดปุ่ม (edit-register-employees)
        // return back();

        // กลับไปที่หน้าดูข้อมูลทั้งหมด
        return redirect('viewRegisterEmployee');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
