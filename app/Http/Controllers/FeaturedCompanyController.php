<?php

namespace App\Http\Controllers;

use App\Models\FeaturedCompany;
use Illuminate\Http\Request;

class FeaturedCompanyController extends Controller
{
    public function index()
    {
        return response()->json(FeaturedCompany::with('landingPage')->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'slide_order' => 'nullable|integer',
            'landing_page_id' => 'required|exists:landing_pages,id',
        ]);

        $company = FeaturedCompany::create($validated);

        return response()->json($company->load('landingPage'), 201);
    }

    public function show(FeaturedCompany $featuredCompany)
    {
        return response()->json($featuredCompany->load('landingPage'));
    }

    public function update(Request $request, FeaturedCompany $featuredCompany)
    {
        $validated = $request->validate([
            'image' => 'sometimes|required|string|max:255',
            'title' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'slide_order' => 'nullable|integer',
            'landing_page_id' => 'sometimes|required|exists:landing_pages,id',
        ]);

        $featuredCompany->update($validated);

        return response()->json($featuredCompany->load('landingPage'), 200);
    }

    public function destroy(FeaturedCompany $featuredCompany)
    {
        $featuredCompany->delete();
        return response()->json(null, 204);
    }
}
