<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Testimonials;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class TestimonialsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonials::all();

        return response()->json([
            'status' => true,
            'message' => 'All Testimonials',
            'testimonials' => $testimonials
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'testimonials_name' => 'required|string',
            'testimonials_position' => 'required',
            'testimonials_content' => 'required',
            'testimonials_image' => 'required',
            'sort_order' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation Error',
                'errors' => $validator->errors()->all()
            ], 422);
        }

        $testimonials = new Testimonials();

        if (!$testimonials) {
            return response()->json([
                'status' => false,
                'message' => 'Testimonials not found'
            ], 404);
        }
        // Handle file upload
            if (isset($request->testimonials_image)) {
                // upload image
        $imageName = time() . 'testimonials_image.' . $request->testimonials_image->extension();
        $request->testimonials_image->move(public_path('upload'), $imageName);
            $testimonials->testimonials_image = $imageName;
        }
        $testimonials->testimonials_name = $request->testimonials_name;
        $testimonials->testimonials_position = $request->testimonials_position;
        $testimonials->testimonials_content = $request->testimonials_content;
        $testimonials->sort_order = $request->sort_order;
        $testimonials->status = $request->status;
        $testimonials->save();

        return response()->json([
            'status' => true,
            'message' => 'Testimonials updated successfully!',
            'testimonials' => $testimonials
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $testimonials = Testimonials::find($id);

        if (!$testimonials) {
            return response()->json([
                'status' => false,
                'message' => 'Testimonials not found'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Testimonials details',
            'testimonials' => $testimonials
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'testimonials_name' => 'required|string',
            'testimonials_position' => 'required',
            'testimonials_content' => 'required',
            'testimonials_image' => 'nullable|image',
            'sort_order' => 'required',
            'status' => 'required',
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation Error',
                'errors' => $validator->errors()->all()
            ], 422);
        }
    
        $testimonials = Testimonials::find($id);
    
        if (!$testimonials) {
            return response()->json([
                'status' => false,
                'message' => 'Testimonials not found'
            ], 404);
        }
    
        // Handle file upload
        if ($request->hasFile('testimonials_image')) {
            $imageName = time() . 'testimonials_image.' . $request->testimonials_image->extension();
            $request->testimonials_image->move(public_path('upload'), $imageName);
            $testimonials->testimonials_image = $imageName;
        }
    
        $testimonials->testimonials_name = $request->testimonials_name;
        $testimonials->testimonials_position = $request->testimonials_position;
        $testimonials->testimonials_content = $request->testimonials_content;
        $testimonials->sort_order = $request->sort_order;
        $testimonials->status = $request->status;
        $testimonials->save();
    
        return response()->json([
            'status' => true,
            'message' => 'Testimonials updated successfully!',
            'testimonials' => $testimonials
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        $testimonials = Testimonials::find($id);
        if (!$testimonials) {
            return response()->json([
                'status' => false,
                'message' => 'Testimonials not found'
            ], 404);
        }

        // Check if the testimonial has an image and delete it
        if ($testimonials->testimonials_image) {
            $imagePath = public_path('upload/' . $testimonials->testimonials_image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        // Delete the testimonial
        $testimonials->delete();

        return response()->json([
            'status' => true,
            'message' => 'Testimonials deleted successfully!'
        ], 200);
    }
}
