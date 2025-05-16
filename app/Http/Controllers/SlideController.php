<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    public function index()
    {
        return response()->json(Slide::with('carousel')->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'slide_image' => 'required|string|max:255',
            'slide_title' => 'required|string|max:255',
            'slide_description' => 'nullable|string|max:255',
            'slide_link' => 'nullable|string|max:255',
            'slide_order' => 'nullable|integer',
            'carousel_id' => 'required|exists:carousels,id',
        ]);

        $slide = Slide::create($validated);

        return response()->json($slide->load('carousel'), 201);
    }

    public function show(Slide $slide)
    {
        return response()->json($slide->load('carousel'));
    }

    public function update(Request $request, Slide $slide)
    {
        $validated = $request->validate([
            'slide_image' => 'sometimes|required|string|max:255',
            'slide_title' => 'sometimes|required|string|max:255',
            'slide_description' => 'nullable|string|max:255',
            'slide_link' => 'nullable|string|max:255',
            'slide_order' => 'nullable|integer',
            'carousel_id' => 'sometimes|required|exists:carousels,id',
        ]);

        $slide->update($validated);

        return response()->json($slide->load('carousel'), 200);
    }

    public function destroy(Slide $slide)
    {
        $slide->delete();
        return response()->json(null, 204);
    }
}
