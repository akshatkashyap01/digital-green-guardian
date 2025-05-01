<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreActivityVerificationRequest;
use App\Http\Requests\UpdateActivityVerificationRequest;
use App\Models\ActivityUpload;
use App\Models\ActivityVerification;
use Illuminate\Http\Request;

class ActivityVerificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = ActivityUpload::query();

        if (auth()->user()->hasRole('Manager')) {
            // Filter the uploads based on the user having the 'Member' role
            $query->whereHas('user.roles', function ($query) {
                $query->where('name', 'Member');
            });
        }

        $complaints = $query->latest()->paginate(config('config.per_page', 15))
                              ->appends($request->query());

        $view = auth()->user()->hasRole('Super admin')
        ? 'activity.verification.admin.index'
        : 'activity.verification.index';


        return view($view, compact('complaints'));
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
    public function store(StoreActivityVerificationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ActivityVerification $activityVerification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ActivityVerification $activityVerification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateActivityVerificationRequest $request, ActivityVerification $activityVerification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ActivityVerification $activityVerification)
    {
        //
    }
}
