<?php

namespace App\Http\Controllers;

use App\Models\Header;
use Illuminate\Http\Request;

class HeaderController extends Controller
{
    public function index()
    {
        return response()->json(Header::with('landingPage')->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'background_image' => 'nullable|string|max:255',
            'header_image' => 'nullable|string|max:255',
            'call_to_action_link' => 'nullable|string|max:255',
            'registration_link' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'landing_page_id' => 'required|exists:landing_pages,id',
        ]);

        $header = Header::create($validated);

        return response()->json($header->load('landingPage'), 201);
    }

    public function show(Header $header)
    {
        return response()->json($header->load('landingPage'));
    }

    public function update(Request $request, Header $header)
    {
        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'background_image' => 'nullable|string|max:255',
            'header_image' => 'nullable|string|max:255',
            'call_to_action_link' => 'nullable|string|max:255',
            'registration_link' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'landing_page_id' => 'sometimes|required|exists:landing_pages,id',
        ]);

        $header->update($validated);

        return response()->json($header->load('landingPage'), 200);
    }

    public function destroy(Header $header)
    {
        $header->delete();
        return response()->json(null, 204);
    }
}
