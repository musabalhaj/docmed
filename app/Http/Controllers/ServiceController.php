<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\Service\CreateServiceRequest;
use App\Http\Requests\Service\UpdateServiceRequest;
class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Reception/Service.index')
        ->with('Services' ,Service::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Reception/Service.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateServiceRequest $request , Service $Service)
    {
        $Service->create([
            'name'=>$request->name,
            'description'=>$request->description,
            'price'=>$request->price
            ]);

        session()->flash('success' , 'Added Successfully');

        return redirect(route('Service.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $Service)
    {
        return view('Reception/Service.edit')->with('Service' , $Service);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateServiceRequest $request, Service $Service)
    {
        $Service->update(request(['name', 'description' , 'price']));
        
        session()->flash('success' , 'Updated Successfully');

        return redirect(route('Service.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $Service)
    {
        $Service->delete();

        session()->flash('success' , 'Deleted Successfully');

        return redirect(route('Service.index'));
    }
    public function ActiveService($id)
    {

        DB::table('services')->where('id',$id)->update(['status'=> '1']);
        
        session()->flash('success','Activeted Successfully');
        
        return redirect()->back();

    }

    public function InActiveService($id)
    {

        DB::table('services')->where('id',$id)->update(['status'=> '0']);
        
        session()->flash('success','InActiveted Successfully');
        
        return redirect()->back();

    }
}
