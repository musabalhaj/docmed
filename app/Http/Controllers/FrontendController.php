<?php

namespace App\Http\Controllers;
use App;
use App\Models\User;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Requests\Appoinment\CreateAppointmentRequest;
use App\Http\Requests\Appoinment\UpdateAppointmentRequest;
use Illuminate\Support\Facades\DB;
class FrontendController extends Controller
{
    public function MakeAppointment()
    {
        return view('MakeAppointment')
        ->with('Doctor',User::where('role',2)->get());
    }
    public function MakeAppointmentStore(request $request , Appointment $Appointment )
    {
        $account_number =DB::table('accounts')->where('account_num',$request->account_num)->get()->first(); 
        $money = DB::table('accounts')->where('account_num',$request->account_num)->get()->first();
        $appointment_price = DB::table('users')->where('id',$request->doctor_id)->get()->first();
        $doctor_count = DB::table('appointments')->where('doctor_id',$request->doctor_id)->get()->count('id');
        if ($doctor_count < 2) {
                if (!empty($account_number)) {
                    if ($account_number->password == $request->password) {

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
                        }else{
                            session()->flash('error','Your Balance Is Not Enough');
                            
                            return redirect()->back();
                        }
                }else{
                    session()->flash('error','Your Password Is Wrong');
                        
                        return redirect()->back();
                }
                }else{
                    session()->flash('error','Your Account Number Is Not Right');
                        
                        return redirect()->back();
                }
        }else {
            session()->flash('error','Doctor Not avialable');
                        
            return redirect()->back();
        }

        session()->flash('success','Booking Successfully');
            
        return redirect(url('/'));
    }

    public function lang($locale){
        App::setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }
}
