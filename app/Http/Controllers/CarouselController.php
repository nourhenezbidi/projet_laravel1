<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use Illuminate\Http\Request;

class CarouselController extends Controller
{
    public function index()
    {
        return response()->json(Carousel::with('items')->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $carousel = Carousel::create($validated);

        return response()->json($carousel->load('items'), 201);
    }

    public function show(Carousel $carousel)
    {
        return response()->json($carousel->load('items'));
    }

    public function update(Request $request, Carousel $carousel)
    {
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
        ]);

        $carousel->update($validated);

        return response()->json($carousel->load('items'), 200);
    }

    public function destroy(Carousel $carousel)
    {
        $carousel->delete();
        return response()->json(null, 204);
    }
}
