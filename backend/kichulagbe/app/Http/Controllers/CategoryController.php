<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;
class CategoryController extends Controller
{
      // Display the category creation form (GET)
    public function index()
    {
        return view('dashboard.categories.index');  // The form for adding categories
    }

    // Store the category (POST)
    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
        ]);

        // Store the category
        Category::create([
            'name' => $validated['name'],
            'slug' => $validated['slug'],
        ]);

        // Redirect to the category management page with a success message
        return redirect()->route('dashboard.categories.store')->with('success', 'Category added successfully');
    }
}

