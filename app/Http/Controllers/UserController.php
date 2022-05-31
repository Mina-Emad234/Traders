<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UserRequest;
use Spatie\Multitenancy\Models\Tenant;
use App\Models\User;
use App\Services\DatabaseCreating;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public $databaseCreating;
    public function __construct(DatabaseCreating $databaseCreating)
    {
        $this->databaseCreating=$databaseCreating;
    }

    public function create(){

        return view('auth.register');
    }
    public function store(RegisterRequest $request){

        try {
        $email = explode('@',$request->email);
        $user_db=$email[0].rand(0,10000000);
        $user=new Tenant();
        $user->name=$request->name;
        $user->domain=$request->domain;
        $user->email=$request->email;
        $user->password=bcrypt($request->password);
        $user->database=$user_db;
        $user->save();
            $this->databaseCreating->createDatabase($user_db);
            auth()->login($user);
            return redirect()->route('products.index');
        }catch (\Exception $ex) {
            return redirect()->back()->withInput()->with(['error' => "Error! during registration please try again"]);
        }
    }



    public function LoginPage(){
        return view('auth.login');
    }
    public function Login(UserRequest $request){
        if (auth()->attempt(['email'=>$request->input('email'),'password'=>$request->input('password')])){
            return redirect()->route('products.index');
        }
        return redirect()->back()->withInput()->with(['error'=>"there is an error in login Please.try again"]);
    }

    public function logout(){
        $guard=$this->getGuard();
        $guard->logout();
        return redirect()->route('user.login');
    }

    public function getGuard(){
        return auth();
    }
}
