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
        //Midlleware for Multi Authentication
        $this->middleware('auth:admin');
        $this->middleware('role:super', ['only'=>'show']);
        $this->adminModel = config('multiauth.models.admin');
    }

    
    public function index()
    {
        //Paginate Driver Order by ID DESC
        $drivers = Driver::orderBy('id', 'DESC')->paginate(2);	
        return view('vendor/multiauth.driver')->with('drivers', $drivers);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Return View For Create Driver 
        return view('vendor/multiauth.create-driver');
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

        //New Driver Model
        $driverModel = new Driver;

        //Append Form Request To Driver Model
        $driverModel->name = $request->input('full-name');
        $driverModel->image = $request->input('image');
        $driverModel->type = $request->input('type');
        $driverModel->address = $request->input('address');
        $driverModel->city = $request->input('city');
        $driverModel->state = $request->input('state');
        $driverModel->country = $request->input('country');
        $driverModel->phone = $request->input('phone');
        $driverModel->email = $request->input('email');
        $driverModel->postal = $request->input('postal');
        $driverModel->dob = $request->input('dob');
 

        //Save Into Driver Model
        $driverModel->save();

        return redirect('/admin/driver')->with('success','New driver has been successfully added.');
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
        //Find Driver ID
        $driver = Driver::find($id);

        //Return View With Driver ID
        return view('vendor/multiauth.update-driver')->with('driver', $driver);
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
        
        //Find Driver ID for Update
        $driverModel = Driver::find($id);

        //Append Form Request To Driver Model columns
        $driverModel->name = $request->input('full-name');
        $driverModel->image = $request->input('image');
        $driverModel->type = $request->input('type');
        $driverModel->address = $request->input('address');
        $driverModel->city = $request->input('city');
        $driverModel->state = $request->input('state');
        $driverModel->country = $request->input('country');
        $driverModel->phone = $request->input('phone');
        $driverModel->email = $request->input('email');
        $driverModel->postal = $request->input('postal');
        $driverModel->dob = $request->input('dob');

        //Save Into Driver Model
        $driverModel->save();

        return redirect('/admin/driver')->with('success','Driver successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Find Driver ID
        $driver = Driver::find($id);

        //Delete Driver
        $driver->delete();
        return redirect('/admin/driver')->with('success','Driver removed');
    }
}
