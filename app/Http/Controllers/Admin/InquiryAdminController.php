<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;

class InquiryAdminController extends Controller
{
    public function index()
    {
        $unread = \App\Models\Inquiry::where('is_read', false)->latest()->get();
        $read = \App\Models\Inquiry::where('is_read', true)->latest()->get();
    
        return view('admin.inquiries.index', compact('unread', 'read'));
    }

    public function toggle($id)
    {
        $inquiry = \App\Models\Inquiry::findOrFail($id);
        $inquiry->is_read = !$inquiry->is_read;
        $inquiry->save();

        return back();
    }

   
}