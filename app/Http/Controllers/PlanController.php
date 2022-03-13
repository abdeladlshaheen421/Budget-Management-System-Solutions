<?php

namespace App\Http\Controllers;
use App\Models\Plan;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    //'amount',
  
    public function createplan(Request $request){
        $plan_no = DB::table('users')->select('plan_no')->where('id', Session::get('user_id'))->first();
        $us_sal = DB::table('users')->select('salary','additional_income')->where('id', Session::get('user_id'))->first();
        $R_sal=$us_sal->salary;
        $add_sal=$us_sal->additional_income;
        if(($request->home+$request->food+$request->transportation+$request->bills+$request->education+$request->entertainment+$request->health+$request->reserve+$request->others) <= ($R_sal+$add_sal)){
        if($plan_no->plan_no>0){
                $plan=array();
                $plan['user_id']=Session::get('user_id');
                $plan['amount']=$request->home+$request->food+$request->transportation+$request->bills+$request->education+$request->entertainment+$request->health+$request->reserve+$request->others;
                $plan['home']=$request->home;
                $plan['food']=$request->food;
                $plan['transportation']=$request->transportation;
                $plan['bills']=$request->bills;
                $plan['education']=$request->education;
                $plan['entertainment']=$request->entertainment;
                $plan['health']=$request->health;
                $plan['reserve']=$request->reserve;
                $plan['others']=$request->others;
                if($plan['home']!=0||$plan['food']!=0||$plan['transportation']!=0||$plan['bills']!=0||$plan['education']!=0||$plan['entertainment']!=0||$plan['health']!=0||$plan['reserve']!=0||$plan['others']!=0){
                    DB::table('plans')->insert($plan);
                    DB::table('users')->where('id', Session::get('user_id'))->update(['plan_no' => $plan_no->plan_no-1]);
        return Redirect('history');

        }
        else{
            return Redirect()->back()->with('message','please Enter at least one value');}
    } else {
        return Redirect()->back()->with('message','No More Plans');}
    }else{
        return Redirect()->back()->with('message','Salary is less than values');
    }
    }
    public function setupplan(Request $request){
        $arr=$request['setplan'];
        $plan=array();
        $plan['user_id']=Session::get('user_id');
        $plan_no = DB::table('users')->select('plan_no')->where('id', Session::get('user_id'))->first();
        if($plan_no->plan_no>0){
            $us_sal = DB::table('users')->select('salary','additional_income')->where('id', Session::get('user_id'))->first();
            $R_sal=$us_sal->salary;
            $add_sal=$us_sal->additional_income;
            $plan['amount']=$R_sal+$add_sal;
            if((($R_sal + $add_sal) <= 10000)){
                //
                if(in_array("home",$arr))
                    $plan['home']=($R_sal+$add_sal)*0.15;
                else
                    $plan['home']=0;
                if(in_array("food",$arr))
                    $plan['food']=($R_sal+$add_sal)*0.15;
                else
                    $plan['food']=0;
                if(in_array("transportation",$arr))
                    $plan['transportation']=($R_sal+$add_sal)*0.08;
                else
                    $plan['transportation']=0;
                if(in_array("bills",$arr))
                    $plan['bills']=($R_sal+$add_sal)*0.15;
                else
                    $plan['bills']=0;
                if(in_array("education",$arr))
                    $plan['education']=($R_sal+$add_sal)*0.05;
                else
                    $plan['education']=0;
                if(in_array("entertainment",$arr))
                    $plan['entertainment']=($R_sal+$add_sal)*0.10;
                else
                    $plan['entertainment']=0;
                if(in_array("health",$arr))
                    $plan['health']=($R_sal+$add_sal)*0.05;
                else
                    $plan['health']=0;
                if(in_array("reserve",$arr))
                    $plan['reserve']=($R_sal+$add_sal)*0.10;
                else
                    $plan['reserve']=0;
                if(in_array("others",$arr))
                    $plan['others']=($R_sal+$add_sal)*0.10;
                else
                    $plan['others']=0;
            }
            else if( (($R_sal + $add_sal)> 10000) && ($R_sal + $add_sal)<=30000){
                //
                if(in_array("home",$arr))
                    $plan['home']=($R_sal+$add_sal)*0.15;
                else
                    $plan['home']=0;
                if(in_array("food",$arr))
                    $plan['food']=($R_sal+$add_sal)*0.15;
                else
                    $plan['food']=0;
                if(in_array("transportation",$arr))
                    $plan['transportation']=($R_sal+$add_sal)*0.08;
                else
                    $plan['transportation']=0;
                if(in_array("bills",$arr))
                    $plan['bills']=($R_sal+$add_sal)*0.15;
                else
                    $plan['bills']=0;
                if(in_array("education",$arr))
                    $plan['education']=($R_sal+$add_sal)*0.10;
                else
                    $plan['education']=0;
                if(in_array("entertainment",$arr))
                    $plan['entertainment']=($R_sal+$add_sal)*0.10;
                else
                    $plan['entertainment']=0;
                if(in_array("health",$arr))
                    $plan['health']=($R_sal+$add_sal)*0.05;
                else
                    $plan['health']=0;
                if(in_array("reserve",$arr))
                    $plan['reserve']=($R_sal+$add_sal)*0.10;
                else
                    $plan['reserve']=0;
                if(in_array("others",$arr))
                    $plan['others']=($R_sal+$add_sal)*0.10;
                else
                    $plan['others']=0;
            }
            else if((($R_sal + $add_sal) > 30000)){
                //
                if(in_array("home",$arr))
                    $plan['home']=($R_sal+$add_sal)*0.11;
                else
                    $plan['home']=0;
                if(in_array("food",$arr))
                    $plan['food']=($R_sal+$add_sal)*0.11;
                else
                    $plan['food']=0;
                if(in_array("transportation",$arr))
                    $plan['transportation']=($R_sal+$add_sal)*0.08;
                else
                    $plan['transportation']=0;
                if(in_array("bills",$arr))
                    $plan['bills']=($R_sal+$add_sal)*0.10;
                else
                    $plan['bills']=0;
                if(in_array("education",$arr))
                    $plan['education']=($R_sal+$add_sal)*0.10;
                else
                    $plan['education']=0;
                if(in_array("entertainment",$arr))
                    $plan['entertainment']=($R_sal+$add_sal)*0.06;
                else
                    $plan['entertainment']=0;
                if(in_array("health",$arr))
                    $plan['health']=($R_sal+$add_sal)*0.05;
                else
                    $plan['health']=0;
                if(in_array("reserve",$arr))
                    $plan['reserve']=($R_sal+$add_sal)*0.15;
                else
                    $plan['reserve']=0;
                if(in_array("others",$arr))
                    $plan['others']=($R_sal+$add_sal)*0.10;
                else
                    $plan['others']=0;
            }
            $goal=DB::table('goals')->select('goal')->where('user_id', Session::get('user_id'))->get();
            $saving=DB::table('goals')->select('savings')->where('user_id', Session::get('user_id'))->get();
           
            if(!empty($saving[0]->savings)){
                $check=$saving[0]->savings;
            if( $check <= $plan['reserve']){
                $ngoal=$goal[0]->goal-$saving[0]->savings;
                $nsave=$saving[0]->savings+$saving[0]->savings;
            }else{
                $ngoal=$goal[0]->goal-$plan['reserve'];
                $nsave=$saving[0]->savings+$plan['reserve'];
            }
            if($ngoal<0)
                $ngoal=0;
            DB::table('goals')->where('user_id', Session::get('user_id'))->update(['goal'=>$ngoal,'savings'=>$nsave]);
                
        }
            DB::table('users')->where('id', Session::get('user_id'))->update(['plan_no' => $plan_no->plan_no-1]);
            DB::table('plans')->insert($plan);
            return Redirect('history');
        }
        else {
            return Redirect()->back()->with('message','Subscribe to our site to get more plans');}
            
        }
}