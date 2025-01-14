<?php

namespace App\Http\Controllers;

use App\Models\StoryPart;
use Illuminate\Http\Request;

class StoryPartController extends Controller
{
    // Pobieranie wszystkich części historii
    public function index()
    {
        return response()->json(StoryPart::paginate(10));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'order' => 'required|integer',
            'file' => 'nullable|file|mimes:jpg,png,pdf|max:2048', // Walidacja pliku
            'story_id' => 'required|exists:stories,id',
        ]);

        // Zapisz plik, jeśli został przesłany
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('uploads', 'public'); // Zapis pliku w folderze storage/app/public/uploads
            $validated['file_path'] = $filePath; // Dodaj ścieżkę pliku do danych
        }

        $storyPart = StoryPart::create($validated);

        return response()->json($storyPart, 201);
    }

    public function show($id)
    {
        $storyPart = StoryPart::find($id);

        if (!$storyPart) {
            return response()->json(['message' => 'StoryPart not found'], 404);
        }

        return response()->json($storyPart);
    }

    public function download($id)
    {
        $storyPart = StoryPart::find($id);

        if (!$storyPart || !$storyPart->file_path) {
            return response()->json(['message' => 'File not found'], 404);
        }

        return response()->download(storage_path('app/public/' . $storyPart->file_path));
    }

    public function update(Request $request, $id)
    {
        $storyPart = StoryPart::find($id);

        if (!$storyPart) {
            return response()->json(['message' => 'StoryPart not found'], 404);
        }

        $validated = $request->validate([
            'title' => 'sometimes|string|max:255',
            'content' => 'sometimes|string',
            'order' => 'sometimes|integer',
        ]);

        $storyPart->update($validated);

        return response()->json($storyPart);
    }

    public function destroy($id)
    {
        $storyPart = StoryPart::find($id);

        if (!$storyPart) {
            return response()->json(['message' => 'StoryPart not found'], 404);
        }

        $storyPart->delete();

        return response()->json(['message' => 'StoryPart deleted successfully']);
    }
}

