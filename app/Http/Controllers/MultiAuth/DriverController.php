<?php

namespace App\Http\Controllers\MultiAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Driver;

class DriverController extends Controller
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

        $drivers = Driver::paginate(2);	
        return view('multiauth::admin.driver')->with('drivers', $drivers);

        // $drivers = Driver::find(2);
        // dd($drivers);
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
        //Form Validation
        $this->validate($request, [
            'full-name' => 'required',
            'image' => 'required',
            'type' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'postal' => 'required',
            'dob' => 'required',
        ]);

        $drivermodel = new Driver;

        $drivermodel->name = $request->input('full-name');
        $drivermodel->image = $request->input('image');
        $drivermodel->type = $request->input('type');
        $drivermodel->address = $request->input('address');
        $drivermodel->city = $request->input('city');
        $drivermodel->state = $request->input('state');
        $drivermodel->country = $request->input('country');
        $drivermodel->phone = $request->input('phone');
        $drivermodel->email = $request->input('email');
        $drivermodel->postal = $request->input('postal');
        $drivermodel->dob = $request->input('dob');
 
        $drivermodel->save();

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
