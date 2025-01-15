<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Story;

class StoryController extends Controller
{
    // Pobieranie wszystkich części historii
    public function index()
    {
        return response()->json(Story::paginate(10));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255', // Walidacja tytułu
        ]);

        $story = Story::create($validated);

        return response()->json($story, 201);
    }

    public function show($id)
    {
        $story = Story::with('parts')->find($id);

        if (!$story) {
            return response()->json(['message' => 'Story not found'], 404);
        }

        return response()->json($story);
    }

}

