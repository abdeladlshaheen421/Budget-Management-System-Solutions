<?php

namespace App\Http\Controllers;
use App\Models\Goals;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class GoalController extends Controller
{
    //
    public function goalpage() {
        if(session()->has('user_id')){
            $goals=DB::table('goals')->select('id','name','goal','savings')->where('user_id',Session::get('user_id'))->get();
            
            return view('goal')->with('goals',$goals);
        }
        else{
        return redirect('signin');}
    }
    public function insertgoal(Request $request){
        $validateDate =$request->validate([
            'name' => 'required|String',
            'goal' => 'required|numeric',
            'savings' => 'required|numeric',
        ]);
        $data = array();
        $data['name'] = $request->name;
        $data['goal'] = $request->goal;
        $data['user_id']=session::get('user_id');
        $data['savings'] = $request->savings;
        $res = DB::table('goals')->insert($data);
        return Redirect()->back();
    }
    public function deletegoal(Request $request){
        DB::table('goals')->where([['user_id',"=",Session::get('user_id')],['id',"=",$request->delete]])->delete();
        return Redirect('goal');
    }
    public function deleteall(){
        DB::table('goals')->where('user_id',"=",Session::get('user_id'))->delete();
        return Redirect('goal');
    }
}