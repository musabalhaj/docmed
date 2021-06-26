<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Laboratory;
use App\Models\BloodSymbol;
use App\Models\MaritalStatus;
use App\Models\Gender;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\Laboratory\CreateLaboratoryRequest;
use App\Http\Requests\Laboratory\UpdateLaboratoryRequest;

class LaboratoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Laboratory = DB::table('users')->where('role',3)->get();           
        return view('Admin/Laboratory.index')
        ->with('Laboratorys',$Laboratory)
        ->with('Genderes',Gender::all())
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
        return view('Admin/Laboratory.create')
        ->with('Genderes',Gender::all())
        ->with('MaritalStatus',MaritalStatus::all())
        ->with('BloodSymbol',BloodSymbol::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateLaboratoryRequest $request , User $Laboratory)
    {
        $Laboratory->create([
            'name'=>$request->name,
            'address'=>$request->address,
            'email'=>$request->email,
            'password'=> Hash::make($request->password),
            'phone'=>$request->phone,
            'identity_type'=>$request->identity_type,
            'identity_number'=>$request->identity_number,
            'maritalstatus_id'=>$request->maritalstatus_id,
            'bloodsymbol_id'=>$request->bloodsymbol_id,
            'gender_id'=>$request->gender_id,
            'role'=>3
            ]);

        session()->flash('success','Added Successfully');
        
        return redirect(route('Laboratory.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Laboratory  $Laboratory
     * @return \Illuminate\Http\Response
     */
    public function show(User $Laboratory)
    {
        return view('Admin/Laboratory.show')
        ->with('Laboratory',$Laboratory)
        ->with('Gender',Gender::all())
        ->with('MaritalStatus',MaritalStatus::all())
        ->with('BloodSymbol',BloodSymbol::all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Laboratory  $Laboratory
     * @return \Illuminate\Http\Response
     */
    public function edit(User $Laboratory)
    {
        return view('Admin/Laboratory.edit')
        ->with('Laboratory' , $Laboratory)
        ->with('Genderes',Gender::all())
        ->with('MaritalStatus',MaritalStatus::all())
        ->with('BloodSymbol',BloodSymbol::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Laboratory  $Laboratory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLaboratoryRequest $request, User $Laboratory)
    {
        $Laboratory->update(request(['name','address', 'identity_type', 'identity_number','email',
        'phone','maritalstatus_id','bloodsymbol_id','gender_id']));
        
        session()->flash('success','Updated Successfully');
        
        return redirect(route('Laboratory.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Laboratory  $Laboratory
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $Laboratory)
    {
        $Laboratory->delete();

        session()->flash('success','Deleted Successfully');
        
        return redirect(route('Laboratory.index'));
    }
}
