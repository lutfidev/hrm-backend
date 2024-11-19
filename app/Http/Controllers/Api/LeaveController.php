<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    //index
    public function index()
    {
        $leaves = Leave::all();
        return response([
            'message' => 'Leaves list',
            'data' => $leaves
        ], 200);
    }

    //store
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'leave_type_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'is_half_day' => 'required',
            'total_days' => 'required',
            'is_paid' => 'required',
            'reason' => 'required',
        ]);

        $leave = new Leave();
        $leave->user_id = $request->user_id;
        $leave->leave_type_id = $request->leave_type_id;
        $leave->start_date = $request->start_date;
        $leave->end_date = $request->end_date;
        $leave->is_half_day = $request->is_half_day;
        $leave->total_days = $request->total_days;
        $leave->is_paid = $request->is_paid;
        $leave->reason = $request->reason;
        $leave->status = 'pending';
        $leave->save();

        return response([
            'message' => 'Leave created successfully',
            'data' => $leave
        ], 201);
    }

    //show
    public function show($id)
    {
        $leave = Leave::find($id);
        if (!$leave) {
            return response([
                'message' => 'Leave not found'
            ], 404);
        }

        return response([
            'message' => 'Leave details',
            'data' => $leave
        ], 200);
    }

    //update
    public function update(Request $request, $id)
    {

        $request->validate([
            'user_id' => 'required',
            'leave_type_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'is_half_day' => 'required',
            'total_days' => 'required',
            'is_paid' => 'required',
            'reason' => 'required',
        ]);

        $leave = Leave::find($id);
        if (!$leave) {
            return response([
                'message' => 'Leave not found'
            ], 404);
        }

        $leave->user_id = $request->user_id;
        $leave->leave_type_id = $request->leave_type_id;
        $leave->start_date = $request->start_date;
        $leave->end_date = $request->end_date;
        $leave->is_half_day = $request->is_half_day;
        $leave->total_days = $request->total_days;
        $leave->is_paid = $request->is_paid;
        $leave->reason = $request->reason;
        $leave->status = $request->status;
        $leave->save();

        return response([
            'message' => 'Leave updated successfully',
            'data' => $leave
        ], 200);
    }

    //destroy
    public function destroy($id)
    {
        $leave = Leave::find($id);
        if (!$leave) {
            return response([
                'message' => 'Leave not found'
            ], 404);
        }

        $leave->delete();

        return response([
            'message' => 'Leave deleted'
        ], 200);
    }
}
