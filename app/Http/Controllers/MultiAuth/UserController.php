<?php

namespace App\Http\Controllers\multiauth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
Use App\Models\User;
Use App\Models\Profile;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct()
    {   
        //Middleware For Multi Authentication
        $this->middleware('auth:admin');
        $this->middleware('role:super', ['only'=>'show']);
        $this->adminModel = config('multiauth.models.admin');
    }


    public function index()
    {
        

        //Paginate User With Profile
        $users = User::orderBy('id', 'desc')->with('profile')->paginate(2);
        return view('multiauth::admin.user')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Return View of Create-User
        return view('multiauth::admin.create-user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    

        //Form Validation
        $this->validate($request, [
            'first-name' => 'required',
            'last-name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'image' => 'required',
            'account-type' => 'required',
            'account-status' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'phone' => 'required',
            'postal' => 'required',
            'dob' => 'required',
        ]);

        //New User Model
        $userModel = new User;

        //Append Form Requests to User Model Columns
        $userModel->first_name = $request->input('first-name');
        $userModel->last_name = $request->input('last-name');
        $userModel->email = $request->input('email');
        $userModel->password = Hash::make($request->input('password'));
        $userModel->account_type = $request->input('account-type');
        $userModel->account_status = $request->input('account-status');

        //New Profile Model
        $profileModel = new Profile;

        //Append Form Request to Profile Model Columns
        $profileModel->image = $request->input('image');
        $profileModel->business_name = $request->input('business-name');
        $profileModel->address = $request->input('address');
        $profileModel->city = $request->input('city');
        $profileModel->state = $request->input('state');
        $profileModel->country = $request->input('country');
        $profileModel->phone = $request->input('phone');
        $profileModel->postal = $request->input('postal');
        $profileModel->dob = $request->input('dob');
        $profileModel->website = $request->input('website');
        $profileModel->facebook = $request->input('facebook');
        $profileModel->linkedin = $request->input('linkedin');
        $profileModel->twitter = $request->input('twitter');
        $profileModel->instagram = $request->input('instagram');

        
        //Save Into User Model
        $userModel->save();
        
        //Save Into Related Model
        $userModel->profile()->save($profileModel);


        return redirect('/admin/users')->with('success','User has been successfully added');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Find User Id
        $user = User::find($id);
        return view('multiauth::admin.update-user')->with('user', $user);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Form Validation
        $this->validate($request, [
            'first-name' => 'required',
            'last-name' => 'required',
            // 'email' => 'required|unique:users,email',
            'email' => 'required',
            'password' => 'required',
            'image' => 'required',
            'account-type' => 'required',
            'account-status' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'phone' => 'required',
            'postal' => 'required',
            'dob' => 'required',
        ]);


         //New User Model
         $userModel = User::find($id);

         //Append Form Requests to User Model Columns
         $userModel->first_name = $request->input('first-name');
         $userModel->last_name = $request->input('last-name');
         $userModel->email = $request->input('email');
         $userModel->password = Hash::make($request->input('password'));
         $userModel->account_type = $request->input('account-type');
         $userModel->account_status = $request->input('account-status');

        
 
         //New Profile Model
         $profileModel = Profile::find($id);

        //  dd($id);
 
         //Append Form Request to Profile Model Columns
         $profileModel->image = $request->input('image');
         $profileModel->business_name = $request->input('business-name');
         $profileModel->address = $request->input('address');
         $profileModel->city = $request->input('city');
         $profileModel->state = $request->input('state');
         $profileModel->country = $request->input('country');
         $profileModel->phone = $request->input('phone');
         $profileModel->postal = $request->input('postal');
         $profileModel->dob = $request->input('dob');
         $profileModel->website = $request->input('website');
         $profileModel->facebook = $request->input('facebook');
         $profileModel->linkedin = $request->input('linkedin');
         $profileModel->twitter = $request->input('twitter');
         $profileModel->instagram = $request->input('instagram');
 

         //Save Into User Model
         $userModel->save();

         //Save Into Related Model (Profile)
         $userModel->profile()->save($profileModel);
        
         //Return Redirect With Success Message
         return redirect('/admin/users')->with('success','User has been successfully updated');




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Find User Id
        $user = User::find($id);

        //Delete User
        $user->delete();

        //Return Redirect With Success Message.
        return redirect('/admin/users')->with('success','User has been successfully removed');
    }
}
