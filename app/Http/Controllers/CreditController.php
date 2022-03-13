<?php

namespace App\Http\Controllers;
use App\Models\Credit;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Session;
use Share;

class CreditController extends Controller
{
    //
    public function creditpage() {
        if(session()->has('user_id')){
            return view('credit');
        }
        else{
         return   redirect('signin');}
    }
    public function insertcard(Request $request){

        $validateDate =$request->validate([
            'holdername' => 'required',
            'cardnumber' => 'required|numeric|unique:credits',
            'expiredate' => 'required',
            'cvv' => 'required|numeric',
        ]);
        $data = array();
        $data['holdername'] = $request->holdername;
        $data['cardnumber'] = $request->cardnumber;
        $data['user_id']=session::get('user_id');
        $data['expiredate'] = $request->expiredate;
        $data['cvv'] = $request->cvv;
        $res = DB::table('credits')->insert($data);
        if($res){
            DB::table('users')->where('id', Session::get('user_id'))->update(['plan_no' => 12]);
            return Redirect()->back()->with('success',__('messages.successfully added'));
        }
        else{
            return Redirect()->back()->withInput();
        }
    }
}
