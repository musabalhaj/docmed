<?php
 
namespace App\Http\Controllers;

use App\Models\Gender;
use Illuminate\Http\Request;
use App\Http\Requests\Gender\CreateGenderRequest;
use App\Http\Requests\Gender\UpdateGenderRequest;

class GenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin/Gender.index')->with('Gender',Gender::all()->sortByDesc('id'));
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
    public function store(CreateGenderRequest $request , Gender $Gender)
    {
        $Gender->create(request(['name']));
        
        session()->flash('success','Added Successfully');
        
        return redirect(route('Gender.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gender  $gender
     * @return \Illuminate\Http\Response
     */
    public function show(Gender $gender)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gender  $gender
     * @return \Illuminate\Http\Response
     */
    public function edit(Gender $Gender)
    {
        return view('Admin/Gender.edit')->with('Gender',$Gender);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gender  $gender
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGenderRequest $request, Gender $Gender)
    {
        $Gender->update(request(['name']));
        
        session()->flash('success','Updated Successfully');
        
        return redirect(route('Gender.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gender  $gender
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gender $Gender)
    {
        $Gender->delete();

        session()->flash('success','Deleted Successfully');
        
        return redirect(route('Gender.index'));
    }
}
