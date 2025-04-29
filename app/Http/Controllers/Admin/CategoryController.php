<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()->paginate(5);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
        ]);
    
        Category::create(['name' => $request->name]);
    
        return redirect()->route('admin.categories.index')->with('success', 'Catégorie créée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */

    
    public function update(Request $request, Category $category)
    {
        try {
            // Validate incoming data
            $validated = $request->validate([
                'name' => 'required|string|max:255',
            ]);
    
            // Update the category
            $category->update($validated);
    
            // Return a JSON response for AJAX
            return response()->json([
                'message' => 'Catégorie mise à jour avec succès.',
                'category' => $category,
            ], 200);
        } catch (\Exception $e) {
            // Handle errors and return 500 if something goes wrong
            return response()->json([
                'message' => 'Erreur lors de la mise à jour de la catégorie.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
