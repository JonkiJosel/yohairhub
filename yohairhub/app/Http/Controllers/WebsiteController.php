<?php

namespace App\Http\Controllers;

use App\Models\Salon;
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
}
