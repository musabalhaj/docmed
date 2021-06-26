<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use App\Models\Gender;
use App\Models\MaritalStatus;
use App\Models\BloodSymbol;
use App\Models\Jop;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Employee\CreateEmployeeRequest;
use App\Http\Requests\Employee\UpdateEmployeeRequest;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Employees = DB::table('users')->where('role',7)->get();
        return view('Admin/Employee.index')
        ->with('Employees',$Employees)
        ->with('Gender',Gender::all())
        ->with('Jop',Jop::all())
        ->with('MaritalStatus',MaritalStatus::all())
        ->with('BloodSymbol',BloodSymbol::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Jop = DB::table('jops')->where('status',1)->get(); 
        return view('Admin/Employee.create')
        ->with('Genderes',Gender::all())
        ->with('Jop',$Jop)
        ->with('MaritalStatus',MaritalStatus::all())
        ->with('BloodSymbol',BloodSymbol::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateEmployeeRequest $request , User $Employee)
    {

        $Employee->create([
            'name'=>$request->name,
            'address'=>$request->address,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'identity_type'=>$request->identity_type,
            'identity_number'=>$request->identity_number,
            'jop_id'=>$request->jop_id,
            'maritalstatus_id'=>$request->maritalstatus_id,
            'bloodsymbol_id'=>$request->bloodsymbol_id,
            'gender_id'=>$request->gender_id,
            'role'=>7
            ]);

        session()->flash('success','Added Successfully');
        
        return redirect(route('Employee.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(User $Employee)
    {
        return view('Admin/Employee.show')
        ->with('Employee',$Employee)
        ->with('Gender',Gender::all())
        ->with('Jop',Jop::all())
        ->with('MaritalStatus',MaritalStatus::all())
        ->with('BloodSymbol',BloodSymbol::all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(User $Employee)
    {
        $Jop = DB::table('jops')->where('status',1)->get(); 
        return view('Admin/Employee.edit')
        ->with('Employee',$Employee)
        ->with('Genderes',Gender::all())
        ->with('Jop',$Jop)
        ->with('MaritalStatus',MaritalStatus::all())
        ->with('BloodSymbol',BloodSymbol::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeeRequest $request, User $Employee)
    {
        $Employee->update(request(['name','address','identity_type','identity_number','email','phone',
                                   'maritalstatus_id','bloodsymbol_id','gender_id','jop_id']));
        
        session()->flash('success','Updated Successfully');
        
        return redirect(route('Employee.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $Employee)
    {
        $Employee->delete();

        session()->flash('success','Employee Deleted Successfully');
        
        return redirect(route('Employee.index'));
    }
}
