<?php
namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Project;
use Auth;

class DashboardController extends Controller
{
    public function index(){
        $user = Auth::user();
        $projects = Project::where('project_admin', $user->id)->get();
        return view('frontend.user.dashboard')->with(compact('projects'));
        
    }

    public function getLogin(){
        return view('frontend.login');
    }

    public function getSignup(){
        return view('frontend.signup');
    }
    
    public function postSignup(Request $request){
        $data = $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|confirmed',
            'password_confirmation' => 'required|min:6',
        ]);
        
        $data = [
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> bcrypt($request->password),
             
        ];
        
        
        $user=User::create($data);
        
        if($user){
            return redirect()->to('/signup-success');
        }
    }

    public function signupSuccess(){
        return view('frontend.signup-success');
    }


    public function postLogin(Request $request){
        $data = $request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);

        if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password])){
            $user = Auth::user();
            $accessToken = $user->createToken('authToken')->accessToken;
        }else{
            return redirect()->back()->withErrors(['login'=>'Invalid user login']);
        }
        
    }

    public function signout(){
        Auth::logout();
        return redirect()->route('home.index');
    }

    public function projectsList(){
        return view('frontend.user.projects');
    }

    

}
