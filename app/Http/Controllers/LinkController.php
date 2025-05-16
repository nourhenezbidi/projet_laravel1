<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function index()
    {
        return response()->json(Link::with('landingPage')->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'label' => 'required|string|max:255',
            'url' => 'required|url|max:255',
            'type' => 'required|in:social,quick',
            'landing_page_id' => 'required|exists:landing_pages,id',
        ]);

        $link = Link::create($validated);

        return response()->json($link->load('landingPage'), 201);
    }

    public function show(Link $link)
    {
        return response()->json($link->load('landingPage'));
    }

    public function update(Request $request, Link $link)
    {
        $validated = $request->validate([
            'label' => 'sometimes|required|string|max:255',
            'url' => 'sometimes|required|url|max:255',
            'type' => 'sometimes|required|in:social,quick',
            'landing_page_id' => 'sometimes|required|exists:landing_pages,id',
        ]);

        $link->update($validated);

        return response()->json($link->load('landingPage'), 200);
    }

    public function destroy(Link $link)
    {
        $link->delete();
        return response()->json(null, 204);
    }
}
