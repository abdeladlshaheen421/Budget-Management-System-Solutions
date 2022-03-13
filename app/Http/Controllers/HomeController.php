<?php

namespace App\Http\Controllers;
use App\Models\Credit;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use Session;
use Share;
use App;

class HomeController extends Controller
{
    //
    public function dashboardpage() {
        if(session()->has('user_id')){
            $yval=DB::table('plans')->select('amount','home', 'food','transportation','bills','education','entertainment','health','reserve','others')->where('user_id',Session::get('user_id'))->get();
            $dataPoints1=array();
            $dataPoints4=array();
            if(count($yval)){
            $dataPoints1 = array(
                array("label"=> "home", "y"=> $yval[0]->home),
                array("label"=> "food", "y"=> $yval[0]->food),
                array("label"=> "transportation", "y"=> $yval[0]->transportation),
                array("label"=> "bills", "y"=> $yval[0]->bills),
                array("label"=> "education", "y"=> $yval[0]->education),
                array("label"=> "entertainment", "y"=> $yval[0]->entertainment),
                array("label"=> "health", "y"=> $yval[0]->health),
                array("label"=> "reserve", "y"=> $yval[0]->reserve),
                array("label"=> "others", "y"=> $yval[0]->others)
            );
            $dataPoints4=array(array("label"=> "reserve", "y"=> $yval[0]->reserve),array("label"=> "amount", "y"=> $yval[0]->amount),);
        }
           
            $months=['Jan','Feb','Mars','April','may','june','july','Aug','Sep','Oct','Nov','Dec'];
            $dataPoints2=$dataPoints3=array();
            $counter=0;
            foreach($yval as $ele){ 
                // $counter%=12;
                if ($counter==12)
                    break;
            $savings=$ele->amount-($ele->home+$ele->food+$ele->transportation+$ele->bills+$ele->education+$ele->entertainment+$ele->health+$ele->reserve+$ele->others);
            $budget=$ele->amount;
            array_push($dataPoints2 ,array("label"=> "amount", "y"=>$budget )  );
            array_push($dataPoints3 ,array("label"=> $months[$counter] , "y"=>$savings )  );
            $counter++;
        }
           
            return  view('home')->with('dataPoints1',$dataPoints1)->with('dataPoints2',$dataPoints2)->with('dataPoints3',$dataPoints3)->with('dataPoints4',$dataPoints4);   
        
        }
        else{
        return redirect('signin');}
    }
    public function historypage(Request $request) {
        if(session()->has('user_id')){
            $yval=[];
            if($request->search!=""){
                $yval=DB::table('plans')->select('home', 'food','transportation','bills','education','entertainment','health','reserve','others')->where('user_id',Session::get('user_id'))->where('plan_id',$request->search)->get();
                $planid=DB::table('plans')->select('plan_id')->where('user_id',Session::get('user_id'))->where('plan_id',$request->search)->get();

            }
            
            else{
                $yval=DB::table('plans')->select('home', 'food','transportation','bills','education','entertainment','health','reserve','others')->where('user_id',Session::get('user_id'))->get();
                $planid=DB::table('plans')->select('plan_id')->where('user_id',Session::get('user_id'))->get();

            }                    


            $dataPoints=[];
            $fill=0;
            foreach($yval as $element){
            $dataPoints[$fill] = array(
                array("label"=> "home", "y"=> $element->home),
                array("label"=> "food", "y"=> $element->food),
                array("label"=> "transportation", "y"=> $element->transportation),
                array("label"=> "bills", "y"=> $element->bills),
                array("label"=> "education", "y"=> $element->education),
                array("label"=> "entertainment", "y"=> $element->entertainment),
                array("label"=> "health", "y"=> $element->health),
                array("label"=> "reserve", "y"=> $element->reserve),
                array("label"=> "others", "y"=> $element->others)
            );
            $fill++;
            }
            $social=Share::page('https://www.facebook.com/sharer/sharer.php?u=', 'BMSS is website used to help to save money ')
                ->facebook('hello face')
                ->twitter('hello twit')
                ->linkedin('hello link')
                ->whatsapp('hello wats')
                ->telegram('hello tel')->getRawLinks();
            return view('history',compact('planid','social'))->with('dataPoints',$dataPoints);
        
       
        }
        else{
        return redirect('signin');}
        
    }
    public function changelang(Request $request){
        if($request->lang=="en")
            return Redirect('en/settings');
        else
            return Redirect('ar/settings');
    }

    public function planspage() {
        if(session()->has('user_id')){
            
            return view('plans');
        }
        else{
        return redirect('signin');}
    }
    public function settingspage() {
        if(session()->has('user_id')){
            return view('settings');
        }
        else{
         return   redirect('signin');}
    }
    public function myprofilepage() {
        if(session()->has('user_id')){
            $user = User::findOrFail(session()->get('user_id'));
            return view('user', compact('user'));
        }
        else{
         return   redirect('signin');}
    }
    function logout () {
        if(session()->has('user_id')){
            session()->pull('user_id');
            session()->pull('user_name');
            session()->pull('show_notification');
            Session()->pull('not_name');
        return Redirect('signin');
            }
    }
    function deleteAccount(){
        DB::table('plans')->where('user_id',Session::get('user_id'))->delete();
        DB::table('goals')->where('user_id',Session::get('user_id'))->delete();
        DB::table('credits')->where('user_id',Session::get('user_id'))->delete();
        DB::table('users')->where('id',Session::get('user_id'))->delete();
        $this->logout();
        return Redirect('signin');
    }

   
}
