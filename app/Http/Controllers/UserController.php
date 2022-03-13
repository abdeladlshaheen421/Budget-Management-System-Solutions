<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Http\Request;
use Session;
use Share;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function storeData(Request $request)
    {
        $validateDate =$request->validate([
            'name' => 'required|unique:users',
            'email' => 'required|unique:users|email',
            'gender' => 'required',
            'country' => 'required',
            'password' => 'required|min:8',
            'salary' => 'required|numeric',
            'age' => 'required|numeric',
            'maritalstatus' => 'required',
            
        ]);
        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['gender'] = $request->gender;
        $data['country'] = $request->country;
        $data['password'] = Hash::make($request->password);
        $data['salary'] = $request->salary;
        $data['age'] = $request->age;
        $data['status'] = $request->maritalstatus;
        $data['additional_income'] = $request->additionalincome;
        if($data['additional_income']==null){
            $data['additional_income']=0;
        }
        $user = DB::table('users')->insert($data);
        if($user){
            session::put('show_notification',true);
            Session::put('not_name',$data['name']);
            return Redirect()->back()->with('success',__('messages.Registered successfully'));
        }
        else{
            return Redirect()->back();
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function loginUser(Request $request )
    {
        $validateDate =$request->validate([
            'email' => 'required',
            'password' => 'required|min:6',
        ]);
        $email=$request->email;
        $password = $request->password;
        if (filter_var($email, FILTER_VALIDATE_EMAIL)){
       $db_email=DB::table('users')->where('email',$email)->first();
        }else{$db_email=DB::table('users')->where('name',$email)->first();}
       if($db_email!=null){
           $db_password=$db_email->password;
           if( Hash::check( $password , $db_password )){
            Session::put('user_id', $db_email->id);
            Session::put('user_name', $db_email->name);
            
            return Redirect('Dashboard');
           }else{
            return Redirect()->back()->with('fail',__('messages.incorrect password'))->withInput();
           }
       }else{
        return Redirect()->back()->with('fail',__("messages.email or username doesn\'t exist"))->withInput();
       }
    }
    

    public function updateProfile(Request $request){
        $validateDate =$request->validate([
          
            'salary' => 'required|numeric',
            'additional_income' => 'required|numeric',
        ]);
        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['salary'] = $request->salary;
        $data['additional_income'] = $request->additional_income;
        if($data['additional_income']==null){
            $data['additional_income']=0;
        }

         DB::table('users')->where('id',Session::get('user_id'))->update(['salary'=>  $data['salary'],'additional_income'=>$data['additional_income']]);
         $user =   DB::table('users')->select()->where('id',Session::get('user_id'))->get();

        return Redirect('profile')->with('user',$user);
       
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    // public function show(User $user)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  \App\Models\User  $user
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit(User $user)
    // {
    //     //
    // }


    // public function destroy(User $user)
    // {
    //     //
    // }

    public function changepassword(Request $request){
        $oldpass  =   DB::table('users')->select()->where('id',Session::get('user_id'))->first();
      
        if ($request->pass==$request->spass){
        if( Hash::check( $request->oldpass , $oldpass->password )){
           $newpass = Hash::make($request->pass);
           DB::table('users')->where('id',Session::get('user_id'))->update(['password'=>$newpass]);
            return Redirect('profile')->with('failed',"Succefully Change");
            
        }
    else 
    return Redirect()->back()->with('failed',"incorrect password");  

    }
        else
         return Redirect()->back()->with('failed',"the two given passwords do not match");  
    }
}
