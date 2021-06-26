<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\Service\CreateServiceRequest;
use App\Http\Requests\Service\UpdateServiceRequest;
class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Laboratory/Test.index')
        ->with('Tests' ,Test::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Laboratory/Test.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateServiceRequest $request , Test $Test)
    {
        $Test->create([
            'name'=>$request->name,
            'description'=>$request->description,
            'price'=>$request->price
            ]);

        session()->flash('success' , 'Added Successfully');

        return redirect(route('Test.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Test  $Test
     * @return \Illuminate\Http\Response
     */
    public function show(Test $Test)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Test  $Test
     * @return \Illuminate\Http\Response
     */
    public function edit(Test $Test)
    {
        return view('Laboratory/Test.edit')->with('Test' , $Test);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Test  $Test
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateServiceRequest $request, Test $Test)
    {
        $Test->update(request(['name', 'description' , 'price']));
        
        session()->flash('success' , 'Updated Successfully');

        return redirect(route('Test.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Test  $Test
     * @return \Illuminate\Http\Response
     */
    public function destroy(Test $Test)
    {
        $Test->delete();

        session()->flash('success' , 'Deleted Successfully');

        return redirect(route('Test.index'));
    }
    public function ActiveTest($id)
    {

        DB::table('tests')->where('id',$id)->update(['status'=> '1']);
        
        session()->flash('success','Activeted Successfully');
        
        return redirect()->back();

    }

    public function InActiveTest($id)
    {

        DB::table('tests')->where('id',$id)->update(['status'=> '0']);
        
        session()->flash('success','InActiveted Successfully');
        
        return redirect()->back();

    }
}
