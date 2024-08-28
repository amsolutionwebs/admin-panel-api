<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\getquets;

class GetquatesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $getquets = getquets::all();

        return response()->json([
            'status' => true,
            'message' => 'All getquets',
            'getquets' => $getquets
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
            'subject' => 'required',
            'messsage' => 'required',
            'status' => 'nullable',
            
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation Error',
                'errors' => $validator->errors()
            ], 422);
        }

        $getquets = new getquets();

        if (!$getquets) {
            return response()->json([
                'status' => false,
                'message' => 'getquets not found'
            ], 404);
        }
        // Handle file upload
       
        $getquets->name = $request->name;
        $getquets->email = $request->email;
        $getquets->phone = $request->phone;
        $getquets->subject = $request->subject;
        $getquets->messsage = $request->messsage;
        $getquets->status = 'enable';
        $getquets->save();

        return response()->json([
            'status' => true,
            'message' => 'Getquets updated successfully!',
            'getquets' => $getquets
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $getquets = getquets::find($id);

        if (!$getquets) {
            return response()->json([
                'status' => false,
                'message' => 'getquets not found'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'getquets details',
            'getquets' => $getquets
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
            'subject' => 'required',
            'messsage' => 'required',
            'status' => 'nullable',
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation Error',
                'errors' => $validator->errors()
            ], 422);
        }
    
        $getquets = getquets::find($id);
    
        if (!$getquets) {
            return response()->json([
                'status' => false,
                'message' => 'Getquets not found'
            ], 404);
        }
    
        // Handle file upload
      
         
        $getquets->name = $request->name;
        $getquets->email = $request->email;
        $getquets->phone = $request->phone;
        $getquets->subject = $request->subject;
        $getquets->messsage = $request->messsage;
        $getquets->status = 'enable';
        $getquets->save();
    
        return response()->json([
            'status' => true,
            'message' => 'Getquets updated successfully!',
            'getquets' => $getquets
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
            $getquets = getquets::find($id);

        if (!$getquets) {
            return response()->json([
                'status' => false,
                'message' => 'Getquets not found'
            ], 404);
        }

        // Delete the testimonial
        $getquets->delete();

        return response()->json([
            'status' => true,
            'message' => 'Getquets deleted successfully!'
        ], 200);
    }
}
