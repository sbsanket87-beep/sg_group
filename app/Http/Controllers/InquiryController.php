<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use Illuminate\Http\Request;
use App\Mail\InquiryMail;
use Illuminate\Support\Facades\Mail;

class InquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        // validation with custom messages
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'phone' => 'required|digits:10',
            'email' => 'required|email|max:150',
            'message' => 'required|string|min:10|max:1000',
        ], [
            'name.required' => 'Name is required',
            'phone.required' => 'Phone number is required',
            'phone.digits' => 'Phone must be exactly 10 digits',
            'email.required' => 'Email is required',
            'email.email' => 'Enter a valid email address',
            'message.required' => 'Please enter your message',
            'message.min' => 'Message must be at least 10 characters',
        ]);

        // store data safely
        Inquiry::create($validated);

        // Send Mail
        Mail::to('sayleesahane@gmail.com')->send(new InquiryMail($request->all()));

        return back()->with('success', 'Inquiry submitted successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Inquiry $inquiry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inquiry $inquiry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Inquiry $inquiry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inquiry $inquiry)
    {
        //
    }
}
