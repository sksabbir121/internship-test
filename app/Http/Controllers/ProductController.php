<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'description' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        'features' => 'required|array',
        'features.*' => 'required|string',
    ]);

    $imageName = time().'.'.$request->image->extension();
    $request->image->move(public_path('images'), $imageName);

    $product = Product::create([
        'name' => $request->name,
        'description' => $request->description,
        'image' => $imageName,
    ]);

    foreach ($request->features as $feature) {
        $product->features()->create(['feature' => $feature]);
    }

    return redirect()->back()->with('success', 'Product created successfully!');
}

}
