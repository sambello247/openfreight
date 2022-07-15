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
        $this->middleware('auth:admin');
        $this->middleware('role:super', ['only'=>'show']);
        $this->adminModel = config('multiauth.models.admin');
    }


    public function index()
    {
        //
        
        
        // $users = User::find(1);
        // $profiles = $users->profile;
        // dd($profiles);

        //Eloquent Join User table with profile and paginate.
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        //Form Validation
        $this->validate($request, [
            'first-name' => 'required',
            'last-name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'image' => 'required',
            'account-type' => 'required',
            'account-status' => 'required',
            'business-name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'phone' => 'required',
            'postal' => 'required',
            'dob' => 'required',
            'website' => 'required',
            'facebook' => 'required',
            'linkedin' => 'required',
            'twitter' => 'required',
            'instagram' => 'required',
        ]);

        //Get the class of user model
        $usermodel = new User;

        $usermodel->first_name = $request->input('first-name');
        $usermodel->last_name = $request->input('last-name');
        $usermodel->email = $request->input('email');
        $usermodel->password = Hash::make($request->input('password'));
        $usermodel->account_type = $request->input('account-type');
        $usermodel->account_status = $request->input('account-status');
        $usermodel->save();

        //Get the class of profile model
        $profilemodel = new Profile;

        $profilemodel->image = $request->input('image');
        $profilemodel->business_name = $request->input('business-name');
        $profilemodel->address = $request->input('address');
        $profilemodel->city = $request->input('city');
        $profilemodel->state = $request->input('state');
        $profilemodel->country = $request->input('country');
        $profilemodel->phone = $request->input('phone');
        $profilemodel->postal = $request->input('postal');
        $profilemodel->dob = $request->input('dob');
        $profilemodel->website = $request->input('website');
        $profilemodel->facebook = $request->input('facebook');
        $profilemodel->linkedin = $request->input('linkedin');
        $profilemodel->twitter = $request->input('twitter');
        $profilemodel->instagram = $request->input('instagram');

        //Save realated tables user and profile
        $usermodel->profile()->save($profilemodel);

        return redirect('/admin/users');



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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
