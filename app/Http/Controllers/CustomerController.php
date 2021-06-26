<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Appointment;
use App\Models\Diagnos;
use App\Models\Service;
use App\Models\ServiceInfo;
use App\Models\TestInfo;
use App\Models\Test;
use App\Models\Account;
use App\Models\User;
use App\Models\Income;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Appointment = DB::table('appointments')->where('status',3)->get();
        return view('Accounting/Customer.index')
        ->with('Appointments',$Appointment);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id , Income $Income)
    {

        $service_balance = DB::table('service_infos')->where('appointment_id',$id)->get()->sum('price');
        $test_balance = DB::table('test_infos')->where('appointment_id',$id)->get()->sum('price');
        $doctor_id = DB::table('appointments')->where('id',$id)->get()->first();
        $doctor_price = DB::table('users')->where('id',$doctor_id->doctor_id)->get()->first();
        $balance1 = DB::table('cats')->where('id',4)->get()->first();
        if(!empty($doctor_price)){
            $total = $balance1->balance+$test_balance+$service_balance+$doctor_price->doctor_price;
        }
        else{
            $total = $balance1->balance+$test_balance+$service_balance;
        }
        if(!empty($doctor_price)){
            $totalincome = $test_balance+$service_balance+$doctor_price->doctor_price;
        }
        else{
            $totalincome = $test_balance+$service_balance;
        }
        DB::table('cats')->where('id',4)->update(['balance'=>$total]);
        $Appointment = DB::table('appointments')->where('id',$id)->get()->first();
        $ServiceInfo = DB::table('service_infos')->where('appointment_id',$id)->get();
        $TestInfo = DB::table('test_infos')->where('appointment_id',$id)->get();
        DB::table('appointments')->where('id',$id)->update(['status'=> '4']);
        if (!empty($Appointment->doctor_id)) {
            $Income->create([
                'date'=>$doctor_id->date,
                'amount'=>$totalincome,
                'description'=>'إيرادات مقابلة',
                'cat_id'=>4,
                'added_by'=>auth()->user()->id
                ]);
        }else{
            $Income->create([
                'date'=>$doctor_id->date,
                'amount'=>$totalincome,
                'description'=>'إيرادات خدمات',
                'cat_id'=>4,
                'added_by'=>auth()->user()->id
                ]);
        }

        session()->flash('success','Done');
        
        return redirect()->back();
    }
    public function PatientBill($id)
    {
        $service_balance = DB::table('service_infos')->where('appointment_id',$id)->get()->sum('price');
        $test_balance = DB::table('test_infos')->where('appointment_id',$id)->get()->sum('price');
        $doctor_id = DB::table('appointments')->where('id',$id)->get()->first();
        $doctor_price = DB::table('users')->where('id',$doctor_id->doctor_id)->get()->first();
        $Appointment = DB::table('appointments')->where('id',$id)->get()->first();
        $ServiceInfo = DB::table('service_infos')->where('appointment_id',$id)->get();
        $TestInfo = DB::table('test_infos')->where('appointment_id',$id)->get();
        return view('Accounting/Customer.PatientBill')
        ->with('Appointment',$Appointment)
        ->with('Service',Service::all())
        ->with('Tests',Test::all())
        ->with('TestInfo',$TestInfo)
        ->with('ServiceInfo',$ServiceInfo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
