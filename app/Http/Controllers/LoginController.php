<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{
    public function index(){
        if(!empty(Auth::check())){
            if(Auth::user()->role == 'admin'){
                return redirect()->intended('/admin/dashboard');
            }
            else if(Auth::user()->role == 'trainee'){
                return redirect()->intended('/trainee/dashboard');
            }
            else if(Auth::user()->role == 'cd'){
                return redirect()->intended('/courseDirector/dashboard');
            }
            else{
                return redirect()->intended('/monitorCell/dashboard');
            }
        }
        return view('login');
    }
    public function authenticate(Request $request){
        $validator = Validator::make($request->all(), [
            'phone'=>'required|numeric',
            'password'=>'required',
        ]);

    if($validator->passes()){
        if(Auth::attempt(['phone' =>  $request->input('phone'), 'password' =>  $request->input('password')])){
            if(Auth::user()->role == 'admin'){
                return redirect()->intended('admin/dashboard');
            }
            else if(Auth::user()->role == 'trainee'){
                return redirect()->intended('trainee/dashboard');
            }
            else if(Auth::user()->role == 'cd'){
                return redirect()->intended('courseDirector/dashboard');
            }
            else if(Auth::user()->role == 'deo'){
                return redirect()->intended('deo/dashboard');
            }
            else{
                return redirect()->intended('monitorCell/dashboard');
            }

        }else{
            return redirect()->route('login')->with('Either phone number or password is incorrect');
        }
    }else{
        return redirect()->route('login')
               ->withInput()
               ->withErrors($validator);
    }

    }

    public function register(){
        return view('register');
    }

    //send otp to user

   // Function to send OTP
   private function sendOtpToPhone($otp, $phoneNumber) {
    $url = "https://govtsms.odisha.gov.in/api/api.php";
    $content = "$otp is the OTP for Password reset, MDRAFM Govt. of Odisha.";

    $postData = [
        'action' => 'singleSMS',
        'department_id' => 'D018001',
        'template_id' => '1007820644219645124',
        'sms_content' => $content,
        'phonenumber' => $phoneNumber
    ];

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Accept: text/plain']);

    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        return ["status" => "error", "message" => curl_error($ch)];
    } else {
        $httpStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ($httpStatus === 200) {
            return ["status" => "success"];
        } else {
            return ["status" => "error", "message" => "Failed to send OTP. Please try again later."];
        }
    }
    curl_close($ch);
}

// Method to send OTP
public function sendOTP(Request $request) {
    $request->validate([
        'phone' => 'required|numeric',
    ]);

    $otp = rand(100000, 999999); // Generate a 6-digit OTP
    Session::put('otp', $otp);   // Save OTP to session
    Session::put('phone', $request->phone);

    $response = $this->sendOtpToPhone($otp, $request->phone);

    if ($response['status'] === 'success') {
        return response()->json([
            'success' => true,
            'message' => "OTP sent successfully to your phone number.",
        ]);
    } else {
        return response()->json([
            'success' => false,
            'message' => $response['message'],
        ]);
    }
}



    //register process

    public function processRegister(Request $request){
        //dd($request);
        $validator = Validator::make($request->all(), [
            'name'=>'required',
            'phone'=>'required|numeric',
            'email'=>'required|email|unique:users',
            'hrmsId'=>'required',
            'otp' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return redirect()->route('register')
                ->withInput()
                ->withErrors($validator);
        }

        // Verify OTP
    if (Session::get('otp') != $request->otp || Session::get('phone') != $request->phone) {
        return redirect()->route('register')
            ->withInput()
            ->withErrors(['otp' => 'Invalid OTP. Please try again.']);
    }

    // Clear OTP from session
    Session::forget('otp');
    Session::forget('phone');

    if($validator->passes()){
          $user = new User();
          $user->name = $request->input('name');
          $user->phone = $request->input('phone');
          $user->email = $request->input('email');
          $user->hrmsId = $request->input('hrmsId');
          $user->password = Hash::make(12345);
          $user->role = 'trainee';
          $user->save();
          return redirect()->route('login')->with('success','You have been registered successfully');
    }else{
        return redirect()->route('register')
               ->withInput()
               ->withErrors($validator);
    }

    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
