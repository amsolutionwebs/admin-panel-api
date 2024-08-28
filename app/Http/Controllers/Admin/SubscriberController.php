<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Subscribers;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subscribers = Subscribers::all();

        return response()->json([
            'status' => true,
            'message' => 'All Subscribers',
            'subscribers' => $subscribers
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'subscribers_email' => 'required|string|email|max:255|unique:subscribers,subscribers_email',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation Error',
                'errors' => $validator->errors()
            ], 422);
        }

        $subscriber = new Subscribers();
        $subscriber->subscribers_email = $request->subscribers_email;
        $subscriber->status = 'enable';
        $subscriber->save();

        return response()->json([
            'status' => true,
            'message' => 'Subscriber created successfully!',
            'subscriber' => $subscriber
        ], 201); // 201 Created
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $subscriber = Subscribers::find($id);

        if (!$subscriber) {
            return response()->json([
                'status' => false,
                'message' => 'Subscriber not found'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Subscriber details',
            'subscriber' => $subscriber
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'subscribers_email' => 'required|string|email|max:255|unique:subscribers,subscribers_email,' . $id,
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation Error',
                'errors' => $validator->errors()
            ], 422);
        }

        $subscriber = Subscribers::find($id);

        if (!$subscriber) {
            return response()->json([
                'status' => false,
                'message' => 'Subscriber not found'
            ], 404);
        }

        $subscriber->subscribers_email = $request->subscribers_email;
        $subscriber->status = $request->status;
        $subscriber->save();

        return response()->json([
            'status' => true,
            'message' => 'Subscriber updated successfully!',
            'subscriber' => $subscriber
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $subscriber = Subscribers::find($id);

        if (!$subscriber) {
            return response()->json([
                'status' => false,
                'message' => 'Subscriber not found'
            ], 404);
        }

        $subscriber->delete();

        return response()->json([
            'status' => true,
            'message' => 'Subscriber deleted successfully!'
        ], 200);
    }
}
