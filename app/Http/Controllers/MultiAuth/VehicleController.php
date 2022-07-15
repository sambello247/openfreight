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
        $this->middleware('auth:admin');
        $this->middleware('role:super', ['only'=>'show']);
        $this->adminModel = config('multiauth.models.admin');
    }


    public function index()
    {
        //

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


        $vehiclemodel = New Vehicle;

        $vehiclemodel->owner_name = $request->input('owner-name');
        $vehiclemodel->vehicle_brand = $request->input('vehicle-brand');
        $vehiclemodel->vehicle_model = $request->input('vehicle-model');
        $vehiclemodel->vehicle_image = $request->input('vehicle-image');
        $vehiclemodel->fuel_type = $request->input('fuel-type');
        $vehiclemodel->plate_number = $request->input('plate-number');
        $vehiclemodel->plate_expiry = $request->input('plate-expiry');
        $vehiclemodel->weight = $request->input('weight');
        $vehiclemodel->mileage = $request->input('mileage');
        $vehiclemodel->last_inspection = $request->input('last-inspection');

        $vehiclemodel->save();

        return redirect('/admin/vehicle');


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
