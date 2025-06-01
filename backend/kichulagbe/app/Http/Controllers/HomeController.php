<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {  $product = Product::all();
         $categoriespro = Category::with('products')->get();
         $categories = Category::all();
    return view('home', compact('categories','categoriespro','product'));

    }
      public function list()
    {$categories = Category::all();

        // Fetch properties
        $properties = Product::all(); // Or use a specific category filter here
        return view('list', compact('properties','categories'));
    }
       public function contact()
    {
        return view('contact');
    }
      public function about()
    {
        return view('about');
    }
}
