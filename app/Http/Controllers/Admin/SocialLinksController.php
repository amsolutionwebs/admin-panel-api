<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sociallinks;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class SocialLinksController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sociallinks = Sociallinks::all();
        return response()->json([
            'status' => true,
            'message' => 'Sociallinks History',
            'sociallinks' => $sociallinks
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
       public function store(Request $request)
    {
        // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|integer',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'phone' => 'nullable|string',
            'secondary_phone' => 'nullable|string',
            'email' => 'nullable|email',
            'secondary_email' => 'nullable|email',
            'whatsapp' => 'nullable|string',
            'google_map' => 'nullable|string',
            'facebook' => 'nullable',
            'youtube' => 'nullable',
            'instagram' => 'nullable|string',
            'twitter' => 'nullable|string',
            'linkedin' => 'nullable|string',
            'main_address' => 'nullable|string',
            'branch_address' => 'nullable|string',
            'status' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation Error',
                'errors' => $validator->errors()->all()
            ], 422);
        }

        // Create a new SocialLink instance
        $socialLink = new Sociallinks();

        // Handle file upload for the logo
        if ($request->hasFile('logo')) {
            $logoName = 'logo-' . time() . '.' . $request->logo->extension();
            $request->logo->move(public_path('upload'), $logoName);
            $socialLink->logo = $logoName;
        }


       
        // Set model attributes
        $socialLink->user_id = $request->user_id;
        $socialLink->phone = $request->phone;
        $socialLink->secondary_phone = $request->secondary_phone;
        $socialLink->email = $request->email;
        $socialLink->secondary_email = $request->secondary_email;
        $socialLink->whatsapp = $request->whatsapp;
        $socialLink->google_map = $request->google_map;
        $socialLink->facebook = $request->facebook;
        $socialLink->youtube = $request->youtube;
        $socialLink->instagram = $request->instagram;
        $socialLink->twitter = $request->twitter;
      
        $socialLink->main_address = $request->main_address;
        $socialLink->branch_address = $request->branch_address;
        $socialLink->status = $request->status;

        // Save the model
        $socialLink->save();

        return response()->json([
            'status' => true,
            'message' => 'Social link created successfully!',
            'social_link' => $socialLink
        ], 201);
    }






  
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       $sociallinks = Sociallinks::find($id);

        if (!$sociallinks) {
            return response()->json([
                'status' => false,
                'message' => 'sociallinks not found'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'sociallinks details',
            'sociallinks' => $sociallinks
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Find the social link by ID
        $socialLink = Sociallinks::find($id);

        // Check if the social link exists
        if (!$socialLink) {
            return response()->json([
                'status' => false,
                'message' => 'Social link not found'
            ], 404);
        }

        // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'user_id' => 'nullable|integer',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'phone' => 'nullable|string',
            'secondary_phone' => 'nullable|string',
            'email' => 'nullable|email',
            'secondary_email' => 'nullable|email',
            'whatsapp' => 'nullable|string',
            'google_map' => 'nullable|url',
            'facebook' => 'nullable|url',
            'youtube' => 'nullable|url',
            'instagram' => 'nullable|url',
            'twitter' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'main_address' => 'nullable|string',
            'branch_address' => 'nullable|string',
            'status' => 'nullable|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation Error',
                'errors' => $validator->errors()->all()
            ], 422);
        }

        // Handle file upload for the logo if a new logo is provided
        if ($request->hasFile('logo')) {
            // Delete the old logo file if it exists
            if ($socialLink->logo && file_exists(public_path('upload/' . $socialLink->logo))) {
                unlink(public_path('upload/' . $socialLink->logo));
            }

            // Upload the new logo
            $logoName = 'logo-' . time() . '.' . $request->logo->extension();
            $request->logo->move(public_path('upload'), $logoName);
            $socialLink->logo = $logoName;
        }

        // Update model attributes
        $socialLink->user_id = $request->input('user_id', $socialLink->user_id);
        $socialLink->phone = $request->input('phone', $socialLink->phone);
        $socialLink->secondary_phone = $request->input('secondary_phone', $socialLink->secondary_phone);
        $socialLink->email = $request->input('email', $socialLink->email);
        $socialLink->secondary_email = $request->input('secondary_email', $socialLink->secondary_email);
        $socialLink->whatsapp = $request->input('whatsapp', $socialLink->whatsapp);
        $socialLink->google_map = $request->input('google_map', $socialLink->google_map);
        $socialLink->facebook = $request->input('facebook', $socialLink->facebook);
        $socialLink->youtube = $request->input('youtube', $socialLink->youtube);
        $socialLink->instagram = $request->input('instagram', $socialLink->instagram);
        $socialLink->twitter = $request->input('twitter', $socialLink->twitter);
        $socialLink->linkedin = $request->input('linkedin', $socialLink->linkedin);
        $socialLink->main_address = $request->input('main_address', $socialLink->main_address);
        $socialLink->branch_address = $request->input('branch_address', $socialLink->branch_address);
        $socialLink->status = $request->input('status', $socialLink->status);

        // Save the updated model
        $socialLink->save();

        return response()->json([
            'status' => true,
            'message' => 'Social link updated successfully!',
            'social_link' => $socialLink
        ], 200);
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pages = Pages::find($id);
        if (!$pages) {
            return response()->json([
                'status' => false,
                'message' => 'pages not found'
            ], 404);
        }

        // Check if the testimonial has an image and delete it
        if ($pages->post_image) {
            $imagePath = public_path('upload/' . $pages->post_image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        // Delete the testimonial
        $pages->delete();

        return response()->json([
            'status' => true,
            'message' => 'pages deleted successfully!'
        ], 200);
    }
}
