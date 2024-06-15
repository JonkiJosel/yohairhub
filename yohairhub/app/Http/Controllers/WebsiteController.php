<?php

namespace App\Http\Controllers;

use App\Models\Salon;
use App\Models\SalonComment;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function salons()
    {
        return view('website.salonsList');
    }

    public function contactUs()
    {
        return view('website.contact-us');
    }

    public function aboutUs()
    {
        return view('website.about-us');
    }

    public function viewSalon($uuid)
    {
        $salon = Salon::where('uuid', $uuid)->firstOrFail();

        return view('website.single-salon-view', compact('salon'));
    }

    public function postComment(Request $request, $uuid)
    {
        // dd('here');
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        $salon = Salon::where('uuid', $uuid)->firstOrFail();

        SalonComment::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'comment' => $request->input('message'),
            'salon_id' => $salon->id,
        ]);

        // Optionally, you can redirect back with a success message or handle it based on your application flow
        return redirect()->back()->with('success', 'Comment posted successfully!');
    }
}
