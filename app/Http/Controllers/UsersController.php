<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\countries as Country;
use App\Models\User as user;
use Illuminate\Http\Request;
use Exception;
use Twilio\Rest\Client ;
use Spatie\Permission\Models\Role;
use Response;
class UsersController extends Controller
{

    /**
     * Display a listing of the users.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $users = user::with('country')->paginate(25);

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new user.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $countries = Country::where('stat',1)->pluck('name','id')->all();
        
        return view('users.create', compact('countries'));
    }

    /**
     * Store a new user in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
           $user =  user::create($data);

$user->assignRole($request->role_id);
$container = Country::find($user->country_id);

// try {
//       $sid = 'AC6df6b0f4c3d2f8188cb2cf40199f9d66';
// $token = '5adfa781ac9100d442d67ea6147b4337';
// $cliente = new Client($sid, $token);

// $phoneNum = '+'.$container->phonecode.$user->phone;
// $cliente->messages->create(
//     // the number you'd like to send the message to
//      $phoneNum,
//     array(
//         // A Twilio phone number you purchased at twilio.com/console
//         'from' =>  '+14256005591',
//         // the body of the text message you'd like to send
//         'body' => 'تم اضافتك في الاتحاد العربي لرياضة سباق الهجن باسم '. $user->first_name .' '. $user->last_name .' (و بصلاحية  '. $user->getRoleNames()[0] .' ) بدولة  '. $container->name .'  يمكنك الان تسجيل الدخول على acr.qa'
//     )
// );
// } catch (Exception $e) {
//    return Response::json(array('success' =>$phoneNum . $e->getMessage())); 
// }


            return redirect()->route('users.user.index')
                ->with('success_message', trans('users.model_was_added'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => $exception->getMessage()]);
        }
    }

    /**
     * Display the specified user.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $user = user::with('country')->findOrFail($id);

        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $user = user::findOrFail($id);
        $countries = Country::where('stat',1)->pluck('name','id')->all();

        return view('users.edit', compact('user','countries'));
    }

    /**
     * Update the specified user in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            $user = user::findOrFail($id);
            $user->update($data);
           $user->roles()->detach();
$user->assignRole($request->role_id);

            return redirect()->route('users.user.index')
                ->with('success_message', trans('users.model_was_updated'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('users.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified user from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $user = user::findOrFail($id);
            $user->delete();

            return redirect()->route('users.user.index')
                ->with('success_message', trans('users.model_was_deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('users.unexpected_error')]);
        }
    }

    
    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request 
     * @return array
     */
    protected function getData(Request $request)
    {
        $rules = [
                'udd' => 'required|string|min:1|max:255',
            'first_name' => 'required|string|min:1|max:255',
            'last_name' => 'required|string|min:1|max:255',
            'email' => 'required|string|min:1|max:255',
            'phone' => 'required|string|min:1|max:255',
            'country_id' => 'required|numeric|min:0',
           
            'password' => 'nullable',
            'role_id' => 'nullable',
           'organization' => 'nullable',
'Region' => 'nullable',
'code_postal' => 'nullable',
'Image' => 'nullable',
'street' => 'nullable',
'Profession' => 'nullable',
        ];
        
        $data = $request->validate($rules);

        $data['password'] = 'password';

        if($request->Image){
             $file = request()->file('Image');
$saved =$file->store('images', ['disk' => 'public']);



      $data['Image'] = $saved;



        }

        return $data;
    }

    public function storeadmin(Request $request)
    {
try{
       
               $data = $this->getData($request);
            
           $user =  user::create($data);
$user->assignRole($request->role_id);

        return ("success");
            
        } catch (Exception $e) {
           return ("failed"); 
        }
       
        // return response()->json($request->name);
       }
 public function profil(){
    $user = auth()->user();
    $countries = Country::where('stat',1)->pluck('name','id')->all();

    return view('users.profil', compact('user','countries'));
 }

public function Signature(Request $request){

    $user = auth()->user();
      try {
            
            $data = $this->getData($request);
            
            
            $user->update($data);
dd($request);
  if($request->signed){
            $folderPath = public_path('images/'); // create signatures folder in public directory
        $image_parts = explode(";base64,", $request->signed);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $name =uniqid() . '.' . $image_type;
        $file = $folderPath . $name;
        file_put_contents($file, $image_base64);

      $user->Signature = 'images/'. $name;

      $user->save();



        }elseif($request->signedimage){
             $file = request()->file('signedimage');
$saved =$file->store('images', ['disk' => 'public']);

      $user->Signature = $saved;

      $user->save();



        }
        
    return redirect()->route('profil');
       
        } catch (Exception $exception) {
 dd($exception);
            return back()->withInput()
                ->withErrors(['unexpected_error' => $exception->getMessage()]);
        }  

 }


}
