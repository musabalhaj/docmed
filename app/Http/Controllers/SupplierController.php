<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\Supplier\CreateSupplierRequest;
use App\Http\Requests\Supplier\UpdateSupplierRequest;
class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Accounting/Supplier.index')
        ->with('Suppliers' ,Supplier::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Accounting/Supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSupplierRequest $request , Supplier $Supplier)
    {
        $Supplier->create([
            'name'=>$request->name,
            'email'=>$request->email,
            'address'=>$request->address,
            'phone'=>$request->phone
            ]);

        session()->flash('success' , 'Added Successfully');

        return redirect(route('Supplier.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supplier  $Supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $Supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supplier  $Supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $Supplier)
    {
        return view('Accounting/Supplier.edit')->with('Supplier' , $Supplier);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $Supplier
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSupplierRequest $request, Supplier $Supplier)
    {
        $Supplier->update(request(['name', 'email' , 'address' , 'phone' ]));
        
        session()->flash('success' , 'Updated Successfully');

        return redirect(route('Supplier.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $Supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $Supplier)
    {
        $Supplier->delete();

        session()->flash('success' , 'Deleted Successfully');

        return redirect(route('Supplier.index'));
    }
    public function ActiveSupplier($id)
    {

        DB::table('suppliers')->where('id',$id)->update(['status'=> '1']);
        
        session()->flash('success','Activeted Successfully');
        
        return redirect()->back();

    }

    public function InActiveSupplier($id)
    {

        DB::table('suppliers')->where('id',$id)->update(['status'=> '0']);
        
        session()->flash('success','InActiveted Successfully');
        
        return redirect()->back();

    }
}
