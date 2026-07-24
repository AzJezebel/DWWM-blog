<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('articles')->paginate(10);
        return view('admin.categories-list', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories-create');
    }

    public function store(Request $request)
    {
        // Validate only the name
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
        ]);

        // Generate slug from name
        $slug = Str::slug($validated['name']);
        
        // Make sure slug is unique
        $originalSlug = $slug;
        $counter = 1;
        while (Category::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        // Create the category
        $category = Category::create([
            'name' => $validated['name'],
            'slug' => $slug,
        ]);

        // Redirect back to categories list with success message
        return redirect()->route('categories.index')
                         ->with('success', 'Catégorie "'.$category->name.'" créée avec succès ! (slug: '.$slug.')');
    }

    public function show(Category $category)
    {
        return view('admin.categories-show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('admin.categories-edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        // Validate the name (unique except current category)
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
        ]);

        // Generate new slug from updated name
        $slug = Str::slug($validated['name']);
        
        // Make sure slug is unique (excluding current category)
        $originalSlug = $slug;
        $counter = 1;
        while (Category::where('slug', $slug)->where('id', '!=', $category->id)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        // Update the category
        $category->update([
            'name' => $validated['name'],
            'slug' => $slug,
        ]);

        // Redirect back to categories list with success message
        return redirect()->route('categories.index')
                         ->with('success', 'Catégorie "'.$category->name.'" mise à jour avec succès ! (nouveau slug: '.$slug.')');
    }

    public function destroy(Category $category)
    {
        // Prevent deletion if category has articles
        if ($category->articles()->count() > 0) {
            return redirect()->route('categories.index')
                             ->with('error', 'Impossible de supprimer la catégorie "'.$category->name.'" car elle contient '.$category->articles()->count().' article(s).');
        }

        $categoryName = $category->name;
        $category->delete();

        return redirect()->route('categories.index')
                         ->with('success', 'Catégorie "'.$categoryName.'" supprimée avec succès !');
    }
}