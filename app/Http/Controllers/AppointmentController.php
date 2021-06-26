<?php
 
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Appointment;
use App\Models\Diagnos;
use App\Models\Service;
use App\Models\ServiceInfo;
use App\Models\TestInfo;
use App\Models\Account;
use App\Models\User;
use App\Models\Test;
use Illuminate\Http\Request;
use App\Http\Requests\Appoinment\CreateAppointmentRequest;
use App\Http\Requests\Appoinment\UpdateAppointmentRequest;
class AppointmentController extends Controller
{

    public function index()
    {
        return view('Reception/Appointment.index')
        ->with('Appointments',Appointment::all())
        ->with('Doctor',User::where('role',2)->get());
    }
    public function create()
    {
        return view('Reception/Appointment.create')
        ->with('Doctor',User::where('role',2)->get());
    }
    public function createService()
    {
        return view('Reception/Appointment.createService')
        ->with('Services',Service::where('status',1)->get());
    }
    public function store(CreateAppointmentRequest $request , Appointment $Appointment ,ServiceInfo $ServiceInfo)
    {
        $ser =DB::table('services')->where('id',$request->service_id)->get()->first();
        $appointment_id =DB::table('appointments')->get()->last();
        $account_number =DB::table('accounts')->where('account_num',$request->account_num)->get()->first(); 
        $money = DB::table('accounts')->where('account_num',$request->account_num)->get()->first();
        $appointment_price = DB::table('users')->where('id',$request->doctor_id)->get()->first();
        if ($request->payment_method == 'bank') {
            if (!empty($account_number)) {

                if ($money->amount >= $appointment_price->doctor_price) {
                    $amount = $money->amount-$appointment_price->doctor_price;
                    DB::table('accounts')->where('account_num',$request->account_num)->update(['amount'=> $amount]);
                    $Appointment->create([
                        'name'=>$request->name,
                        'address'=>$request->address,
                        'email'=>$request->email,
                        'phone'=>$request->phone,
                        'date'=>$request->date,
                        'doctor_id'=>$request->doctor_id,
                        'note'=>$request->note
                        ]);
                }
                else{
                    session()->flash('error','Your Balance Is Not Enough');
                    
                    return redirect()->back();
                }
            }else{
                session()->flash('error','Your Account Number Is Not Right');
                    
                    return redirect()->back();
            }
        }
        else{
            $Appointment->create([
                'name'=>$request->name,
                'address'=>$request->address,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'date'=>$request->date,
                'doctor_id'=>$request->doctor_id,
                'service_id'=>$request->service_id,
                'note'=>$request->note
                ]);
            if (!empty($request->service_id)) {
                $appointment_id =DB::table('appointments')->get()->last();
                $ServiceInfo->create([
                    'appointment_id'=>$appointment_id->id,
                    'service_id'=>$request->service_id,
                    'price'=>$ser->price
                    ]);
            }
        }
        session()->flash('success','Added Successfully');
            
        return redirect(route('Appointment.index'));
    }
    public function show(Appointment $Appointment)
    {
        return view('Reception/Appointment.show')
        ->with('Appointment',$Appointment)
        ->with('Doctor',User::where('role',2)->get())
        ->with('Services',Service::where('status',1)->get());
    }
    public function edit(Appointment $Appointment)
    {
        return view('Reception/Appointment.edit')
        ->with('Appointment',$Appointment)
        ->with('Doctor',User::where('role',2)->get())
        ->with('Services',Service::where('status',1)->get());
    }
    public function update(UpdateAppointmentRequest $request, Appointment $Appointment)
    {
        $Appointment->update(request(['name','address','email','phone','date','doctor_id','service_id','note']));
        
        session()->flash('success','Updated Successfully');
        
        return redirect(route('Appointment.index'));
    }
    public function destroy(Appointment $Appointment)
    {
        $Appointment->delete();

        session()->flash('success','Deleted Successfully');
        
        return redirect(route('Appointment.index'));
    }

    public function ActiveAppointment($id)
    {
        $Patient = DB::table('appointments')->where('id',$id)->get()->first();
        if(!empty($Patient->doctor_id)){
            DB::table('appointments')->where('id',$id)->update(['status'=> '1']);
        }
        else{
            DB::table('appointments')->where('id',$id)->update(['status'=> '3']);
        }        
        return redirect()->back();

    }
    public function AppointmentTest($id)
    {
        $appointment_id = DB::table('appointments')->where('id',$id)->get()->first();
        return view('Doctor/AppointmentTest')
        ->with('appointment_id', $appointment_id)
        ->with('Tests', Test::all());
    }
    public function AppointmentStoreTest(request $request)
    {

        $test =DB::table('tests')->get();
        foreach($request->test_id as $test_id){
            foreach($test as $tst){
                if ($tst->id == $test_id){
                    $data = array(
                        'appointment_id'=>$request->appointment_id,
                        'test_id'=>$test_id,
                        'price'=>$tst->price,
                        'created_at'=>now()
                    );
                    TestInfo::insert($data); 
                }   
            }
      
        }
        DB::table('appointments')->where('id',$request->appointment_id)->update(['status'=> '2']);
        return redirect(route('home'));
    }
    public function TestResult($id)
    {
        $appointment_id = DB::table('appointments')->where('id',$id)->get()->first();
        return view('Laboratory/Test')
        ->with('appointment_id', $appointment_id)
        ->with('Tests', Test::all());
    }
    public function AppointmentStoreTestResult(request $request , TestInfo $TestInfo)
    {
        DB::table('test_infos')->where('appointment_id',$request->appointment_id)->delete();
        $test =DB::table('tests')->get();
        foreach($request->test_id as $v=>$test_id){
            foreach($test as $tst){
                    if ($tst->id == $test_id){
                        $data = array(
                            'appointment_id'=>$request->appointment_id,
                            'test_id'=>$test_id,
                            'price'=>$tst->price,
                            'result'=>$request->result[$v],
                            'created_at'=>now()
                        );
                        TestInfo::insert($data); 
                }   
            }
        }
        DB::table('appointments')->where('id',$request->appointment_id)->update(['status'=> '1']);         
        return redirect(route('home'));

    }
    public function AppointmentDiagnos($id)
    {
        $appointment_id = DB::table('appointments')->where('id',$id)->get()->first();
        return view('Doctor/Diagnos')
        ->with('Appointment_id', $appointment_id);

    }
    public function AppointmentStoreDiagnos(request $request , Diagnos $Diagnos)
    {
        $Diagnos->create([
            'appointment_id'=>$request->appointment_id,
            'diagnos'=>$request->doctor_diagnos,
            'tretment'=>$request->tretment
            ]);
            DB::table('appointments')->where('id',$request->appointment_id)->update(['status'=> '3']);
            return redirect(route('home'));

    }
    public function AppointmentTretment($id)
    {
        $appointment_id = DB::table('appointments')->where('id',$id)->get()->first();
        DB::table('appointments')->where('id',$id)->update(['status'=> '5']);
        return view('Pharmacy/Tretment')
        ->with('Appointment', $appointment_id);

    }

}
