<?php

namespace App\Http\Controllers\multiauth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vehicle;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {   
        //Middleware for Multi Authentication
        $this->middleware('auth:admin');
        $this->middleware('role:super', ['only'=>'show']);
        $this->adminModel = config('multiauth.models.admin');
    }


    public function index()
    {
        //
        //Paginate Vehicle Orderby Id Desc
        $vehicles = Vehicle::orderby('id', 'desc')->paginate(2);
        return view('multiauth::admin.vehicle')->with('vehicles', $vehicles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Return View of Create-Vehicle
        return view('multiauth::admin.create-vehicle');
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
            'owner-name' => 'required',
            'vehicle-brand' => 'required',
            'vehicle-model' => 'required',
            'vehicle-image' => 'required',
            'fuel-type' => 'required',
            'plate-number' => 'required',
            'plate-expiry' => 'required',
            'weight' => 'required',
            'mileage' => 'required',
            'last-inspection' => 'required',
        ]);

        //New Vehicle Model
        $vehicleModel = New Vehicle;

        //Append Form Requests to Vehicle Model Columns
        $vehicleModel->owner_name = $request->input('owner-name');
        $vehicleModel->vehicle_brand = $request->input('vehicle-brand');
        $vehicleModel->vehicle_model = $request->input('vehicle-model');
        $vehicleModel->vehicle_image = $request->input('vehicle-image');
        $vehicleModel->fuel_type = $request->input('fuel-type');
        $vehicleModel->plate_number = $request->input('plate-number');
        $vehicleModel->plate_expiry = $request->input('plate-expiry');
        $vehicleModel->weight = $request->input('weight');
        $vehicleModel->mileage = $request->input('mileage');
        $vehicleModel->last_inspection = $request->input('last-inspection');

        //Save Into Vehicle Model
        $vehicleModel->save();

        //Return Redirect to Vehicle Page With Success Message
        return redirect('/admin/vehicle')->with('success','New vehicle has been successfuly added');


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
        //Find Vehicle Id
        $vehicle = Vehicle::find($id);

        //Return View of Update-Vehicle With Vehicle data
        return view('multiauth::admin.update-vehicle')->with('vehicle', $vehicle);
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
            'owner-name' => 'required',
            'vehicle-brand' => 'required',
            'vehicle-model' => 'required',
            'vehicle-image' => 'required',
            'fuel-type' => 'required',
            'plate-number' => 'required',
            'plate-expiry' => 'required',
            'weight' => 'required',
            'mileage' => 'required',
            'last-inspection' => 'required',
        ]);

        //Find Vehicle Id For Update
        $vehicleModel = Vehicle::find($id);

        //Append Form Requests to Vehicle Model Columns
        $vehicleModel->owner_name = $request->input('owner-name');
        $vehicleModel->vehicle_brand = $request->input('vehicle-brand');
        $vehicleModel->vehicle_model = $request->input('vehicle-model');
        $vehicleModel->vehicle_image = $request->input('vehicle-image');
        $vehicleModel->fuel_type = $request->input('fuel-type');
        $vehicleModel->plate_number = $request->input('plate-number');
        $vehicleModel->plate_expiry = $request->input('plate-expiry');
        $vehicleModel->weight = $request->input('weight');
        $vehicleModel->mileage = $request->input('mileage');
        $vehicleModel->last_inspection = $request->input('last-inspection');

        //Save Into Vehicle Model
        $vehicleModel->save();

        //Return Redirect to Vehicle Page With Success Message.
        return redirect('/admin/vehicle')->with('success','Vehicle updated successully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       //Find Vehicle Id
       $vehicle = Vehicle::find($id);

       //Delete Vehicle
       $vehicle->delete();

       //Return Redirect to Vehicle Page With Success Message
       return redirect('/admin/vehicle')->with('success','Vehicle removed');
    }
}
