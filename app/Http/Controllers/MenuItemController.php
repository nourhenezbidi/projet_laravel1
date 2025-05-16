<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use Illuminate\Http\Request;

class MenuItemController extends Controller
{
    public function index()
    {
        return response()->json(MenuItem::with(['page', 'parent', 'children'])->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'label' => 'required|string|max:255',
            'url' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
            'page_id' => 'nullable|exists:pages,id',
            'parent_id' => 'nullable|exists:menu_items,id',
        ]);

        $menuItem = MenuItem::create($validated);

        return response()->json($menuItem->load(['page', 'parent', 'children']), 201);
    }

    public function show(MenuItem $menuItem)
    {
        return response()->json($menuItem->load(['page', 'parent', 'children']));
    }

    public function update(Request $request, MenuItem $menuItem)
    {
        $validated = $request->validate([
            'label' => 'sometimes|required|string|max:255',
            'url' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
            'page_id' => 'nullable|exists:pages,id',
            'parent_id' => 'nullable|exists:menu_items,id',
        ]);

        $menuItem->update($validated);

        return response()->json($menuItem->load(['page', 'parent', 'children']), 200);
    }

    public function destroy(MenuItem $menuItem)
    {
        $menuItem->delete();
        return response()->json(null, 204);
    }
}
