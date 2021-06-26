<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pharmacy;
use App\Models\BloodSymbol;
use App\Models\MaritalStatus;
use App\Models\Gender;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\Pharmacy\CreatePharmacyRequest;
use App\Http\Requests\Pharmacy\UpdatePharmacyRequest;

class PharmacyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Pharmacy = DB::table('users')->where('role',4)->get();   
        return view('Admin/Pharmacy.index')
        ->with('Pharmacys',$Pharmacy)
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
        return view('Admin/Pharmacy.create')
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
    public function store(CreatePharmacyRequest $request , User $Pharmacy)
    {
        $Pharmacy->create([
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
            'role'=>4
            ]);

        session()->flash('success','Added Successfully');
        
        return redirect(route('Pharmacy.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pharmacy  $Pharmacy
     * @return \Illuminate\Http\Response
     */
    public function show(User $Pharmacy)
    {
        return view('Admin/Pharmacy.show')
        ->with('Pharmacy',$Pharmacy)
        ->with('Gender',Gender::all())
        ->with('MaritalStatus',MaritalStatus::all())
        ->with('BloodSymbol',BloodSymbol::all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pharmacy  $Pharmacy
     * @return \Illuminate\Http\Response
     */
    public function edit(User $Pharmacy)
    {
        return view('Admin/Pharmacy.edit')
        ->with('Pharmacy' , $Pharmacy)
        ->with('Genderes',Gender::all())
        ->with('MaritalStatus',MaritalStatus::all())
        ->with('BloodSymbol',BloodSymbol::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pharmacy  $Pharmacy
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePharmacyRequest $request, User $Pharmacy)
    {
        $Pharmacy->update(request(['name','address', 'identity_type', 'identity_number','email',
        'phone','maritalstatus_id','bloodsymbol_id','gender_id']));
        
        session()->flash('success','Updated Successfully');
        
        return redirect(route('Pharmacy.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pharmacy  $Pharmacy
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $Pharmacy)
    {
        $Pharmacy->delete();

        session()->flash('success','Deleted Successfully');
        
        return redirect(route('Pharmacy.index'));
    }
}
