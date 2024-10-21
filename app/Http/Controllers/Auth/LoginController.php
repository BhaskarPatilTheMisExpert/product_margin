<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;
use App\Models\Otp;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Mail\OtpMail;
use Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Auth\cookieValue;
use Illuminate\Support\Facades\Crypt;
use App\Services\AuthService;


class LoginController extends Controller
{


    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AuthService $authService)
    {
        $this->middleware('guest')->except('logout');

        $this->authService = $authService;
    }

    public function login(Request $request)
    {
        // dd($request);
        $input = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        //old code 
        // $serviceData = $this->authService->authenticateUser($input);
        //new line
        $serviceData = $this->authService->authLoginUser($input);
        // dd($input);
        if ($serviceData['success']) {
            return redirect()->route('admin.home');
        } else {
            return redirect()->route('login')->with('message', $serviceData['data']);
        }
    }

    public function generateOtp(Request $request)
    {  
        
        if ($request->isMethod('post')) {

            $updateStatus = Otp::where([
                ['status', '=', 'A'],
                ['expire_time', '<', Carbon::now('Asia/Kolkata')]
            ])->update(['status' => 'I']);

            $email = $request->email;
            if (!$email) {
                return response()->json(['message' => __('auth.missingEmail')], 400);
             }
             $emailExist = User::where('email', $email)->first();

             if ($emailExist) {
                if ($emailExist->status == 'A') {
                    $existingOtp = Otp::where('user_id', $emailExist->id)
                        ->where('status', 'A')
                        ->where('expire_time', '>', Carbon::now('Asia/Kolkata'))
                        ->first();
                    if ($existingOtp) {
                        $formattedExpireAt = Carbon::parse($existingOtp->expire_time)->format('d/m/Y H:i:s');
                        $sendMail = Mail::to($email)->send(new OtpMail($existingOtp->otp, $formattedExpireAt));
                        return response()->json(['message' => 'OTP sent successfully to the registered Email']);
                    } else {
                        $otp = mt_rand(100000, 999999);
                        $expiresAt = Carbon::now('Asia/Kolkata')->addMinutes(5);
                        $formattedExpiresAt = $expiresAt->format('d/m/Y H:i:s');
                        $saveData = Otp::insert([
                            'user_id' => $emailExist->id,
                            'otp' => $otp,
                            'expire_time' => $expiresAt,
                            'status' => 'A',
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);
                        if($saveData){
                        $sendMail = Mail::to($email)->send(new OtpMail($otp, $formattedExpiresAt));
                        return response()->json(['message' => 'OTP sent successfully to the registered Email']);
                       // return response()->json($request);
                        }
                    }
                } elseif ($emailExist->status == 'L') {
                    return response()->json(['message' => __('auth.locked')]);
                } elseif ($emailExist->status == 'D') {
                    return response()->json(['message' => __('auth.dormant')]);
                } else {
                    return response()->json(['message' => __('auth.inactive')]);
                }
            } else {
                return response()->json(['message' => __('auth.invalidEmail')]);
                // return response()->json($request);
            }
        }
       
      
    }
}
