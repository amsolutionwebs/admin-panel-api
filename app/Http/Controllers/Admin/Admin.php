<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Admins;
use Illuminate\Support\Facades\File;
use Hash;
use Auth;


class Admin extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admin = Admins::get();
         
         return response()->json([
        'status' => true,
        'message' => 'All Admins',
        'admin' => $admin
    ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'age' => 'required|string',
            'gender' => 'required|in:male,female',
            'employee_id' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email|max:255',
            'mobile_number' => 'required|numeric|unique:admins,mobile_number',
            'alternate_mobile_number' => 'nullable',
            'whatsapp_number' => 'nullable',
            'marital_status' => 'required',
            'qualification' => 'nullable',
            'designation' => 'nullable',
            'blood_group' => 'nullable',
            'address' => 'nullable|string|max:255',
            'country_id' => 'nullable|integer',
            'state_id' => 'nullable|integer',
            'city' => 'nullable|string|max:255',
            'pincode' => 'nullable|string|max:20',
            'profile_picture' => 'nullable|file|max:2048|mimes:jpeg,png,jpg,webp',
            'adhar_card_front_side' => 'nullable|file|max:2048|mimes:jpeg,png,jpg,webp',
            'adhar_card_back_side' => 'nullable|file|max:2048|mimes:jpeg,png,jpg,webp',
            'bio' => 'nullable|string',
            'usertype' => 'nullable',
            'company_name' => 'nullable',
            'username' => 'nullable|string|unique:admins|max:255',
            'password' => 'required',
            'status' => 'nullable',
            ]);
            
            if($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validation Error',
                    'errors' => $validator->errors()->all()
                ], 422);
            }
    
            $admin = new Admins();
    
            // Handle file upload
              if (isset($request->profile_picture)) {
                    // upload image
            $imageName = time() . 'profile_picture.' . $request->profile_picture->extension();
            $request->profile_picture->move(public_path('upload'), $imageName);
                $admin->profile_picture = $imageName;
            }
    
              if (isset($request->adhar_card_front_side)) {
                    // upload image
            $imageName = time() . 'adhar_front.' . $request->adhar_card_front_side->extension();
            $request->adhar_card_front_side->move(public_path('upload'), $imageName);
                $admin->adhar_card_front_side = $imageName;
            }
    
              if (isset($request->adhar_card_back_side)) {
                    // upload image
            $imageName = time() . 'adhar_back.' . $request->adhar_card_back_side->extension();
            $request->adhar_card_back_side->move(public_path('upload'), $imageName);
                $admin->adhar_card_back_side = $imageName;
            }
    
            $admin->first_name = $request->first_name;
            $admin->last_name = $request->last_name;
            $admin->age = $request->age;
            $admin->gender = $request->gender;
            $admin->employee_id = $request->employee_id;
            $admin->email = $request->email;
            $admin->mobile_number = $request->mobile_number;
            $admin->alternate_mobile_number = $request->alternate_mobile_number;
            $admin->whatsapp_number = $request->whatsapp_number;
            $admin->marital_status = $request->marital_status;
            $admin->qualification = $request->qualification;
            $admin->designation = $request->designation;
            $admin->blood_group = $request->blood_group;
            $admin->address = $request->address;
            $admin->country_id = $request->country_id;
            $admin->state_id = $request->state_id;
            $admin->city = $request->city;
            $admin->bio = $request->bio;
            $admin->pincode = $request->pincode;
            $admin->usertype = $request->usertype;
            $admin->company_name = $request->company_name;
            $admin->username = $request->username;
            $admin->password = Hash::make($request->password);
            $admin->status = 'pending';
            $admin->remember_token = '';
            $admin->save();
             // Return success response
            return response()->json([
                'status' => true,
                'message' => 'Admin profile created successfully!',
                'admin_id' => $admin->id
            ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

     // admin login
    public function adminLogin(Request $request){
        
         $validator = Validator::make($request->all(), [
        'username' => 'required',
        'password' => 'required'
    ]);

    if ($validator->fails()) {
        return response()->json([
            'status' => false,
            'message' => 'Validation Error',
            'errors' => $validator->errors()->all()
        ], 422);
    }

     $credentials = $request->only('username', 'password');

     if (Auth::guard('admins')->attempt($credentials)) {
        // Authentication passed
        $admin = Auth::guard('admins')->user(); // Retrieve authenticated admin
        // Generate a token with Sanctum
        $token = $admin->createToken('API_TOKEN')->plainTextToken;
        return response()->json([
            'status' => true,
            'message' => 'Admin logged in successfully!',
            'admin_details' => $admin,
            'access_token' => $token,
            'token_type' => 'bearer'
        ], 200);
    } else {
        return response()->json([
            'status' => false,
            'message' => 'Unauthorized',
        ], 401);
    }

    }
}
