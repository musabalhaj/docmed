<?php

namespace App\Http\Controllers;

use App\Models\BloodSymbol;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Requests\BloodSymbol\CreateBloodSymbolRequest;
use App\Http\Requests\BloodSymbol\UpdateBloodSymbolRequest;

class BloodSymbolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin/BloodSymbol.index')
        ->with('BloodSymbols',BloodSymbol::all()->sortByDesc('id'));
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
    public function store(CreateBloodSymbolRequest $request ,BloodSymbol $BloodSymbol)
    {
        $BloodSymbol->create(request(['name']));
        
        session()->flash('success','Added Successfully');
        
        return redirect(route('BloodSymbol.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\BloodSymbol  $bloodSymbol
     * @return \Illuminate\Http\Response
     */
    public function show(BloodSymbol $bloodSymbol)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\BloodSymbol  $bloodSymbol
     * @return \Illuminate\Http\Response
     */
    public function edit(BloodSymbol $BloodSymbol)
    {
        return view('Admin/BloodSymbol.edit')->with('BloodSymbol',$BloodSymbol);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\BloodSymbol  $bloodSymbol
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBloodSymbolRequest $request, BloodSymbol $BloodSymbol)
    {
        $BloodSymbol->update(request(['name']));
        
        session()->flash('success','Updated Successfully');
        
        return redirect(route('BloodSymbol.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\BloodSymbol  $bloodSymbol
     * @return \Illuminate\Http\Response
     */
    public function destroy(BloodSymbol $BloodSymbol)
    {
        $BloodSymbol->delete();

        session()->flash('success','Deleted Successfully');
        
        return redirect(route('BloodSymbol.index'));
    }
}
