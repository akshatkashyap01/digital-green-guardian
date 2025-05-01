<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreComplaintRequest;
use App\Http\Requests\UpdateComplaintRequest;
use App\Models\Complaint;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    if (auth()->user()->hasRole('Super admin')) {
        $complaints = Complaint::latest()
            ->paginate(config('config.per_page', 15))
            ->appends(request()->query());

        return view('complaints.admin.index', compact('complaints'));
    }

    $complaints = Complaint::where('user_id', auth()->id())
        ->latest()
        ->paginate(config('config.per_page', 15))
        ->appends(request()->query());

    return view('complaints.index', compact('complaints'));
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
    public function store(Request $request)
    {
        if (auth()->user()->hasRole('Super admin')) {
            return redirect()->back()->with('error', 'Super Admins are not allowed to raise complaints.');
        }

        $request->validate([
            'description' => 'required|string|max:255',
        ]);

        $ticket = now()->format('YmdHis');

        while (Complaint::where('ticket', $ticket)->exists()) {
            $ticket = now()->addSecond()->format('YmdHis');
        }

        // Store the complaint
        Complaint::create([
            'user_id'     => auth()->id(),
            'ticket'      => $ticket,
            'description' => $request->description,
        ]);

        return redirect()->route('complaints.index')->with('success', 'Complaint submitted successfully.');
    }

    public function approve(Request $request, $id): JsonResponse
{
    $complaint = Complaint::findOrFail($id);

    // You can add role/permission checks here if needed
    if (!auth()->user()->hasRole('Super admin')) {
        return response()->json(['message' => 'Unauthorized.'], 403);
    }

    $complaint->status = 'resolved';
    $complaint->save();

    return response()->json(['message' => 'Complaint approved successfully.']);
}

}
