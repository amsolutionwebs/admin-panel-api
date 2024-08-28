<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contactus;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ContactusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contactus = Contactus::all();

        return response()->json([
            'status' => true,
            'message' => 'All Contactus',
            'contactus' => $contactus
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required',
            'phone' => 'required',
            'intrest_in' => 'required',
            'location' => 'required',
            'whatsapp_number' => 'required',
            'about_project' => 'required',
            'status' => 'nullable',
            
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation Error',
                'errors' => $validator->errors()
            ], 422);
        }

        $contactus = new Contactus();

        if (!$contactus) {
            return response()->json([
                'status' => false,
                'message' => 'Contactus not found'
            ], 404);
        }
        // Handle file upload
       
        $contactus->name = $request->name;
        $contactus->email = $request->email;
        $contactus->phone = $request->phone;
        $contactus->intrest_in = $request->intrest_in;
        $contactus->location = $request->location;
        $contactus->whatsapp_number = $request->whatsapp_number;
        $contactus->about_project = $request->about_project;
        $contactus->status = 'enable';
        $contactus->save();

        return response()->json([
            'status' => true,
            'message' => 'Contactus updated successfully!',
            'contactus' => $contactus
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contactus = Contactus::find($id);

        if (!$contactus) {
            return response()->json([
                'status' => false,
                'message' => 'Contactus not found'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Contactus details',
            'contactus' => $contactus
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required',
            'phone' => 'required',
            'intrest_in' => 'required',
            'location' => 'required',
            'whatsapp_number' => 'required',
            'about_project' => 'required',
            'status' => 'nullable',
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation Error',
                'errors' => $validator->errors()
            ], 422);
        }
    
        $contactus = Contactus::find($id);
    
        if (!$contactus) {
            return response()->json([
                'status' => false,
                'message' => 'Contactus not found'
            ], 404);
        }
    
        // Handle file upload
      
    
        $contactus->name = $request->name;
        $contactus->email = $request->email;
        $contactus->phone = $request->phone;
        $contactus->intrest_in = $request->intrest_in;
        $contactus->location = $request->location;
        $contactus->whatsapp_number = $request->whatsapp_number;
        $contactus->about_project = $request->about_project;
        $contactus->status = 'enable';
        $contactus->save();
    
        return response()->json([
            'status' => true,
            'message' => 'Contactus updated successfully!',
            'contactus' => $contactus
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
            $Contactus = Contactus::find($id);

        if (!$Contactus) {
            return response()->json([
                'status' => false,
                'message' => 'Contactus not found'
            ], 404);
        }

        // Delete the testimonial
        $Contactus->delete();

        return response()->json([
            'status' => true,
            'message' => 'Contactus deleted successfully!'
        ], 200);
    }
}
