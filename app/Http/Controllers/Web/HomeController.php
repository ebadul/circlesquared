<?php
namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class HomeController extends Controller
{
    public function index(){
        return view('frontend.web.home');
    }

    public function getLogin(){
        return view('frontend.web.login');
    }

    public function getSignup(){
        return view('frontend.web.signup');
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
        return view('frontend.web.signup-success');
    }


    public function postLogin(Request $request){
        $data = $request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);

        if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password])){
            $user = Auth::user();
            $accessToken = $user->createToken('authToken')->accessToken;
            return redirect()->route('user.dashboard');
        }else{
            return redirect()->back()->withErrors(['login'=>'Invalid user login']);
        }
        
    }






    public function create(Request $request){
        $data = $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required',
        ]);

        $user=User::create($data);
        $accessToken = $user->createToken('authToken')->accessToken;

        return response([
            'status'=>'success',
            'user'=>$user,
            'access_token'=>$accessToken
        ]);
    }
 
    public function login(Request $request){
        $data = $request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);

        if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password])){
            $user = Auth::user();
            $accessToken = $user->createToken('authToken')->accessToken;
            return response([
                'status'=>'success',
                'user'=>$user,
                'access_token'=>$accessToken
            ]);
        }else{
            return response([
                'status'=>'error',
                'message'=>'User not found'
            ]);
        }
        
    }

    public function user(){
        $user = Auth::user();
        return response([
            'status'=>'success',
            'user'=>$user
        ]);
    }

    public function logout(){
        if(Auth::check()){
            $user = Auth::user();
            $access_token = $user->token();
            $access_token->revoke();
            return response([
                'status'=>'success',
                'message'=>'User logout'
            ]);
        }else{
            return response([
                'status'=>'error',
                'message'=>'User not loged in'
            ]);
        }
        
    }

}
