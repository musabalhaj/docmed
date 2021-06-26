<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Jop;
use App\Models\Test;
use App\Models\PaymentMethod;
use Illuminate\Support\Facades\DB;
class SettingController extends Controller
{
    public function index(){
        return view('Admin/Setting.index')
        ->with('Department', Department::all())
        ->with('Jop', Jop::all())
        ->with('Tests', Test::all());
    }
}
