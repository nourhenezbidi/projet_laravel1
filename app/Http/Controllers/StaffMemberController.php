<?php

namespace App\Http\Controllers;

use App\Models\StaffMember;
use Illuminate\Http\Request;

class StaffMemberController extends Controller
{
    public function index()
    {
        return response()->json(StaffMember::with('landingPage')->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|string|max:255',
            'display_order' => 'nullable|integer',
            'linkedin_url' => 'nullable|url|max:255',
            'landing_page_id' => 'required|exists:landing_pages,id',
        ]);

        $staffMember = StaffMember::create($validated);

        return response()->json($staffMember->load('landingPage'), 201);
    }

    public function show(StaffMember $staffMember)
    {
        return response()->json($staffMember->load('landingPage'));
    }

    public function update(Request $request, StaffMember $staffMember)
    {
        $validated = $request->validate([
            'full_name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|string|max:255',
            'display_order' => 'nullable|integer',
            'linkedin_url' => 'nullable|url|max:255',
            'landing_page_id' => 'sometimes|required|exists:landing_pages,id',
        ]);

        $staffMember->update($validated);

        return response()->json($staffMember->load('landingPage'), 200);
    }

    public function destroy(StaffMember $staffMember)
    {
        $staffMember->delete();
        return response()->json(null, 204);
    }
}
