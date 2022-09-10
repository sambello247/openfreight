<?php

namespace App\Http\Controllers\MultiAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Driver;
use App\Models\Vehicle;
use App\Models\Package;
use Active;

class DashboardController extends Controller
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
        
        $driverCount = Driver::count();
        $vehicleCount = Vehicle::count();


        $packageValueSum = Package::sum('declared_value');

        $activeUsercount = Active::users()->count();
        $activeUsers = Active::users()->get();

        $costSum = Package::sum('shipping_cost');
        $saleCount = Package::count('shipping_cost');

        return view('vendor/multiauth.dashboard')->with('driverCount', $driverCount)->with('vehicleCount', $vehicleCount)
        ->with('packageValueSum', $packageValueSum)->with('activeUsercount', $activeUsercount)->with('activeUsers',$activeUsers)
        ->with('costSum', $costSum)->with('saleCount', $saleCount);
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
