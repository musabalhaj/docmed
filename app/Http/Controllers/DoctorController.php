<?php
 
namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\User;
use App\Models\BloodSymbol;
use App\Models\MaritalStatus;
use App\Models\Gender;
use App\Models\Department;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\Doctor\CreateDoctorRequest;
use App\Http\Requests\Doctor\UpdateDoctorRequest;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        $Doctor = DB::table('users')->where('role',2)->get(); 
        return view('Admin/Doctor.index')
        ->with('Doctors',$Doctor)
        ->with('Gender',Gender::all())
        ->with('MaritalStatus',MaritalStatus::all())
        ->with('BloodSymbol',BloodSymbol::all())
        ->with('Department',Department::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Department = DB::table('departments')->where('status',1)->get();
        return view('admin/Doctor.create')
        ->with('Genderes',Gender::all())
        ->with('MaritalStatus',MaritalStatus::all())
        ->with('BloodSymbol',BloodSymbol::all())
        ->with('Department',$Department);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateDoctorRequest $request , User $Doctor)
    {

        $Doctor->create([
            'name'=>$request->name,
            'address'=>$request->address,
            'email'=>$request->email,
            'password'=> Hash::make($request->password),
            'phone'=>$request->phone,
            'identity_type'=>$request->identity_type,
            'identity_number'=>$request->identity_number,
            'department_id'=>$request->department_id,
            'maritalstatus_id'=>$request->maritalstatus_id,
            'bloodsymbol_id'=>$request->bloodsymbol_id,
            'gender_id'=>$request->gender_id,
            'doctor_price'=>$request->doctor_price,
            'role'=>2
            ]);

        session()->flash('success','Added Successfully');
        
        return redirect(route('Doctor.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(User $Doctor)
    {
        return view('Admin/Doctor.show')
        ->with('Doctor',$Doctor)
        ->with('Gender',Gender::all())
        ->with('MaritalStatus',MaritalStatus::all())
        ->with('BloodSymbol',BloodSymbol::all())
        ->with('Department',Department::all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(User $Doctor)
    {
        $Department = DB::table('departments')->where('status',1)->get();
        return view('Admin/Doctor.edit')
        ->with('Doctor' , $Doctor)
        ->with('Genderes',Gender::all())
        ->with('MaritalStatus',MaritalStatus::all())
        ->with('BloodSymbol',BloodSymbol::all())
        ->with('Department',$Department);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDoctorRequest $request, User $Doctor)
    {
        $Doctor->update(request(['name','address', 'identity_type', 'identity_number','department_id',
                                 'email','phone','maritalstatus_id','bloodsymbol_id','gender_id','doctor_price']));
        
        session()->flash('success','Updated Successfully');
        
        return redirect(route('Doctor.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $Doctor)
    {
        $Doctor->delete();

        session()->flash('success','Deleted Successfully');
        
        return redirect(route('Doctor.index'));
    }
}
