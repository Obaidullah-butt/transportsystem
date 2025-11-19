<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;

use Illuminate\Http\Request;
use Auth;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    public function show_reg_vehicle()
    {
      return view('provider.regvehicle');
    }



    public function Register_Vehicle(Request $request)
{
    $request->validate([
        'vehicle_number'  => 'required|string|unique:vehicles,vehicle_number',
        'chassis_number'  => 'required|string|unique:vehicles,chassis_number',
        'vehicle_type'    => 'required|string|max:50',
        'can_carry'       => 'required|string|max:100',
        'weight_capacity' => 'required|integer|min:0',
        'vehicle_image'   => 'required|image|mimes:jpg,jpeg,png|max:4096',
        'smartcard_image' => 'required|image|mimes:jpg,jpeg,png|max:4096',
    ]);

    $user_id = session('user_id');

    // Upload Vehicle Image
    if ($request->hasFile('vehicle_image')) {
        $vehicleImg = $request->file('vehicle_image');
        $vehicleImageName = time() . '_vehicle_' . uniqid() . '.' . $vehicleImg->getClientOriginalExtension();
        $vehicleImg->move(public_path('uploads/vehicles'), $vehicleImageName);
    } else {
        $vehicleImageName = null;
    }

    // Upload Smartcard Image
    if ($request->hasFile('smartcard_image')) {
        $smartcardImg = $request->file('smartcard_image');
        $smartcardImageName = time() . '_smartcard_' . uniqid() . '.' . $smartcardImg->getClientOriginalExtension();
        $smartcardImg->move(public_path('uploads/smartcards'), $smartcardImageName);
    } else {
        $smartcardImageName = null;
    }

    Vehicle::create([
        'user_id' => $user_id,
        'vehicle_number' => $request->vehicle_number,
        'chassis_number' => $request->chassis_number,
        'vehicle_type' => strtolower($request->vehicle_type),
        'can_carry' => $request->can_carry,
        'weight_capacity' => $request->weight_capacity,
        'vehicle_image' => $vehicleImageName,
        'smartcard_image' => $smartcardImageName,
        // status defaults to 'pending' and is_booked defaults to 'no' (per migration)
    ]);

    return redirect()->route('provider.login')->with('success', 'Service Provider Registered Successfully! (Vehicle submitted for approval)');
}



    
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehicle $vehicle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vehicle $vehicle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehicle $vehicle)
    {
        //
    }



    public function pendingvehicle()
{
    // Eager load service provider info
    $pendingVehicles = Vehicle::where('status', 'pending')->with('user')->get();

    return view('admin.pendingvehicle', compact('pendingVehicles'));
}


public function approveVehicle($id)
{
    $vehicle = Vehicle::findOrFail($id);
    $vehicle->status = 'approved';
    $vehicle->save();

    return redirect()->back();
}

public function rejectVehicle($id)
{
    $vehicle = Vehicle::findOrFail($id);
    $vehicle->status = 'rejected';
    $vehicle->save();

     return redirect()->back()->with('success', 'Vehicle rejected successfully.');
}



//for admin

public function showAvailable()
    {
        $availableVehicles = Vehicle::where('status', 'approved')->where('is_booked', 'no')->with('user')->get();

        return view('admin.seeavailable', compact('availableVehicles'));
    }


    //for customer

    public function showCusAvailable()
    {
        $availableVehicles = Vehicle::where('status', 'approved')->where('is_booked', 'no')->with('user')->get();

        return view('customer.availbaleVehicle', compact('availableVehicles'));
    }


}
