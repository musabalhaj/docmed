<?php
 
namespace App\Http\Controllers;

use App\Models\Jop;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\Jop\CreateJopRequest;
use App\Http\Requests\Jop\UpdateJopRequest;

class JopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin/Jop.index')
        ->with('Jops',Jop::all());
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
    public function store(CreateJopRequest $request , Jop $Jop)
    {
        $Jop->create(request(['name']));
        
        session()->flash('success','Added Successfully');
        
        return redirect(route('Jop.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jop  $jop
     * @return \Illuminate\Http\Response
     */
    public function show(Jop $jop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jop  $jop
     * @return \Illuminate\Http\Response
     */
    public function edit(Jop $Jop)
    {
        return view('Admin/Jop.edit')->with('Jop',$Jop);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jop  $jop
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJopRequest $request, Jop $Jop)
    {
        $Jop->update(request(['name']));

        session()->flash('success','Updated Successfully');
        
        return redirect(route('Jop.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jop  $jop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jop $Jop)
    {
        
        $Jop->delete();

        session()->flash('success',' Deleted Successfully');
        
        return redirect(route('Jop.index'));
    }

    public function ActiveJop($id)
    {

        DB::table('jops')->where('id',$id)->update(['status'=> '1']);
        
        session()->flash('success','Activeted Successfully');
        
        return redirect()->back();

    }

    public function InActiveJop($id)
    {

        DB::table('jops')->where('id',$id)->update(['status'=> '0']);
        
        session()->flash('success','InActiveted Successfully');
        
        return redirect()->back();

    }
}
