<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreActivityUploadRequest;
use App\Http\Requests\UpdateActivityUploadRequest;
use App\Models\ActivityUpload;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ActivityUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        $userRewardPoints = auth()->user()->points ?? 0;
        return view('activity.index', compact('categories', 'userRewardPoints'));
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
    public function store(StoreActivityUploadRequest $request)
    {
        $file = $request->file('upload');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('uploads/activities', $fileName, 'public');

        $activity = new ActivityUpload();
        $activity->category_id = $request->category_id;
        $activity->photo = $filePath;
        $activity->task_description = $request->task_description;
        $activity->user_id = auth()->id();
        $activity->save();

        return response()->json(['message' => 'Activity uploaded successfully']);
    }

    // public function statusUpdate(Request $request, $id)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'status' => 'required|in:Pending,Verified,Rejected',
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json([
    //             'message' => 'Validation failed',
    //             'errors' => $validator->errors()
    //         ], 422);
    //     }

    //     $activity = ActivityUpload::find($id);

    //     if (!$activity) {
    //         return response()->json([
    //             'message' => 'Activity not found.'
    //         ], 404);
    //     }

    //     $activity->status = $request->input('status');
    //     $activity->save();

    //     if ($activity->status === 'Verified') {
    //         $category = Category::find($activity->category_id);

    //         if ($category && $category->points) {
    //             $user = $activity->user;

    //             if ($user) {
    //                 $user->points = $user->points + $category->points;
    //                 $user->save();
    //             }
    //         }
    //     }

    //     return response()->json([
    //         'message' => 'Activity status updated successfully.'
    //     ]);
    // }
    public function statusUpdate(Request $request, $id)
{
    $validator = Validator::make($request->all(), [
        'status' => 'required|in:Pending,Verified,Rejected',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'message' => 'Validation failed',
            'errors' => $validator->errors()
        ], 422);
    }

    $activity = ActivityUpload::find($id);

    if (!$activity) {
        return response()->json([
            'message' => 'Activity not found.'
        ], 404);
    }

    $activity->status = $request->input('status');
    $activity->save();

    // ✅ Only if Verified and wasn't already verified before
    if ($activity->wasChanged('status') && $activity->status === 'Verified') {
        $category = $activity->category;
        $user = $activity->user;

        if ($category && $user && isset($category->points)) {
            $user->points = ($user->points ?? 0) + $category->points;
            $user->save();
        }
    }

    return response()->json([
        'message' => 'Activity status updated successfully.'
    ]);
}


    /**
     * Display the specified resource.
     */
    public function show(ActivityUpload $activityUpload)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ActivityUpload $activityUpload)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateActivityUploadRequest $request, ActivityUpload $activityUpload)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ActivityUpload $activityUpload)
    {
        //
    }
}
