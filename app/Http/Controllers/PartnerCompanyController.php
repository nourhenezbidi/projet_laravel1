<?php

namespace App\Http\Controllers;

use App\Models\PartnerCompany;
use Illuminate\Http\Request;

class PartnerCompanyController extends Controller
{
    public function index()
    {
        return response()->json(PartnerCompany::with('landingPage')->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'required|string|max:255',
            'url' => 'required|url|max:255',
            'description' => 'nullable|string',
            'landing_page_id' => 'required|exists:landing_pages,id',
        ]);

        $partnerCompany = PartnerCompany::create($validated);

        return response()->json($partnerCompany->load('landingPage'), 201);
    }

    public function show(PartnerCompany $partnerCompany)
    {
        return response()->json($partnerCompany->load('landingPage'));
    }

    public function update(Request $request, PartnerCompany $partnerCompany)
    {
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'logo' => 'sometimes|required|string|max:255',
            'url' => 'sometimes|required|url|max:255',
            'description' => 'nullable|string',
            'landing_page_id' => 'sometimes|required|exists:landing_pages,id',
        ]);

        $partnerCompany->update($validated);

        return response()->json($partnerCompany->load('landingPage'), 200);
    }

    public function destroy(PartnerCompany $partnerCompany)
    {
        $partnerCompany->delete();
        return response()->json(null, 204);
    }
}
