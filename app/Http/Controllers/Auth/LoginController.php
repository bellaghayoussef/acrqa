<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;
use Twilio\Rest\Client ;
use Response;
use Illuminate\Support\Facades\Hash;
use App\Models\countries;
use Crypt;

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
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function confirme(Request $request){
      dd($request);
      return view('auth.confirm');
    }

    public function logins(Request $request){
 $phoneNum = '+'.$request->code.$request->phone;

 $countries = countries::where('phonecode',$request->code)->first();

  $user = User::where('phone', $request->phone)->where('country_id', $countries->id)->first();


   if($user){
   
     $code = mt_rand(1000, 9999);


try {
      $sid = 'AC6df6b0f4c3d2f8188cb2cf40199f9d66';
$token = '5adfa781ac9100d442d67ea6147b4337';
$cliente = new Client($sid, $token);


$cliente->messages->create(
    // the number you'd like to send the message to
     $phoneNum,
    array(
        // A Twilio phone number you purchased at twilio.com/console
        'from' =>  '+14256005591',
        // the body of the text message you'd like to send
        'body' => 'Hello dear customer, Your  access code is: '.$code .'مرحبا عزيزي المستخدم ' .'رقم التفعيل في  هو : '.$code
    )
);
} catch (Exception $e) {
   return Response::json(array('success' => false)); 
}



  $user->password = Hash::make($code);

     $user->save();

     
     //$client->passwo = $client->password;
    // return redirect('confirme')->with(['success' => true, 'email' => $user->email,'code'=> $code]);
      return Response::json(array('success' => true, 'email' => $user->email,'code'=> $code));
  }else{
    return Response::json(array('success' => true));
  }


         
    }
}
