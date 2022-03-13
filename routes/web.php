<?php
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CreditController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\GoalController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function()
{
Route::get('/', function () {
    return view('welcome');
});
Route::get('signin', function () {
    if(session()->has('user_id')){
        return  redirect('Dashboard');
    }
    else{
    return view('login');}
});

Route::get('signup', function () {
    if(session()->has('user_id')){
        return  redirect('Dashboard');
    }
    else{
        return view('signup');}
});
Route::get('agree', function (){
    if(session()->has('user_id')){
        return  redirect('Dashboard');
    }
    else{
        return view('agreement');}
});
//signup
Route::post('create/account',[UserController::class,'storeData'])->name('create.account');
//log in
Route::post('Dashboard',[UserController::class,'loginUser'])->name('login.account');
//routes of credit card
Route::get('creditcard',[CreditController::class,'creditpage']);
Route::post('addcredit',[CreditController::class,'insertcard'])->name('add.credit');
//routes of home
Route::get('Dashboard',[HomeController::class,'dashboardpage']);
Route::get('history',[HomeController::class,'historypage']);
Route::get('goal', [GoalController::class,'goalpage']);
Route::get('plans', [HomeController::class,'planspage']);
Route::get('settings', [HomeController::class,'settingspage']);
Route::get('profile',[HomeController::class,'myprofilepage']);
//routes for goal
Route::get('addgoal',[GoalController::class,'insertgoal'])->name('add.goal');
Route::get('delete',[GoalController::class,'deletegoal'])->name('del.goal');
Route::get('deleteall',[GoalController::class,'deleteall'])->name('deleteall');
//routes for plan
Route::get('addplan',[PlanController::class,'createplan'])->name('create.plan');
Route::get('setupplan',[PlanController::class,'setupplan'])->name('setup.plan');
//end of prefix
Route::post('profile',[UserController::class,'updateProfile'])->name('user.update');
Route::get('changelang',[HomeController::class,'changelang'])->name('change.lang');
Route::post('changepass',[UserController::class,'changepassword'])->name('change.pass');
//logout from session
Route::get('logout',[HomeController::class,'logout']);
//delete account
Route::get('deleteAccount',[HomeController::class,'deleteAccount']);

});