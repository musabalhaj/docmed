<?php
 
namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Bank;
use Illuminate\Http\Request;
use App\Http\Requests\Branch\CreateBranchRequest;
use App\Http\Requests\Branch\UpdateBranchRequest;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin/Branch.index')
        ->with('Branch',Branch::all())
        ->with('Banks',Bank::all());
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
    public function store(CreateBranchRequest $request ,Branch $Branch)
    {
        $Branch->create(request(['name','bank_id']));
        
        session()->flash('success','Added Successfully');
        
        return redirect(route('Branch.index')); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function show(Branch $branch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function edit(Branch $Branch)
    {
        return view('Admin/Branch.edit')
        ->with('Branch',$Branch)
        ->with('Banks',Bank::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBranchRequest $request, Branch $Branch)
    {
        $Branch->update(request(['name','bank_id']));

        session()->flash('success','Updated Successfully');
        
        return redirect(route('Branch.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Branch $Branch)
    {
        // if($Branch->Account->count() > 0){
        //     session()->flash('error','Delete Accounts That Connected With The Branch Frist');
        //     return redirect()->back();
        // }

        $Branch->delete();

        session()->flash('success','Deleted Successfully');
        
        return redirect(route('Branch.index'));
    }
}
