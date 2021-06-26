<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use Illuminate\Http\Request;
use App\Http\Requests\Category\CreateCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;

class CatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Accounting/Cat.index')->with('Cat',Cat::all());
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
    public function store(CreateCategoryRequest $request , Cat $Cat)
    {
        $Cat->create(request(['name','type']));

        session()->flash('success','Added Successfully');
        
        return redirect(route('Cat.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cat  $Cat
     * @return \Illuminate\Http\Response
     */
    public function show(Cat $Cat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cat  $Cat
     * @return \Illuminate\Http\Response
     */
    public function edit(Cat $Cat)
    {
        return view('Accounting/Cat.edit')->with('Cat',$Cat);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cat  $Cat
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Cat $Cat)
    {
        $Cat->update(request(['name','type']));

        session()->flash('success','Updated Successfully');
        
        return redirect(route('Cat.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cat  $Cat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cat $Cat)
    {
        $Cat->delete();

        session()->flash('success','Deleted Successfully');
        
        return redirect(route('Cat.index'));
    }
}
