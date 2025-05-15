<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        // Récupère toutes les bannières, éventuellement avec leur landing page
        return response()->json(Banner::with('landingPage')->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'banner_image' => 'required|string|max:255',
            'banner_title' => 'nullable|string|max:255',
            'call_to_action_link' => 'nullable|string|max:255',
            'landing_page_id' => 'nullable|exists:landing_pages,id',
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
            'banner_image' => 'sometimes|required|string|max:255',
            'banner_title' => 'nullable|string|max:255',
            'call_to_action_link' => 'nullable|string|max:255',
            'landing_page_id' => 'nullable|exists:landing_pages,id',
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
