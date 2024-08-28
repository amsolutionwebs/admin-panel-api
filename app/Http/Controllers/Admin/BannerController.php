<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Banners;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners = Banners::all();
        return response()->json([
            'status' => true,
            'message' => 'All Banners',
            'banners' => $banners
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'banner_title' => 'required|string',
            'banner_url' => 'required',
            'banner_image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:20048',
            'page_type' => 'required|string',
            'banner_type' => 'required|string',
            'banner_content' => 'required|string',
            'sort_order' => 'required|integer',
            'banner_status' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation Error',
                'errors' => $validator->errors()->all()
            ], 422);
        }

        // Create a new banner instance
        $banner = new Banners();

        // Handle file upload
        if ($request->hasFile('banner_image')) {
            $imageName = 'banner-'. time() . '.' . $request->banner_image->extension();
            $request->banner_image->move(public_path('upload'), $imageName);
            $banner->banner_image = $imageName;
        }

        // Set model attributes
        $banner->banner_title = $request->banner_title;
        $banner->banner_url = $request->banner_url;
        $banner->page_type = $request->page_type;
        $banner->banner_type = $request->banner_type;
        $banner->banner_content = $request->banner_content;
        $banner->sort_order = $request->sort_order;
        $banner->banner_status = $request->banner_status;

        // Save the model
        $banner->save();

        return response()->json([
            'status' => true,
            'message' => 'Banner created successfully!',
            'banner' => $banner
        ], 201);
    }



  
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       $banners = Banners::find($id);

        if (!$banners) {
            return response()->json([
                'status' => false,
                'message' => 'Banners not found'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Banners details',
            'banners' => $banners
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
            // Find the banner by ID
        $banner = Banners::find($id);

        // Check if the banner exists
        if (!$banner) {
            return response()->json([
                'status' => false,
                'message' => 'Banner not found'
            ], 404);
        }

        // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'banner_title' => 'sometimes|required|string',
            'banner_url' => 'sometimes|required',
            'banner_image' => 'sometimes|required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'page_type' => 'sometimes|required|string',
            'banner_type' => 'sometimes|required|string',
            'banner_content' => 'sometimes|required|string',
            'sort_order' => 'sometimes|required|integer',
            'banner_status' => 'sometimes|required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation Error',
                'errors' => $validator->errors()->all()
            ], 422);
        }

        // Handle file upload if a new image is provided
        if ($request->hasFile('banner_image')) {
            // Delete the old image file if it exists
            if ($banner->banner_image && file_exists(public_path('upload/' . $banner->banner_image))) {
                unlink(public_path('upload/' . $banner->banner_image));
            }

            // Upload the new image
            $imageName = 'banner-' . time() . '.' . $request->banner_image->extension();
            $request->banner_image->move(public_path('upload'), $imageName);
            $banner->banner_image = $imageName;
        }

        // Update model attributes
        $banner->banner_title = $request->input('banner_title', $banner->banner_title);
        $banner->banner_url = $request->input('banner_url', $banner->banner_url);
        $banner->page_type = $request->input('page_type', $banner->page_type);
        $banner->banner_type = $request->input('banner_type', $banner->banner_type);
        $banner->banner_content = $request->input('banner_content', $banner->banner_content);
        $banner->sort_order = $request->input('sort_order', $banner->sort_order);
        $banner->banner_status = $request->input('banner_status', $banner->banner_status);

        // Save the updated model
        $banner->save();

        return response()->json([
            'status' => true,
            'message' => 'Banner updated successfully!',
            'banner' => $banner
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $banner = Banners::find($id);
        if (!$banner) {
            return response()->json([
                'status' => false,
                'message' => 'banner not found'
            ], 404);
        }

        // Check if the testimonial has an image and delete it
        if ($banner->banner_image) {
            $imagePath = public_path('upload/' . $banner->banner_image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        // Delete the testimonial
        $banner->delete();

        return response()->json([
            'status' => true,
            'message' => 'banner deleted successfully!'
        ], 200);
    }
}
