<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function tripForm()
    {
        return view('customer.form');
    }

    /**
     * Show the form for creating a new resource.
     */
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
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        //
    }







    public function tripSubmit(Request $request)
{
    // Step 1: Validate inputs
    $request->validate([
        'trip_date' => 'required|date',
        'pickup_location' => 'required|string',
        'drop_location' => 'required|string',
        'vehicle_id' => 'required|exists:vehicles,id',
    ]);

    // Step 2: Check if user is logged in
    if (!$request->session()->has('user_id')) {
        return redirect()->route('login')->withErrors(['msg' => 'Please login first.']);
    }

    // Step 3: Create booking
        Booking::create([
        'customer_id' => $request->session()->get('user_id'),
        'vehicle_id' => $request->vehicle_id,
        'booking_date' => $request->trip_date,
        'pickup_location' => $request->pickup_location,
        'dropoff_location' => $request->drop_location,
        'status' => 'booked',
    ]);

    Vehicle::where('id', $request->vehicle_id)->update(['is_booked' => 'yes']);

    return redirect()->route('customer.seeavailable')->with('success', 'Trip booked successfully!');
}


// see trips
public function providerTrip()
{
    // Session se provider ka ID lo
    $providerId = session('user_id');

    if (!$providerId || session('role') != 'provider') {
        return redirect()->route('login')->with('error', 'Access denied.');
    }

    // Provider ki vehicles nikal lo
    $vehicleIds = Vehicle::where('user_id', $providerId)->pluck('id');

    // Un vehicles ki bookings nikal lo sath customer ka data bhi
    $bookings = Booking::whereIn('vehicle_id', $vehicleIds)
                ->with(['customer', 'vehicle'])
                ->get();

    return view('provider.trip', compact('bookings'));
}




//veiw trip by admin
public function viewtrip()
    {
        $vehicles = Booking::all();
        return view('admin.viewtrip',compact('vehicles'));
    }




    // public function approve(Request $request, Vehicle $vehicle){
    //     $id=$request->id;
    //     $approve=Vehicle::find($id);
    //     if($approve){
    //         $approve->status='approved';
    //         $approve->save();
    //     }
    //     return redirect()->back();
    // }
}
