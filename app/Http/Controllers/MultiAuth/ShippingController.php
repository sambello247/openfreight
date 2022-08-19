<?php

namespace App\Http\Controllers\multiauth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Package;
use App\Models\ServiceOption;
use App\Models\Shipper;
use App\Models\Receiver;

class ShippingController extends Controller
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
        //Paginate package with shipper, receiver and serviceoption
        $packages = Package::orderBy('id', 'desc')->with('Shipper')->with('Receiver')->with('ServiceOption')->paginate(2);
        
        //Return View of "shipping" with packages
        return view('multiauth::admin.shipping')->with('packages', $packages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Return View of "create-shipping"
        return view('multiauth::admin.create-shipping');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate shipping transaction form post
        $this->validate($request, [
            'shipper-fullname' => 'required',
            'shipper-phone' => 'required',
            'shipper-email' => 'required',
            'shipper-address-line-1' => 'required',
            'shipper-city' => 'required',
            'shipper-state' => 'required',
            'shipper-postal' => 'required',
            'shipper-country' => 'required',

            'receiver-fullname' => 'required',
            'receiver-phone' => 'required',
            'receiver-email' => 'required',
            'receiver-address-line-1' => 'required',
            'receiver-city' => 'required',
            'receiver-state' => 'required',
            'receiver-postal' => 'required',
            'receiver-country' => 'required',

            'service' => 'required',

            'user-email' => 'required',
            'shipping-code' => 'required|unique:packages,shipping_code',
            'declared-value' => 'required',
            'quantity' => 'required',
            'quantity' => 'required',
            'weight' => 'required',
            'weight-type' => 'required',
            'ship-date' => 'required',
            'schedule-delivery' => 'required',

        ]);

        //New Shipper Model
        $shipperModel = new Shipper;

        //Append Form Requests to Shipper Model Columns
        $shipperModel->fullname = $request->input('shipper-fullname');
        $shipperModel->company_name = $request->input('shipper-company-name');
        $shipperModel->department = $request->input('shipper-department');
        $shipperModel->phone = $request->input('shipper-phone');
        $shipperModel->fax = $request->input('shipper-fax');
        $shipperModel->email = $request->input('shipper-email');
        $shipperModel->address_line_1 = $request->input('shipper-address-line-1');
        $shipperModel->address_line_2 = $request->input('shipper-address-line-2');
        $shipperModel->city = $request->input('shipper-city');
        $shipperModel->state = $request->input('shipper-state');
        $shipperModel->postal = $request->input('shipper-postal');
        $shipperModel->country = $request->input('shipper-country');
        $shipperModel->ship_date = $request->input('ship-date');


        //New Receiver Model
        $receiverModel = new Receiver;

        //Append Form Requests to Receiver Model Columns
        $receiverModel->fullname = $request->input('receiver-fullname');
        $receiverModel->company_name = $request->input('receiver-company-name');
        $receiverModel->department = $request->input('receiver-department');
        $receiverModel->phone = $request->input('receiver-phone');
        $receiverModel->fax = $request->input('receiver-fax');
        $receiverModel->email = $request->input('receiver-email');
        $receiverModel->address_line_1 = $request->input('receiver-address-line-1');
        $receiverModel->address_line_2 = $request->input('receiver-address-line-2');
        $receiverModel->city = $request->input('receiver-city');
        $receiverModel->state = $request->input('receiver-state');
        $receiverModel->postal = $request->input('receiver-postal');
        $receiverModel->country = $request->input('receiver-country');
        $receiverModel->scheduled_delivery = $request->input('schedule-delivery');

    
        //New Service Option Model
        $serviceOptionModel = new ServiceOption;

        //Append Form Requests to Service Option Model Columns
        $serviceOptionModel->dropoff_type = $request->input('dropoff-type');
        $serviceOptionModel->destination_is = $request->input('destination');
        $serviceOptionModel->service = $request->input('service');
        $serviceOptionModel->signature_option = $request->input('signature-option');


         //New Package Model
         $packageModel = new Package;



        //Check User By Form Request Email
        $user = User::where('email', '=', $request->input('user-email'))->first();

        if(!$user) {

            // Handle The Case If No User is Found
            return redirect('/admin/shipping')->with('error', 'User not identified, please try another user email');
        }

        else{

          //Retreive User Id by Form Request Email
          $user = User::select('id')->where('email', $request->input('user-email'))->first();
          
         //Append Form Requests to Package Model Columns
         $packageModel->user_id = $user->id;
         $packageModel->shipping_code = $request->input('shipping-code');
         $packageModel->packaging = $request->input('packaging');
         $packageModel->declared_value = $request->input('declared-value');
         $packageModel->qty = $request->input('quantity');
         $packageModel->weight = $request->input('weight');
         $packageModel->weight_type = $request->input('weight-type');
         $packageModel->measurement_in = $request->input('measurement');
         $packageModel->length = $request->input('length');
         $packageModel->width = $request->input('width');
         $packageModel->height = $request->input('height');
         $packageModel->shipping_cost = $request->input('shipping-cost');

         //Save Into Package Model
         $packageModel->save();

         //Save Into Related Models.
         $packageModel->shipper()->save($shipperModel);
         $packageModel->receiver()->save($receiverModel);
         $packageModel->serviceoption()->save($serviceOptionModel);

        //Redirect To Shipping With Success Message
         return redirect('/admin/shipping')->with('success','Shipping has been succcessfully added.');
        } 
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
        //Find Package ID
        $package = Package::find($id);
        return view('multiauth::admin.update-shipping')->with('package', $package);

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
            'shipper-fullname' => 'required',
            'shipper-phone' => 'required',
            'shipper-email' => 'required',
            'shipper-address-line-1' => 'required',
            'shipper-city' => 'required',
            'shipper-state' => 'required',
            'shipper-postal' => 'required',
            'shipper-country' => 'required',

            'receiver-fullname' => 'required',
            'receiver-phone' => 'required',
            'receiver-email' => 'required',
            'receiver-address-line-1' => 'required',
            'receiver-city' => 'required',
            'receiver-state' => 'required',
            'receiver-postal' => 'required',
            'receiver-country' => 'required',

            'service' => 'required',

            'user-email' => 'required',
            'shipping-code' => 'required',
            'declared-value' => 'required',
            'quantity' => 'required',
            'quantity' => 'required',
            'weight' => 'required',
            'weight-type' => 'required',
            'ship-date' => 'required',
            'schedule-delivery' => 'required',

        ]);

        //Find Shipper Id For Update
        $shipperModel = Shipper::find($id);

        //Append Form Requests to Shipper Model Columns
        $shipperModel->fullname = $request->input('shipper-fullname');
        $shipperModel->company_name = $request->input('shipper-company-name');
        $shipperModel->department = $request->input('shipper-department');
        $shipperModel->phone = $request->input('shipper-phone');
        $shipperModel->fax = $request->input('shipper-fax');
        $shipperModel->email = $request->input('shipper-email');
        $shipperModel->address_line_1 = $request->input('shipper-address-line-1');
        $shipperModel->address_line_2 = $request->input('shipper-address-line-2');
        $shipperModel->city = $request->input('shipper-city');
        $shipperModel->state = $request->input('shipper-state');
        $shipperModel->postal = $request->input('shipper-postal');
        $shipperModel->country = $request->input('shipper-country');
        $shipperModel->ship_date = $request->input('ship-date');

        //Find Reciever Id For Update
        $receiverModel = Receiver::find($id);

        //Append Form Requests to Receiver Model Columns
        $receiverModel->fullname = $request->input('receiver-fullname');
        $receiverModel->company_name = $request->input('receiver-company-name');
        $receiverModel->department = $request->input('receiver-department');
        $receiverModel->phone = $request->input('receiver-phone');
        $receiverModel->fax = $request->input('receiver-fax');
        $receiverModel->email = $request->input('receiver-email');
        $receiverModel->address_line_1 = $request->input('receiver-address-line-1');
        $receiverModel->address_line_2 = $request->input('receiver-address-line-2');
        $receiverModel->city = $request->input('receiver-city');
        $receiverModel->state = $request->input('receiver-state');
        $receiverModel->postal = $request->input('receiver-postal');
        $receiverModel->country = $request->input('receiver-country');
        $receiverModel->scheduled_delivery = $request->input('schedule-delivery');

        //Find Service Option Id For Update
        $serviceOptionModel = ServiceOption::find($id);

        //Append Form Requests to Service Option Model Columns
        $serviceOptionModel->dropoff_type = $request->input('dropoff-type');
        $serviceOptionModel->destination_is = $request->input('destination');
        $serviceOptionModel->service = $request->input('service');
        $serviceOptionModel->signature_option = $request->input('signature-option');

        // Find Package Id For Update
        $packageModel = Package::find($id);

        //Check User Email By Form  User Email
        $user = User::where('email', '=', $request->input('user-email'))->first();

        
        //Append Form Requests to Package Model Columns
        $packageModel->user_id = $user->id;
        $packageModel->shipping_code = $request->input('shipping-code');
        $packageModel->packaging = $request->input('packaging');
        $packageModel->declared_value = $request->input('declared-value');
        $packageModel->qty = $request->input('quantity');
        $packageModel->weight = $request->input('weight');
        $packageModel->weight_type = $request->input('weight-type');
        $packageModel->measurement_in = $request->input('measurement');
        $packageModel->length = $request->input('length');
        $packageModel->width = $request->input('width');
        $packageModel->height = $request->input('height');
        $packageModel->shipping_cost = $request->input('shipping-cost');

        //Save Into Package Model
        $packageModel->save();

        //Save Into  Related Models.
        $packageModel->shipper()->save($shipperModel);
        $packageModel->receiver()->save($receiverModel);
        $packageModel->serviceoption()->save($serviceOptionModel);

        //Redirect to Shipping Page With Success Message.
        return redirect('/admin/shipping')->with('success','Shipping has been succcessfully updated.');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Find Package By Id 
        $package = Package::find($id);
        
        //Delete Related Model
        $package->receiver()->delete();
        $package->shipper()->delete();
        $package->serviceoption()->delete();

        //Delete Package
        $package->delete();
        
        //Redirect To Shipping Page With Success Message
        return redirect('/admin/shipping')->with('success','Shipment removed');
    }
}
