<?php

namespace App\Http\Controllers;

use App\Models\Userr;
use Illuminate\Http\Request;
use Hash;
use Auth;
class UserrController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('userregister');
    }

    public function login()
    {
        return view('login');
    }

     public function adminlogin()
    {
        return view('dashbord.admin');
    }

      public function providerlogin()
    {
        return view('dashbord.provider');
    }
      public function customerlogin()
    {
        return view('dashbord.customer');
    }



    public function logout(Request $request)
{
    // Session data clear karo
    $request->session()->flush();

    // Wapas login page par redirect karo
    return redirect('/login');
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
         $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'cnic' => 'required|string|max:15',
        'role' => 'required|in:provider,customer',
        'password' => 'required|string|min:8|confirmed',
    ]);

    
    $user = Userr::create([
        'name' => $request->name,
        'email' => $request->email,
        'cnic' => $request->cnic,
        'role' => $request->role,
        'password' => Hash::make($request->password),
    ]);

    return redirect('/register');

    }

    /**
     * Display the specified resource.
     */
    public function show(Userr $userr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Userr $userr)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Userr $userr)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Userr $userr)
    {
        //
    }



    // public function loginn(Request $request)
    // {
    //     $exit=Userr::where('email', $request->email)->first();
    // if($exit){
    //     if(Hash::check($request->password, $exit->password)){
    //         if($exit->role=='admin'){
    //             return redirect()->route('admin.login');
    //         }
    //         else if($exit->role=='provider'){
    //             return redirect()->route('provider.login');
    //             // return redirect()->route('provider.login', ['id' => $user->id]);
    //         }
    //          else if($exit->role=='customer'){
    //             return redirect()->route('customer.login');
    //         }
    //         else{
    //             return redirect()->back();
    //         }
    //     }else{
    //          return redirect()->back();
    //     }
    // }else{
    //      return redirect()->back();
    // }

    // }






    public function loginn(Request $request)
{
    $user = Userr::where('email', $request->email)->first();

    if ($user && Hash::check($request->password, $user->password)) {

        // Save user in session
        session([
            'user_id' => $user->id,
            'role' => $user->role,
            'name' => $user->name,
        ]);

        // Redirect according to role
        if ($user->role == 'admin') {
            return redirect()->route('admin.login');
        } elseif ($user->role == 'provider') {
            return redirect()->route('provider.login');
        } elseif ($user->role == 'customer') {
            return redirect()->route('customer.login');
        } else {
            return redirect()->back()->with('error', 'Invalid role.');
        }

    } else {
        return redirect()->back()->with('error', 'Email ya password ghalat hai.');
    }
}




}
