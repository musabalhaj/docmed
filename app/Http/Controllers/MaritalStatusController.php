<?php

namespace App\Http\Controllers;

use App\Models\MaritalStatus;
use Illuminate\Http\Request;
use App\Http\Requests\MaritalStatus\CreateMaritalStatusRequest;
use App\Http\Requests\MaritalStatus\UpdateMaritalStatusRequest;

class MaritalStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin/MaritalStatus.index')
        ->with('MaritalStatus',MaritalStatus::all()->sortByDesc('id'));
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
    public function store(CreateMaritalStatusRequest $request ,MaritalStatus $MaritalStatus)
    {
        $MaritalStatus->create(request(['name']));

        session()->flash('success','Added Successfully');
        
        return redirect(route('MaritalStatus.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MaritalStatus  $maritalStatus
     * @return \Illuminate\Http\Response
     */
    public function show(MaritalStatus $maritalStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MaritalStatus  $maritalStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(MaritalStatus $MaritalStatus)
    {
        return view('Admin/MaritalStatus.edit')->with('MaritalStatus',$MaritalStatus);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MaritalStatus  $maritalStatus
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMaritalStatusRequest $request, MaritalStatus $MaritalStatus)
    {
        $MaritalStatus->update(request(['name']));

        session()->flash('success','Updated Successfully');
        
        return redirect(route('MaritalStatus.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MaritalStatus  $maritalStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(MaritalStatus $MaritalStatus)
    {   
        $MaritalStatus->delete();

        session()->flash('success','Deleted Successfully');
        
        return redirect(route('MaritalStatus.index'));
    }
}
