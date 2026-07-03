<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LeaveRequest;
use App\Models\LeaveType;

class LeaveRequestController extends Controller
{
    public function create()
    {
        $leaveTypes = LeaveType::all();
        return view('leave.create', compact('leaveTypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'leave_type_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'reason' => 'required',
        ]);

        LeaveRequest::create([
            'user_id' => auth()->id(),
            'leave_type_id' => $request->leave_type_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'reason' => $request->reason,
            'status' => 'Pending'
        ]);

        return redirect()->back()->with('success', 'Leave submitted successfully!');
    }
}