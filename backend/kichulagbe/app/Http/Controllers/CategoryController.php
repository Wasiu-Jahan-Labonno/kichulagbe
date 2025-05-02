<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;
class CategoryController extends Controller
{
      // Display the category creation form (GET)
    public function indexcateg()
    {
        return view('category.indexcateg');  // The form for adding categories
    }

    // Store the category (POST)
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories,slug',
        ]);

        Category::create([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);

        return redirect()->back()->with('success', 'Category created successfully!');
    }

 public function index()
{
    $categories = Category::all();
    return view('categories.index', compact('categories'));
}

public function create()
{
    return view('categories.create');
}

public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'slug' => 'required|string|max:255|unique:categories',
    ]);

    Category::create($validated);

    return redirect()->route('categories.index')->with('success', 'Category created successfully.');
}

public function edit(Category $category)
{
    return view('categories.edit', compact('category'));
}

public function update(Request $request, Category $category)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'slug' => 'required|string|max:255|unique:categories,slug,' . $category->id,
    ]);

    $category->update($validated);

    return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
}

public function destroy(Category $category)
{
    $category->delete();

    return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
}

}

