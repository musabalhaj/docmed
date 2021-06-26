<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Reception;
use App\Models\BloodSymbol;
use App\Models\MaritalStatus;
use App\Models\Gender;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\Reception\CreateReceptionRequest;
use App\Http\Requests\Reception\UpdateReceptionRequest;

class ReceptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Reception = DB::table('users')->where('role',6)->get();  
        return view('Admin/Reception.index')
        ->with('Receptions',$Reception)
        ->with('Gender',Gender::all())
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
        return view('Admin/Reception.create')
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
    public function store(CreateReceptionRequest $request , User $Reception)
    {
        $Reception->create([
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
            'role'=>6
            ]);

        session()->flash('success','Added Successfully');
        
        return redirect(route('Reception.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reception  $Reception
     * @return \Illuminate\Http\Response
     */
    public function show(User $Reception)
    {
        return view('Admin/Reception.show')
        ->with('Reception',$Reception)
        ->with('Gender',Gender::all())
        ->with('MaritalStatus',MaritalStatus::all())
        ->with('BloodSymbol',BloodSymbol::all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reception  $Reception
     * @return \Illuminate\Http\Response
     */
    public function edit(User $Reception)
    {
        return view('Admin/Reception.edit')
        ->with('Reception' , $Reception)
        ->with('Genderes',Gender::all())
        ->with('MaritalStatus',MaritalStatus::all())
        ->with('BloodSymbol',BloodSymbol::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reception  $Reception
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReceptionRequest $request, User $Reception)
    {
        $Reception->update(request(['name','address', 'identity_type', 'identity_number','email',
        'phone','maritalstatus_id','bloodsymbol_id','gender_id']));
        
        session()->flash('success','Updated Successfully');
        
        return redirect(route('Reception.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reception  $Reception
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $Reception)
    {
        $Reception->delete();

        session()->flash('success','Deleted Successfully');
        
        return redirect(route('Reception.index'));
    }
}
