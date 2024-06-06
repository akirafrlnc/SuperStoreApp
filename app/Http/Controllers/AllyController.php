<?php

namespace App\Http\Controllers;

use App\Models\Ally;
use Illuminate\Http\Request;

class AllyController extends Controller
{
    public function products($url)
    {
        $ally = Ally::where('url', $url)->first();

        if (!$ally) {
            return response()->json(['message' => 'Ally not found'], 404);
        }

        // Fetch all products if no specific categories are set for the ally
        $products = $ally->categories()->with('products')->get()->pluck('products')->flatten();

        return response()->json($products);
    }
        // Display a listing of allies
        public function index()
        {
            $allies = Ally::all();
            return response()->json($allies);
        }

        // Store a newly created ally in storage
        public function store(Request $request)
        {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'url' => 'required|url'
            ]);

            $ally = Ally::create($validatedData);
            return response()->json($ally, 201);
        }

        // Display the specified ally
        public function show(Ally $ally)
        {
            return response()->json($ally);
        }

        // Update the specified ally in storage
        public function update(Request $request, Ally $ally)
        {
            $validatedData = $request->validate([
                'name' => 'string|max:255',
                'url' => 'url'
            ]);

            $ally->update($validatedData);
            return response()->json($ally);
        }

        // Remove the specified ally from storage
        public function destroy(Ally $ally)
        {
            $ally->delete();
            return response()->json(null, 204);
        }
}
