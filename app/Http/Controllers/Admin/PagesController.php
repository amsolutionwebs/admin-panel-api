<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Pages;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class PagesController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = Pages::all();
        return response()->json([
            'status' => true,
            'message' => 'All Pages',
            'pages' => $pages
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
        public function store(Request $request)
    {
        // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'post_title' => 'required|string',
            'post_title_seo_url' => 'required|string',
            'post_content' => 'required|string',
            'post_type' => 'required|string',
            'seo_title' => 'required|string',
            'meta_keywords' => 'required|string',
            'meta_description' => 'required|string',
            'post_status' => 'required|string',
            'post_image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // Corrected the max size to 2048
            'sort_order' => 'required|integer',
            'post_id' => 'nullable|integer', // Ensure post_id is properly validated if used
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation Error',
                'errors' => $validator->errors()->all()
            ], 422);
        }

        // Create a new Pages instance
        $pages = new Pages();

        // Handle file upload
        if ($request->hasFile('post_image')) {
            $imageName = 'post-' . time() . '.' . $request->post_image->extension();
            $request->post_image->move(public_path('upload'), $imageName);
            $pages->post_image = $imageName;
        }

        // Set model attributes
        $pages->post_title = $request->post_title;
        $pages->post_title_seo_url = $request->post_title_seo_url;
        $pages->post_content = $request->post_content;
        $pages->post_type = $request->post_type;
        $pages->seo_title = $request->seo_title;
        $pages->meta_keywords = $request->meta_keywords;
        $pages->meta_description = $request->meta_description;
        $pages->post_status = $request->post_status;
        $pages->sort_order = $request->sort_order;

        // Save the model
        $pages->save();

        return response()->json([
            'status' => true,
            'message' => 'Page created successfully!',
            'page' => $pages
        ], 201);
    }




  
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       $pages = Pages::find($id);

        if (!$pages) {
            return response()->json([
                'status' => false,
                'message' => 'Pages not found'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Pages details',
            'pages' => $pages
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Find the page by ID
        $page = Pages::find($id);

        // Check if the page exists
        if (!$page) {
            return response()->json([
                'status' => false,
                'message' => 'Page not found'
            ], 404);
        }

        // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'post_title' => 'sometimes|required|string',
            'post_title_seo_url' => 'sometimes|required|string',
            'post_content' => 'sometimes|required|string',
            'post_type' => 'sometimes|required|string',
            'seo_title' => 'sometimes|required|string',
            'meta_keywords' => 'sometimes|required|string',
            'meta_description' => 'sometimes|required|string',
            'post_status' => 'sometimes|required|string',
            'post_image' => 'sometimes|required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'sort_order' => 'sometimes|required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation Error',
                'errors' => $validator->errors()->all()
            ], 422);
        }

        // Handle file upload if a new image is provided
        if ($request->hasFile('post_image')) {
            // Delete the old image file if it exists
            if ($page->post_image && file_exists(public_path('upload/' . $page->post_image))) {
                unlink(public_path('upload/' . $page->post_image));
            }

            // Upload the new image
            $imageName = 'post-' . time() . '.' . $request->post_image->extension();
            $request->post_image->move(public_path('upload'), $imageName);
            $page->post_image = $imageName;
        }

        // Update model attributes
        $page->post_title = $request->input('post_title', $page->post_title);
        $page->post_title_seo_url = $request->input('post_title_seo_url', $page->post_title_seo_url);
        $page->post_content = $request->input('post_content', $page->post_content);
        $page->post_type = $request->input('post_type', $page->post_type);
        $page->seo_title = $request->input('seo_title', $page->seo_title);
        $page->meta_keywords = $request->input('meta_keywords', $page->meta_keywords);
        $page->meta_description = $request->input('meta_description', $page->meta_description);
        $page->post_status = $request->input('post_status', $page->post_status);
        $page->sort_order = $request->input('sort_order', $page->sort_order);

        // Save the updated model
        $page->save();

        return response()->json([
            'status' => true,
            'message' => 'Page updated successfully!',
            'page' => $page
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
