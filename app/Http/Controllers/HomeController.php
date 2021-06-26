<?php

namespace App\Http\Controllers;
use App;
use App\Models\User;
use App\Models\Patient;
use App\Models\Appointment;
use App\Models\Test;
use App\Models\TestInfo;
use App\Models\Service;
use App\Models\ServiceInfo;
use App\Models\Expense;
use App\Models\BloodSymbol;
use App\Models\Gender;
use App\Models\MaritalStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        $Income = DB::table('cats')->where('type',1)->get()->sum('balance');
        $Exp = DB::table('cats')->where('type',0)->get()->sum('balance');
        $Expense = DB::table('expenses')->get()->sum('amount');
        $Doctor = DB::table('users')->where('role',2)->get('id');
        $Employee = DB::table('users')->where('role',7)->get('id');
        $Appointment = DB::table('appointments')->latest()->take(5)->get()->sortByDesc('id');
        $Services = DB::table('services')->latest()->take(5)->get()->sortByDesc('id');
        $Appointments = DB::table('appointments')
                        ->where('doctor_id','!=',null)
                        ->where('status', 1)
                        ->where('doctor_id', Auth()->user()->id)
                        ->where('date' ,'=', Carbon::today())
                        ->get();
        switch (Auth()->user()->role) {
            case '1':
                return view('Admin.Dashboard')
                ->with('Services',$Services)
                ->with('Doctor',$Doctor)
                ->with('Expense',$Expense)
                ->with('Employee',$Employee)
                ->with('Appointment',$Appointment);
            break;
            case '2':
                return view('Doctor.Dashboard')
                ->with('Appointments',$Appointments)
                ->with('Tests',Test::all());
            break;
            case '3':
                $App = DB::table('appointments')
                        ->where('doctor_id','!=',null)
                        ->where('status', 2)
                        ->get();
                $TestInfo = DB::table('test_infos')->get();
                return view('Laboratory.Dashboard')
                ->with('Appointments',$App)
                ->with('Tests',Test::all())
                ->with('TestInfo',$TestInfo);
            break;
            case '4':
                $App = DB::table('appointments')
                        ->where('doctor_id','!=',null)
                        ->where('status', 4)
                        ->get();
                $diagnos = DB::table('diagnos')->get();
                return view('Pharmacy.Dashboard')
                ->with('Appointments',$App)
                ->with('Diagnos',$diagnos);
            break;
            case '5':
                $Expenses = DB::table('expenses')->latest()->take(5)->get()->sortByDesc('id');
                $Incomes = DB::table('incomes')->latest()->take(5)->get()->sortByDesc('id');
                return view('Accounting.Dashboard')
                ->with('Expense',$Exp)
                ->with('Income',$Income)
                ->with('Incomes',$Incomes)
                ->with('Expenses',$Expenses);
            break;
            case '6':    
                $Appoint= DB::table('appointments')
                ->where('status' ,'!=', 5)
                ->where('date' ,'=', Carbon::today())
                ->get()->sortByDesc('created_at');
                $DoneAppointment = DB::table('appointments')->where('status' , 5)->get();
                $ServiceInfo = DB::table('service_infos')->get();
                $Doctor = DB::table('users')->where('role',2)->get();
                return view('Reception.Dashboard')
                ->with('Doctor',$Doctor)
                ->with('DoneAppointment',$DoneAppointment)
                ->with('Appointments',$Appoint)
                ->with('Service',Service::all())
                ->with('ServiceInfo',$ServiceInfo);
            break;
            default:
                return view('/home');
            break;
        }
    }

    public function profile(){
        
        return view('profile')
        ->with('MaritalStatus' , MaritalStatus::all())
        ->with('BloodSymbol' , BloodSymbol::all())
        ->with('Gender' , Gender::all());

    }
    
    public function lang($locale){
        App::setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }

}
