<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    // Display the category index
    public function index()
    {
        // Retrieve all categories from the database
    $categories = Category::all();

        // Return the view with the categories variable
        return view('category.catindex', compact('categories')); 
    }

    // Display the category creation form
    public function create()
    {
        return view('category.create');
    }

  public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255|unique:categories,name',
        'slug' => 'nullable|string|max:255|unique:categories,slug',
        'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validation for image file
    ]);

    // Handle image upload if it exists
    $imagePath = null;
    if ($request->hasFile('img')) {
        $imagePath = $request->file('img')->store('category_images', 'public');
    }

    // Create the category
    $slug = $request->slug ?: Str::slug($request->name);
    Category::create([
        'name' => $request->name,
        'slug' => $slug,
        'img' => $imagePath,  // Save image path in database
    ]);

    return redirect()->route('category.index')->with('success', 'Category created successfully.');
}

    // Display the category edit form
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('category.edit', compact('category'));
    }

    // Update the category (PUT/PATCH)
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $id,
            'slug' => 'nullable|string|max:255|unique:categories,slug,' . $id,
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Generate slug if not provided
        $slug = $request->slug ?: Str::slug($request->name);

        // If a new image is uploaded, delete the old one and store the new one
        if ($request->hasFile('img')) {
            // Delete the old image from storage
            if ($category->img) {
                Storage::disk('public')->delete($category->img);
            }

            // Store the new image
            $category->img = $request->file('img')->store('categories', 'public');
        }

        // Update category details
        $category->update([
            'name' => $request->name,
            'slug' => $slug,
            'img' => $category->img,
        ]);

        return redirect()->route('category.index')->with('success', 'Category updated successfully.');
    }

    // Delete the category
    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        // Delete image if it exists
        if ($category->img) {
            Storage::disk('public')->delete($category->img);
        }

        // Delete the category
        $category->delete();

        return redirect()->route('category.index')->with('success', 'Category deleted successfully.');
    }
    
}
