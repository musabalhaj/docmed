<?php
 
namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Department\CreateDepartmentRequest;
use App\Http\Requests\Department\UpdateDepartmentRequest;
class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin/Department.index')
        ->with('Departments' ,Department::all());
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
    public function store(CreateDepartmentRequest $request , Department $Department)
    {
        $Department->create(request(['name']));

        session()->flash('success','Added Successfully');
        
        return redirect(route('Department.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $Department)
    {
        return view('Admin/Department.edit')->with('Department',$Department);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDepartmentRequest $request, Department $Department)
    {
        $Department->update(request(['name']));

        session()->flash('success','Updated Successfully');
        
        return redirect(route('Department.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $Department)
    {
        $Department->delete();

        session()->flash('success','Deleted Successfully');
        
        return redirect(route('Department.index'));
    }

    public function ActiveDepartment($id)
    {

        DB::table('departments')->where('id',$id)->update(['status'=> '1']);
        
        session()->flash('success','Activeted Successfully');
        
        return redirect()->back();

    }

    public function InActiveDepartment($id)
    {

        DB::table('departments')->where('id',$id)->update(['status'=> '0']);
        
        session()->flash('success','InActiveted Successfully');
        
        return redirect()->back();

    }
}
