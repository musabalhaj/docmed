<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use App\Models\Invoice;
use DB;
use Excel;
class MaatwebsiteController extends Controller
{
    public function importExport(){
        return view('importExport');
    }

    public function downloadExcel($type){
        $data = Invoice::get()->toArray();
        return Excel::create('itsolutionstuff_example' , function($excel) use ($data){
            $excel->sheet('mySheet', function($sheet) use ($data){ $sheet->fromArray($data);
            });
        })->download($type);
    }

    public function importExcel(){
        if(Input::hasFile('import_file')){
            $path = Input::file('import_file')->getRealPath();
            $data = Excel::load($path , function($reader){})->get();
            if(!empty($insert)){
                DB::table('invoices')->insert($insert);
                dd('Insert Record successfully.');
            }
        }
        return back();
    }
}
