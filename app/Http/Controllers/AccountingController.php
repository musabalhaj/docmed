<?php
 
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Accounting;
use App\Models\BloodSymbol;
use App\Models\MaritalStatus;
use App\Models\Gender;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\Accounting\CreateAccountingRequest;
use App\Http\Requests\Accounting\UpdateAccountingRequest;

class AccountingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Accounting = DB::table('users')->where('role',5)->get();           
        return view('Admin/Accounting.index')
        ->with('Accountings',$Accounting)
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
        return view('Admin/Accounting.create')
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
    public function store(CreateAccountingRequest $request , User $Accounting)
    {
        $Accounting->create([
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
            'role'=>5
            ]);

        session()->flash('success','Added Successfully');
        
        return redirect(route('Accounting.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Accounting  $Accounting
     * @return \Illuminate\Http\Response
     */
    public function show(User $Accounting)
    {
        return view('Admin/Accounting.show')
        ->with('Accounting',$Accounting)
        ->with('Gender',Gender::all())
        ->with('MaritalStatus',MaritalStatus::all())
        ->with('BloodSymbol',BloodSymbol::all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Accounting  $Accounting
     * @return \Illuminate\Http\Response
     */
    public function edit(User $Accounting)
    {
        return view('Admin/Accounting.edit')
        ->with('Accounting' , $Accounting)
        ->with('Genderes',Gender::all())
        ->with('MaritalStatus',MaritalStatus::all())
        ->with('BloodSymbol',BloodSymbol::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Accounting  $Accounting
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAccountingRequest $request, User $Accounting)
    {
        $Accounting->update(request(['name','address', 'identity_type', 'identity_number','email',
        'phone','maritalstatus_id','bloodsymbol_id','gender_id']));
        
        session()->flash('success','Updated Successfully');
        
        return redirect(route('Accounting.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Accounting  $Accounting
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $Accounting)
    {
        $Accounting->delete();

        session()->flash('success','Deleted Successfully');
        
        return redirect(route('Accounting.index'));
    }
}
