<?php
  
namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Branch;
use Illuminate\Http\Request;
use App\Http\Requests\Bank\CreateBankRequest;
use App\Http\Requests\Bank\UpdateBankRequest;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin/Bank.index')->with('Bank',Bank::all());
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
    public function store(CreateBankRequest $request ,Bank $Bank)
    {
        $Bank->create(request(['name']));
        
        session()->flash('success','Added Successfully');
        
        return redirect(route('Bank.index')); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function show(Bank $bank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function edit(Bank $Bank)
    {
        return view('Admin/Bank.edit')->with('Bank',$Bank);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBankRequest $request, Bank $Bank)
    {
        $Bank->update(request(['name']));

        session()->flash('success','Updated Successfully');
        
        return redirect(route('Bank.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bank $Bank)
    {
        $Bank->delete();

        session()->flash('success','Deleted Successfully');
        
        return redirect(route('Bank.index'));
    }
}
