<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use App\Models\Gender;
use App\Models\MaritalStatus;
use App\Models\BloodSymbol;
use App\Models\Jop;
use App\Models\Department;
use App\Models\Income;
use App\Models\Cat;
use App\Models\PaymentMethod;
use App\Models\Supplier;
use App\Models\Appointment;
use App\Models\Diagnos;
use App\Models\Service;
use App\Models\ServiceInfo;
use App\Models\TestInfo;
use App\Models\Account;
use App\Models\Test;
use App\Models\Expense;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class ReportController extends Controller
{
    public function ExpenseReport(request $request)
    {
        $from = $request->search;
        $to = $request->to;
        $cat_id = $request->cat_id;
        if($request->search){
            if ($request->cat_id == 'empty') {
                $Expense = Expense::where('date','>=',$from )->where('date','<=',$to )->get();  
            }else{
                $Expense = Expense::where('cat_id',$cat_id)->where('date','>=',$from )->where('date','<=',$to )->get();
            }
        }else{
            $Expense = null;
        }
        return view('Report.ExpenseReport')
        ->with('Cats',Cat::where('type',0)->get())
        ->with('Suppliers',Supplier::all())
        ->with('PaymentMethod',PaymentMethod::all())
        ->with('User',User::all())
        ->with('Expenses' , $Expense);

    }
    public function IncomeReport(request $request)
    {
        $from = $request->search;
        $to = $request->to;
        $cat_id = $request->cat_id;
        if($request->search){
            if ($request->cat_id == 'empty') {
                $Income = Income::where('date','>=',$from )->where('date','<=',$to )->get();  
            }else{
                $Income = Income::where('cat_id',$cat_id)->where('date','>=',$from )->where('date','<=',$to )->get();
            }
        }else{
            $Income = null;
        }
        return view('Report.IncomeReport')
        ->with('Cats',Cat::where('type',1)->get())
        ->with('PaymentMethod',PaymentMethod::all())
        ->with('User',User::all())
        ->with('Incomes' , $Income);

    }
    public function IncomeExpenseReport(request $request)
    {
        $from = $request->search;
        $to = $request->to;
        if($request->search){
                $Expense = Expense::where('date','>=',$from )->where('date','<=',$to )->get();
                $SumExpense = Expense::where('date','>=',$from )->where('date','<=',$to )->get()->sum('amount');
                $Income = Income::where('date','>=',$from )->where('date','<=',$to )->get();
                $SumIncome = Income::where('date','>=',$from )->where('date','<=',$to )->get()->sum('amount');
                $v = 1;
        }else{
            $Expense = null;
            $SumExpense = null;
            $Income = null;
            $SumIncome = null;
            $v = null;
        }
        return view('Report.IncomeExpenseReport')
        ->with('Cats',Cat::all())
        ->with('Suppliers',Supplier::all())
        ->with('PaymentMethod',PaymentMethod::all())
        ->with('User',User::all())
        ->with('Expenses' , $Expense)
        ->with('SumExpense' , $SumExpense)
        ->with('Incomes' , $Income)
        ->with('SumIncome' , $SumIncome)
        ->with('v' , $v);

    }

    public function AppointmentReport(request $request)
    {
        if($request->search){
            $from = $request->search;
            $to = $request->to;
            $Appointment = Appointment::where('date','>=',$from )->where('date','<=',$to )->where('doctor_id','!=',null )->get();
        }else{
            $Appointment = null;
        }
        return view('Report.AppointmentReport')
        ->with('Doctor',User::where('role',2)->get())
        ->with('Appointments' , $Appointment);

    }

    public function PatientReport(request $request)
    {
        if($request->search){
            $from = $request->search;
            $to = $request->to;
            $Patient = Appointment::where('date','>=',$from )->where('date','<=',$to )
            ->where('status',5 )->where('doctor_id','!=',null )->get();
        }else{
            $Patient = null;
        }
        return view('Report.PatientReport')
        ->with('Doctor',User::where('role',2)->get())
        ->with('Tests',Test::where('status',1)->get())
        ->with('TestInfo',TestInfo::all())
        ->with('Services',Service::all())
        ->with('ServiceInfo',ServiceInfo::all())
        ->with('Diagnos',Diagnos::all())
        ->with('Patients' , $Patient);

    }
    public function PatientTestReport(request $request)
    {
        if($request->search){
            $from = $request->search;
            $to = $request->to;
            $Patient = Appointment::where('date','>=',$from )->where('date','<=',$to )
            ->where('status',4 )->where('doctor_id','!=',null )->get();
        }else{
            $Patient = null;
        }
        return view('Report.PatientTestReport')
        ->with('Tests',Test::where('status',1)->get())
        ->with('TestInfo',TestInfo::all())
        ->with('Patients' , $Patient);

    }

    public function UserReport(request $request)
    {
        $role = $request->role;
        if($request->role){
            $User = User::where('role',$role)->get();
        }else{
            $User = null;
        }
        return view('Report.UserReport')
        ->with('Jop',Jop::all())
        ->with('Department',Department::all())
        ->with('Users' , $User);

    }
}
