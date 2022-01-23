<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Log;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\PersonalAccessToken;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen.
    |
    */

    // properties
    public $redirectAfterLogout;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // you can alter this route in logout method this is the default path
        $this->redirectAfterLogout = '/';
        $this->redirectIfAuthenticated = '/';
    }

    /**
     * Show the application login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm(Request $request)
    {
        if(Auth::check()){
            Log::info(Auth::user()->id.' already logged in, redirecting to homepage');
            return redirect( $this->redirectIfAuthenticated );
        }
        return view('auth.login');
    }

    public function logout()
    {
        session()->flush();

        return redirect( $this->redirectAfterLogout );
    }

    public function login(Request $request){
        $user = User::where('email', $request['email'])->first();
        if($user){
            if(Hash::check($request['password'], $user->password)){
                Auth::login($user);
                $userReturned = $user->only(['username', 'email']);
                $redirectUrl = redirect()->intended()->getTargetUrl();
                return response()->json(['status' => 'success', 'redirectUrl' => $redirectUrl, 'user' => $userReturned,
                'message' => 'Login Successfull']);
            }else{
                Log::info($user->id.' authentication failed');
                return response()->json(['status' => 'failed', 'message' => 'User password does not match']);
            }
        }else{
            Log::info('user not found with email: '.$request['email']);
            return response()->json(['status' => 'failed', 'message' => 'User not found']);
        }
    }

    public function register(Request $request){
        $data = $request['data'];
        $user = User::where('email', $data['email'])->first();
        if($user){
            $redirectUrl = route('login');
            return response()->json(['status' => 'user_exists', 'message' => 'Already registered. Please login',
            'redirectUrl' => $redirectUrl]);
        }
        
        $data['id'] = Str::uuid()->toString();
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);

        // generate personal access token
        PersonalAccessToken::create([
            'id' => Str::uuid()->toString(),
            'user_id' => $user->id,
            'token' => Str::random(60)
        ]);

        $userReturned = $user->only(['username', 'email']);
        $redirectUrl = $this->redirectAfterLogout;
        return response()->json(['status' => 'success', 'message' => 'User registered successfully',
        'redirectUrl' => $redirectUrl, 'user' => $userReturned]);
    }
}