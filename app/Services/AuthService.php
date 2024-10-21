<?php

namespace App\Services;

use Exception, Auth;
use App\Models\User;
use Carbon\Carbon;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Otp;
use Illuminate\Support\Facades\Mail;
use App\Mail\OtpMail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Auth\cookieValue;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\URL;

class AuthService
{

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function authenticateUser($input)
    {
        try {
            $response = [
                'success' => 0,
                'data' => __('auth.process_fail')
            ];

            // Check if user exists in our system
            $userExists = $this->user->getUserByEmail($input['email']);
            if ($userExists && $userExists->count()) {
                if (!empty($userExists->last_login)) {
                    $date1 = date_create(date("Y-m-d H:i:s"));
                    $lastlogin = date_diff($date1, date_create($userExists->last_login));
                    $lastloginDays = $lastlogin->format("%a");
                } else {
                    $lastloginDays = 0;
                }

                // Check if user's password failed count is already above 3 or status is locked
                if ($userExists->pwd_failed_count >= 3 || $userExists->status == "L") {
                    $response = [
                        'success' => 0,
                        'data' => __('auth.locked')
                    ];
                } elseif ($userExists->status == "I") {
                    $response = [
                        'success' => 0,
                        'data' => __('auth.inactive')
                    ];
                } elseif ($userExists->status == "D") {
                    $response = [
                        'success' => 0,
                        'data' => __('auth.dormant')
                    ];
                } else {
                    $email = $input['email'];
                    $password = $input['password'];

                    // Check if the password is numeric (OTP)
                    if (is_numeric($password)) {
                        // Check with OTP
                        $otp = $password;
                        $currentTime = Carbon::now('Asia/kolkata');

                        $emailExists = User::where('email', $email)->get();

                        $query = Otp::where('user_id', $emailExists[0]->id)
                            ->where('otp', $otp)
                            ->where('status', '=', 'A')
                            ->where('expire_time', '>=', $currentTime)
                            ->orderBy('created_at', 'desc')
                            ->get();

                        if ($query->isNotEmpty()) {
                            Auth::login($emailExists[0]);
                            $response = [
                                'success' => 1,
                                'data' => "Login success",
                            ];
                        } else {
                            $response['data'] = "Invalid OTP";
                            // Increment password failed count
                            $userExists->pwd_failed_count += 1;
                            $userExists->save();

                            // Check if password failed count reaches 3
                            if ($userExists->pwd_failed_count >= 3) {
                                $userExists->status = 'L';
                                $userExists->save();
                                $response = [
                                    'success' => 0,
                                    'data' =>  __('auth.locked')
                                ];
                            }
                        }
                    } else {
                        // Check with password
                        $credentials = array(
                            'email' => $email,
                            'password' => $password
                        );

                        if (Auth::attempt($credentials)) {
                            $response = [
                                'success' => 1,
                                'data' => "Login success",
                            ];
                        } else {
                            $response = [
                                'success' => 0,
                                'data' => __('auth.failed'),
                            ];
                            // Increment password failed count
                            $userExists->pwd_failed_count += 1;
                            $userExists->save();

                            // Check if password failed count reaches 3
                            if ($userExists->pwd_failed_count >= 3) {
                                $userExists->status = 'L';
                                $userExists->save();
                                $response = [
                                    'success' => 0,
                                    'data' =>  __('auth.locked')
                                ];
                            }
                        }
                    }

                    // Check user status and other conditions
                    if ($response['success']) {
                        if ($userExists->status == 'A') {
                            Auth::login($userExists);
                            $response = [
                                'success' => 1,
                                'data' => __('auth.success'),
                            ];
                        } else if ($userExists->status == 'I') {
                            $response = [
                                'success' => 0,
                                'data' => __('auth.inactive')
                            ];
                        } else if ($userExists->status == 'D') {
                            $response = [
                                'success' => 0,
                                'data' => __('auth.dormant')
                            ];
                        } else if ($lastloginDays >= 45) {
                            $userExists->status = 'D';
                            $userExists->save();
                            $response = [
                                'success' => 0,
                                'data' =>  __('auth.dormant')
                            ];
                        } else {
                            $response = [
                                'success' => 0,
                                'data' => __('auth.invalidEmail')
                            ];
                        }
                    }
                }
            } else {
                $response['data'] =  __('auth.invalidEmail');
            }
        } catch (Exception $ex) {
            $response['data'] = $ex->getMessage();
        } finally {
            if ($response['success']) {
                $loggedInUser = Auth::user();
                $loggedInUser->last_login = date("Y-m-d H:i:s");
                $loggedInUser->save();
            }
            return $response;
        }
    }

    public function validateLDAPDetails($input)
    {
        $response = [
            'success' => 0,
            'data' => __('auth.process_fail')
        ];
        try {
            $user = $input['user'];
            $password = $input['password'];
            $host = 'IDCLDAP';
            $domain = 'MYPIRAMAL.COM';
            $basedn = 'dc=MYPIRAMAL,dc=COM';

            $ad = ldap_connect("ldap://{$host}.{$domain}") or die('Could not connect to LDAP server.');

            ldap_set_option($ad, LDAP_OPT_PROTOCOL_VERSION, 3);
            ldap_set_option($ad, LDAP_OPT_REFERRALS, 0);

            $ldapbind = ldap_bind($ad, "{$user}@{$domain}", $password);
            ldap_unbind($ad);
            if ($ldapbind) {
                $response = [
                    'success' => 1
                ];
            }
        } catch (Exception $ex) {
            $response['data'] = $ex->getMessage();
        } finally {
            return $response;
        }
    }

    public function checkPassword()
    {
    }

    public function authLoginUser($input)
    {
        $response = [
            'success' => 0,
            'data' => __('auth.process_fail')
        ];

        try {
            $failedPwdCount = 0;
            $checkForPassword = false;
            $credentials = [
                'email' => $input['email'],
                'password' => $input['password'],
            ];
            $updateArr = [];
            $userExists = $this->user->getUserByEmail($input['email']);

            // Step 1: If email exists, then check for OTP; otherwise, show the message "Invalid credentials"
            if ($userExists && $userExists->count()) {
                $failedPwdCount = $userExists->pwd_failed_count;
                // Step 2: Check for any active OTP for this email; if it exists, perform other checks; if not, check for the password
                $getActiveOtp = Otp::where('user_id', $userExists->id)
                    ->where('status', '=', 'A')
                    ->orderBy('created_at', 'desc')
                    ->get();
                
                // If OTP is active, validate it; otherwise, login with the password
                if ($getActiveOtp && $getActiveOtp->count()) {
                    $currentTime = Carbon::now('Asia/kolkata');
                    
                    // Check if the OTP is valid or not; if not, then login with the password
                    if (($getActiveOtp[0]->expire_time) > $currentTime && ($getActiveOtp[0]->otp) == $input['password']) {
                        $response = [
                            'success' => 1,
                        ];
                    } else {
                        // If OTP is not valid, then login with the password
                        // $message = ''; // otp expire message here
                        $response['data'] =  __('auth.otp_expired');
                        $checkForPassword = true;
                    }
                } else {
                    // Password logic here: If there is no active OTP, then check for the password
                    $checkForPassword = true;
                }
                $currentDate = date_create(date("Y-m-d H:i:s"));
                $lastlogin = date_diff($currentDate, date_create($userExists->last_login));
                $lastloginDays = $lastlogin->format("%a");
                
                if ($checkForPassword) {
                    if (Auth::attempt($credentials)) {
                        $response = [
                            'success' => 1,
                        ];
                    } else {
                        // Increment password failed count
                        $response['data'] =  __('auth.invalid_otp_pass');
                        $updateArr['pwd_failed_count'] = $userExists->pwd_failed_count += 1;

                        ++$failedPwdCount;
                        if ($failedPwdCount >= 3) {
                            $updateArr['status'] = 'L';
                            $response = [
                                'success' => 0,
                                'data' =>  __('auth.locked')
                            ];
                        }
                        if ($lastloginDays >= 45) {
                            $updateArr['status'] = 'D';
                            $response = [
                                'success' => 0,
                                'data' =>  __('auth.dormant')
                            ];
                        }

                    }
                }
                // Additional Conditions
                if ($response['success']) {
                    if ($userExists->status == 'I') {
                        $response = [
                            'success' => 0,
                            'data' => __('auth.inactive')
                        ];
                    } else if ($userExists->status == 'D') {
                        $response = [
                            'success' => 0,
                            'data' => __('auth.dormant')
                        ];
                    } else if ($lastloginDays >= 45) {
                        $updateArr['status'] = 'D';
                        $response = [
                            'success' => 0,
                            'data' =>  __('auth.dormant')
                        ];
                    } else if ($failedPwdCount >= 3) {
                        $updateArr['status'] = 'L';
                        $response = [
                            'success' => 0,
                            'data' =>  __('auth.locked')
                        ];
                    }else if ($userExists->status == 'A') {
                        Auth::login($userExists);
                        $response = [
                            'success' => 1,
                            'data' => __('auth.success'),
                        ];
                    }
                }
            } else {
                $response['data'] =  __('auth.failed');
            }
        } catch (Exception $ex) {
            $response['data'] = $ex->getMessage();
        } finally {
            if ($response['success'] == 1) {
                $updateArr['pwd_failed_count'] = 0;
                $updateArr['last_login'] = date("Y-m-d H:i:s"); 
            } else {
                Auth::logout();
            }
          //  dd($updateArr);
            if (!empty($updateArr)) {
                $userExists->update($updateArr);
                
            }
            return $response;
        }
    }
}
