<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        return response()->json(Banner::with('landingPage')->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'address' => 'required|string|max:255',
            'phone_number' => 'nullable|string|max:50',
            'contact_email' => 'nullable|email|max:255',
            'social_media_links' => 'nullable|string|max:255',
            'landing_page_id' => 'required|exists:landing_pages,id',
        ]);

        $banner = Banner::create($validated);

        return response()->json($banner->load('landingPage'), 201);
    }

    public function show(Banner $banner)
    {
        return response()->json($banner->load('landingPage'));
    }

    public function update(Request $request, Banner $banner)
    {
        $validated = $request->validate([
            'address' => 'sometimes|required|string|max:255',
            'phone_number' => 'nullable|string|max:50',
            'contact_email' => 'nullable|email|max:255',
            'social_media_links' => 'nullable|string|max:255',
            'landing_page_id' => 'sometimes|required|exists:landing_pages,id',
        ]);

        $banner->update($validated);

        return response()->json($banner->load('landingPage'), 200);
    }

    public function destroy(Banner $banner)
    {
        $banner->delete();
        return response()->json(null, 204);
    }
}
