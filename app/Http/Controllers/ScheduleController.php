<?php
 
namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctor = DB::table('users')->where('role',2)->get();
        return view('Reception/Schedule.index')
        ->with('Schedule' ,Schedule::all()->sortByDesc('id'))
        ->with('Doctor' ,$doctor);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doctor = DB::table('users')->where('role',2)->get();
        return view('Reception/Schedule.create')->with('Doctor' ,$doctor);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request ,Schedule $Schedule)
    {
        $Schedule->create([
            'doctor_id'=>$request->doctor_id,
            'days'=>json_encode($request->days),
            'start_at'=>$request->start_at,
            'end_at'=>$request->end_at
            ]);

        session()->flash('success' , 'Added Successfully');

        return redirect(route('Schedule.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit(Schedule $Schedule)
    {
        $doctor = DB::table('users')->where('role',2)->get();
        return view('Reception/Schedule.edit')
        ->with('Doctor' ,$doctor)
        ->with('Schedule' , $Schedule);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schedule $Schedule)
    {
        $Schedule->update([
            'doctor_id'=>$request->doctor_id,
            'days'=>json_encode($request->days),
            'start_at'=>$request->start_at,
            'end_at'=>$request->end_at
            ]);

        session()->flash('success' , 'Updated Successfully');

        return redirect(route('Schedule.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $Schedule)
    {
        $Schedule->delete();

        session()->flash('success' , 'Deleted Successfully');

        return redirect(route('Schedule.index'));
    }

    public function ActiveSchedule($id)
    {

        DB::table('schedules')->where('id',$id)->update(['status'=> '1']);
        
        session()->flash('success','Activeted Successfully');
        
        return redirect()->back();

    }

    public function InActiveSchedule($id)
    {

        DB::table('schedules')->where('id',$id)->update(['status'=> '0']);
        
        session()->flash('success','InActiveted Successfully');
        
        return redirect()->back();

    }
}
