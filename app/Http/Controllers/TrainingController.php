<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    public function index()
    {
        return response()->json(Training::with(['landingPages', 'inscriptionSubmissions'])->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'label' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|string|max:255',
            'instructor' => 'required|string|max:255',
            'review_count' => 'nullable|integer',
            'price' => 'nullable|numeric',
            'discounted_price' => 'nullable|numeric',
            'order' => 'nullable|integer',
            'landing_page_ids' => 'nullable|array',
            'landing_page_ids.*' => 'exists:landing_pages,id',
        ]);

        $training = Training::create($validated);

        if ($request->has('landing_page_ids')) {
            $training->landingPages()->sync($request->input('landing_page_ids'));
        }

        return response()->json($training->load(['landingPages', 'inscriptionSubmissions']), 201);
    }

    public function show(Training $training)
    {
        return response()->json($training->load(['landingPages', 'inscriptionSubmissions']));
    }

    public function update(Request $request, Training $training)
    {
        $validated = $request->validate([
            'label' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'image' => 'nullable|string|max:255',
            'instructor' => 'sometimes|required|string|max:255',
            'review_count' => 'nullable|integer',
            'price' => 'nullable|numeric',
            'order' => 'nullable|integer',
            'landing_page_ids' => 'nullable|array',
            'landing_page_ids.*' => 'exists:landing_pages,id',
        ]);

        $training->update($validated);

        if ($request->has('landing_page_ids')) {
            $training->landingPages()->sync($request->input('landing_page_ids'));
        }

        return response()->json($training->load(['landingPages', 'inscriptionSubmissions']), 200);
    }

    public function destroy(Training $training)
    {
        $training->delete();
        return response()->json(null, 204);
    }
}
